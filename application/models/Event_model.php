<?php

/**
 * Created by PhpStorm.
 * User: Minja Junior
 * Date: 11/21/2016
 * Time: 4:24 PM
 */
class Event_model extends CI_Model {

    public function get_location(){
        $this->db->select('*');
        $this->db->from('location');
        $this->db->order_by('location_name', 'asc');
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $response[] = $row;
            }
            return $response;
        }else{
            $response['error'] = 'Locations Not Found';
            return $response;
        }
    }

    public function get_event($id){
        $this->db->select('*');
        $this->db->from('event');
        $this->db->where('event_admin', $id);
        $this->db->order_by('event_name', 'asc');
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $response[] = $row;
            }
            return $response;
        }else{
            $response['error'] = 'Event Not Found';
            return $response;
        }
    }

    public function event_details($id){
        $this->db->select('*');
        $this->db->from('event');
        $this->db->where('event_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $response[] = $row;
            }
            return $response;
        }else{
            $response['error'] = 'Event Not Found';
            return $response;
        }
    }

    public function member_details($id){
        $this->db->select('*');
        $this->db->from('member');
        $this->db->order_by('member_name', 'asc');
        $this->db->where('event_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $response[] = $row;
            }
            return $response;
        }else{
            $response['error'] = '0';
            return $response;
        }
    }

    public function member_detail($id){
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('member_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $response[] = $row;
            }
            return $response;
        }else{
            $response['error'] = '0';
            return $response;
        }
    }

    public function budget_details($id){
        $this->db->select('*');
        $this->db->from('budget');
        $this->db->order_by('item_name', 'asc');
        $this->db->where('event_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $response[] = $row;
            }
            return $response;
        }else{
            $response['error'] = '0';
            return $response;
        }
    }

    public function budget_detail($id){
        $this->db->select('*');
        $this->db->from('budget');
        $this->db->where('item_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $response[] = $row;
            }
            return $response;
        }else{
            $response['error'] = '0';
            return $response;
        }
    }

    public function login($code){
        $this->db->select('*');
        $this->db->from('event');
        $this->db->where('event_code', $code);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    }

    public function create($values){
        $this->db->insert('event', $values);
    }

    public function insert_member($values){
        $this->db->insert('member', $values);
    }

    public function update_member($values, $id){
        $this->db->where('member_id', $id);
        $this->db->update('member', $values);
    }

    public function insert_budget($values){
        $this->db->insert('budget', $values);
    }

    public function update_budget($values, $id){
        $this->db->where('item_id', $id);
        $this->db->update('budget', $values);
    }

    public function pledge_sum($id){
        $this->db->select_sum('member_pledge');
        $this->db->from('member');
        $this->db->where('event_id', $id);
        $query = $this->db->get();
        $row = $query->row_array();
        return $row['member_pledge'];
    }

    public function cash_sum($id){
        $this->db->select_sum('member_cash');
        $this->db->from('member');
        $this->db->where('event_id', $id);
        $query = $this->db->get();
        $row = $query->row_array();
        return $row['member_cash'];
    }

    public function budget_sum($id){
        $this->db->select_sum('item_cost');
        $this->db->from('budget');
        $this->db->where('event_id', $id);
        $query = $this->db->get();
        $row = $query->row_array();
        return $row['item_cost'];
    }

    public function advance_sum($id){
        $this->db->select_sum('item_paid');
        $this->db->from('budget');
        $this->db->where('event_id', $id);
        $query = $this->db->get();
        $row = $query->row_array();
        return $row['item_paid'];
    }

    public function event_id($id){
        $this->db->select('event_id');
        $this->db->from('member');
        $this->db->where('member_id', $id);
        $query = $this->db->get();
        $row = $query->row_array();
        return $row['event_id'];
    }
}