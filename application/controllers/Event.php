<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * This controller controls all the function about Events
 */
class Event extends CI_Controller {

    /*
     * This function load Event login page and process validation of the user
     */
	public function index() {
        $this->form_validation->set_rules('eventcode', 'Event Code', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('event/login_view');
        } else {
            $value = $this->event_model->login($this->input->post('eventcode'));

            if(!empty($value)){
                if($value['event_password'] == md5($this->input->post('password'))){
                    $this->session->set_userdata($value);
                    redirect('event/home/'.$value['event_id']);
                }else{
                    redirect('event');
                }
            }else {
                redirect('event');
            }
        }
	}

	/*
	 * This function load Event home page after the event login process completed
	 */
	public function home($id){
        if (!empty($this->session->admin_id) || !empty($this->session->event_id) ) {
            $data['event_details'] = $this->event_model->event_details($id);
            $data['member_details'] = $this->event_model->member_details($id);
            $data['budget_details'] = $this->event_model->budget_details($id);
            $data['pledge_sum'] = $this->event_model->pledge_sum($id);
            $data['cash_sum'] = $this->event_model->cash_sum($id);
            $data['budget_sum'] = $this->event_model->budget_sum($id);
            $data['advance_sum'] = $this->event_model->advance_sum($id);
            $data['event_id'] = $id;

            $this->load->view('event/default_view', $data);
        } else {
            redirect('event');
        }
    }


    public function load_views(){


        if(!empty($_POST['view_name']) ||!empty($_POST['event_id']) || !empty($this->session->admin_id) || !empty($this->session->event_id)){


            $id = $_POST['event_id'];
            $data['event_details'] = $this->event_model->event_details($id);
            $data['member_details'] = $this->event_model->member_details($id);
            $data['budget_details'] = $this->event_model->budget_details($id);
            $data['pledge_sum'] = $this->event_model->pledge_sum($id);
            $data['cash_sum'] = $this->event_model->cash_sum($id);
            $data['budget_sum'] = $this->event_model->budget_sum($id);
            $data['advance_sum'] = $this->event_model->advance_sum($id);
            $data['event_id'] = $id;
            $view_name = $_POST['view_name'];


            $this->load->view('event/'.$view_name,$data);
        }

    }

    /*
     * This function process Event logout process
     */
    public function logout(){
        $this->session->sess_destroy();
        redirect('event');
    }

    /*
     * This function load Create event page and process validation of event creation.
     */
	public function create(){
        $data['location'] = $this->event_model->get_location();

        if (!empty($this->session->admin_id)){

            $this->form_validation->set_rules('eventname', 'Event Name', 'required');
            $this->form_validation->set_rules('eventcode', 'Event Code', 'required|is_unique[event.event_code]');
            $this->form_validation->set_rules('eventdate', 'Event Date', 'required');
            $this->form_validation->set_rules('location', 'Event Location', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Re-Enter Password', 'required|matches[password]');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('event/create_view', $data);
            } else {
                $values = array(
                    'event_name' => $this->input->post('eventname'),
                    'event_code' => $this->input->post('eventcode'),
                    'event_date' => $this->input->post('eventdate'),
                    'event_location' => $this->input->post('location'),
                    'event_password' => md5($this->input->post('password')),
                    'event_admin' => $this->session->admin_id,
                    'event_paid' => '0'
                );

                $this->event_model->create($values);

                redirect('admin/home');
            }
        } else {
            redirect('admin');
        }
    }

