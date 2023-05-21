<?php

class Events_Model extends CI_Model{

    public function save($data){
        return $this->db->insert('tbl_events', $data);
    }
    
    public function getEvent($filter = array()){
        $this->db->select('ev.*', false);
        $this->db->from('tbl_events ev');

        // Filter by Id
        if(array_key_exists('id', $filter)){
            $this->db->where('ev.event_id', $filter['id']);
            return $this->db->get()->row();   
        }

        // Filter by Role
        if(array_key_exists('role', $filter)){
            $this->db->where('ev.role_id', $filter['role']);
        }

        // Filter by username
        if(array_key_exists('username', $filter)){
            $this->db->where('ev.username', $filter['username']);
        }

        // Filter by password
        if(array_key_exists('password', $filter)){
            $this->db->where('ev.password', $filter['password']);
        }

        $this->db->order_by("status", "asc");

        $result = $this->db->get()->result();
        return $result;
    }

    public function delete($id){
        $this->db->where('event_id', $id);
        return $this->db->delete('tbl_events');
    }
    
    public function update($data, $id){
        $this->db->where('event_id', $id);
        return $this->db->update('tbl_events', $data);
    }
    
    public function update_status($id, $status) {
        $this->db->set('status', $status);
        $this->db->where('event_id', $id);
        return $this->db->update('tbl_events');
    }
}