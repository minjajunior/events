<?php

/**
 * Created by PhpStorm.
 * User: Minja Junior
 * Date: 11/21/2016
 * Time: 10:25 AM
 */
class Admin extends CI_Controller {

    public function index(){

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login_view');
        } else {
            $value = $this->admin_model->login($this->input->post('email'));

            if(!empty($value)){
                if($value['admin_password'] == md5($this->input->post('password'))){
                    $this->session->set_userdata($value);
                    redirect('admin/home');
                }else{
                    $this->load->view('admin/login_view');
                }
            }else {
                //echo 'This email does not have any account in our system. sign up here';
                $this->load->view('admin/login_view');
            }
        }
    }

    public function register(){

        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'E-mail Address', 'required|valid_email|is_unique[admin.admin_email]');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Re-Enter Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/register_view');
        } else {
            $values = array(
                'admin_name' => $this->input->post('fullname'),
                'admin_email' => $this->input->post('email'),
                'admin_phone' => $this->input->post('phone'),
                'admin_password' => md5($this->input->post('password'))
            );

            $this->admin_model->register($values);

            //$this->email->from('admin@pricecheck.co.tz', 'Admin');
            //$this->email->to($this->input->post('email'));
            //$this->email->subject('Welcome '.$this->input->post('username'));
            //$this->email->message('Thanks for Register in Price Check. To activate your Account click the following link
            //http://www.utamuescorts.net/index.php/escort/activate/'.$eid );
            //$this->email->send();

            redirect('admin');
        }
    }

    public function home(){
        $data['event'] = $this->event_model->get_event($this->session->admin_id);

        if (!empty($this->session->admin_id)){
            $this->load->view('admin/home_view', $data);
        } else {
            redirect('admin');
        }

    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('admin');
    }
}