    /*
     * This function process the PHPExcel library to upload members list to the database
     */
    public function upload_members($id){

        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'xlsx|xls';
        $config['max_size']             = 0;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('members'))
        {
            $data = array('upload_data' => $this->upload->data());
            $file = $data['upload_data']['file_name'];
            //load the excel library
            $this->load->library('excel');
            //read file from path
            $objPHPExcel = PHPExcel_IOFactory::load('./upload/'.$file);
            $objWorksheet = $objPHPExcel->getActiveSheet();

            foreach ($objWorksheet->getRowIterator() as $row) {
                $mn = "";
                $mp = "0";
                $mc = "0";
                $pn = "";
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(true);
                foreach ($cellIterator as $cell) {
                    if($cell->getColumn() == "A") {
                        $mn = $cell->getValue();
                    }elseif($cell->getColumn() == "B") {
                        $mp = $cell->getValue();
                    }elseif($cell->getColumn() == "C") {
                        $mc = $cell->getValue();
                    }elseif($cell->getColumn() == "D") {
                        $pn = $cell->getValue();
                    }
                }
                if($mn != "Member Name"){
                    $values = array(
                        'member_name' => $mn,
                        'member_pledge' => $mp,
                        'member_cash' => $mc,
                        'member_phone' => $pn,
                        'event_id' => $id
                    );
                    $this->event_model->insert_member($values);
                }
            }
            redirect('event/home/'.$id);
        }
        else
        {
            $error = array('error' => $this->upload->display_errors());
            echo var_dump($error);
            $this->load->view('event/home_view');
        }
    }

    /*
     * This function process the PHPExcel library to upload budget items to the database
     */
    public function upload_budget($id){

        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'xlsx|xls';
        $config['max_size']             = 0;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('budget'))
        {
            $data = array('upload_data' => $this->upload->data());
            $file = $data['upload_data']['file_name'];
            //load the excel library
            $this->load->library('excel');
            //read file from path
            $objPHPExcel = PHPExcel_IOFactory::load('./upload/'.$file);
            $objWorksheet = $objPHPExcel->getActiveSheet();

            foreach ($objWorksheet->getRowIterator() as $row) {
                $in = "";
                $ic = "0";
                $ip = "0";
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(true);
                foreach ($cellIterator as $cell) {
                    if($cell->getColumn() == "A") {
                        $in = $cell->getValue();
                    }elseif($cell->getColumn() == "B") {
                        $ic = $cell->getValue();
                    }elseif($cell->getColumn() == "C") {
                        $ip = $cell->getValue();
                    }
                }
                if ($in != "Item Name") {
                    $values = array(
                        'item_name' => $in,
                        'item_cost' => $ic,
                        'item_paid' => $ip,
                        'event_id' => $id
                    );
                    $this->event_model->insert_budget($values);
                }
            }
            redirect('event/home/'.$id);
        }
        else
        {
            //$error = array('error' => $this->upload->display_errors());
            //$this->load->view('event/home_view', $error);
        }
    }

    /*
     * This function load new member registration page and process validation of adding new member
     */
    public function new_member($id){

        $data['event_id'] = $id;

        if (!empty($this->session->admin_id)){

            $this->form_validation->set_rules('membername', 'Member Name', 'required');
            $this->form_validation->set_rules('memberpledge', 'Member Pledge', 'numeric');
            $this->form_validation->set_rules('membercash', 'Member Cash', 'numeric');
            $this->form_validation->set_rules('memberphone', 'Phone Number', 'numeric');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('event/newMember_view', $data);
            } else {
                $values = array(
                    'member_name' => $this->input->post('membername'),
                    'member_pledge' => $this->input->post('memberpledge'),
                    'member_cash' => $this->input->post('membercash'),
                    'member_phone' => $this->input->post('memberphone'),
                    'event_id' => $id
                );

                $this->event_model->insert_member($values);

                redirect('event/home/'.$id);
            }
        } else {
            redirect('admin');
        }
    }

    /*
     * This function load new budget item page and process validation of adding new budget item
     */
    public function new_item($id){

        $data['event_id'] = $id;

        if (!empty($this->session->admin_id)){

            $this->form_validation->set_rules('itemname', 'Item Name', 'required');
            $this->form_validation->set_rules('itemcost', 'Item Cost', 'numeric');
            $this->form_validation->set_rules('itempaid', 'Item Paid', 'numeric');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('event/newItem_view', $data);
            } else {
                $values = array(
                    'item_name' => $this->input->post('itemname'),
                    'item_cost' => $this->input->post('itemcost'),
                    'Item_paid' => $this->input->post('itempaid'),
                    'event_id' => $id
                );

                $this->event_model->insert_budget($values);

                redirect('event/home/'.$id);
            }
        } else {
            redirect('admin');
        }
    }

    /*
     * This function load member details to the edit member page and process validation of updating member details
     */
    public function edit_member($id) {

        $data['member_id'] = $id;
        $data['member_detail'] = $this->event_model->member_detail($id);
        $event_id = $this->event_model->event_id($id);

        if (!empty($this->session->admin_id)){

            $this->form_validation->set_rules('membername', 'Member Name', 'required');
            $this->form_validation->set_rules('memberpledge', 'Member Pledge', 'numeric');
            $this->form_validation->set_rules('membercash', 'Member Cash', 'numeric');
            $this->form_validation->set_rules('memberphone', 'Phone Number', 'numeric');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('event/editMember_view', $data);
            } else {
                $values = array(
                    'member_name' => $this->input->post('membername'),
                    'member_phone' => $this->input->post('memberphone'),
                );

                $this->event_model->update_member($values, $id);

                redirect('event/home/'.$event_id);
            }
        } else {
            redirect('admin');
        }
    }

    /*
     * This function load budget item details to the budget item edit page and process validation of updating
     * budget item details
     */
    public function edit_budget($id) {

        $data['item_id'] = $id;
        $data['item_detail'] = $this->event_model->budget_detail($id);
        $event_id = $this->event_model->event_id($id);

        if (!empty($this->session->admin_id)){

            $this->form_validation->set_rules('membername', 'Member Name', 'required');
            $this->form_validation->set_rules('memberpledge', 'Member Pledge', 'numeric');
            $this->form_validation->set_rules('membercash', 'Member Cash', 'numeric');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('event/editBudget_view', $data);
            } else {
                $values = array(
                    'member_name' => $this->input->post('itemname'),
                );

                $this->event_model->update_budget($values, $id);

                redirect('event/home/'.$event_id);
            }
        } else {
            redirect('admin');
        }
    }

    /*
     * This function process all transaction ie(Pledge, Cash, Cost, Payment)
     * Pledge = This is the amount member pledge
     * Cash = This is the amount member have already submit it to the accountant
     * Cost = This is the amount budget item cost
     * Payment = This is the amount budget item paid
     **/
    public function transaction($type, $id){

        $data['type'] = $type;
        if($type == 'Cash' || $type == 'Pledge'){
            $data['member_id'] = $id;
            $data['member_detail'] = $this->event_model->member_detail($id);
        } elseif ($type == 'Cost' || $type == 'Payment'){
            $data['item_id'] = $id;
            $data['item_detail'] = $this->event_model->budget_detail($id);
        }

        if (!empty($this->session->admin_id)){

            $this->form_validation->set_rules('amount', 'Amount', 'numeric|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('event/transaction_view', $data);
            } else {
                if($type == 'Pledge'){
                    $np = $this->input->post('amount') + $this->input->post('memberpledge');
                    $values = array(
                        'member_pledge' => $np
                    );

                    $this->event_model->update_member($values, $id);
                    redirect('event/edit_member/'.$id);
                }
                if($type == 'Cash'){
                    if($this->input->post('amount') > $this->input->post('memberpledge') ){
                        $np = 0;
                    }else{
                        $np = $this->input->post('memberpledge') - $this->input->post('amount');
                    }
                    $nc = $this->input->post('amount') + $this->input->post('membercash');
                    $values = array(
                        'member_pledge' => $np,
                        'member_cash' => $nc
                    );

                    $this->event_model->update_member($values, $id);
                    redirect('event/edit_member/'.$id);
                }
                if($type == 'Cost'){
                    $ic = $this->input->post('amount') + $this->input->post('itemcost');
                    $values = array(
                        'item_cost' => $ic
                    );

                    $this->event_model->update_budget($values, $id);
                    redirect('event/edit_budget/'.$id);
                }
                if($type == 'Payment'){
                    $ip = $this->input->post('amount') + $this->input->post('itempaid');
                    $values = array(
                        'item_paid' => $ip
                    );

                    $this->event_model->update_budget($values, $id);
                    redirect('event/edit_budget/'.$id);
                }
            }
        } else {
            redirect('admin');
        }
    }

    /*
     * This function process the download of Member template excel file and Budget Template excel file
     */
    public function template($name){
        if ($name == 'member'){
            redirect(base_url('templates/MemberTemplate.xlsx'));
        } elseif ($name == 'budget') {
            redirect(base_url('templates/BudgetTemplate.xlsx'));
        }
    }

    /*
     * This is the test function to test the upload of the document
     */
    public function do_upload()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'xls|xlsx';
        $config['max_size']             = 0;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('event/upload_view', $error);
        }
        else
        {
            echo  'hi';
            //$data = array('upload_data' => $this->upload->data());

            //$this->load->view('upload_success', $data);
        }
    }


    public function reports(){
        $id=1;

        if (!empty($this->session->admin_id) || !empty($this->session->event_id) ) {


            $data['event_details'] = $this->event_model->event_details($id);
            $data['member_details'] = $this->event_model->member_details($id);
            $data['budget_details'] = $this->event_model->budget_details($id);
            $data['pledge_sum'] = $this->event_model->pledge_sum($id);
            $data['cash_sum'] = $this->event_model->cash_sum($id);
            $data['budget_sum'] = $this->event_model->budget_sum($id);
            $data['advance_sum'] = $this->event_model->advance_sum($id);
            $data['event_id'] = $id;
                   /*
            *
            *
            $data = array(
            'category' => $this->input->post('category'),
            'attribute' => $this->input->post('attribute')
            );

        */
            $values = array(
                'category' => 'member',
                'attribute' => '5000',
                'event_id'=>'1'
            );
            $data['event'] = $this->event_model->event_report($values);


            $this->load->view('event/reports_view', $data);
        } else {
            redirect('event');
        }


    }
}
