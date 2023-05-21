<?php

class Bets_Model extends CI_Model{

    public function save($data){
        return $this->db->insert('tbl_bets', $data);
    }

    public function getBet($filter = array()){
        $this->db->select('b.*', false);
        $this->db->from('tbl_bets b');

        // Filter by Id
        if(array_key_exists('id', $filter)){
            $this->db->where('b.bet_id', $filter['id']);
            return $this->db->get()->row();   
        }

        // Filter by event_id
        if(array_key_exists('event_id', $filter)){
            $this->db->where('b.event_id', $filter['event_id']);
        }

        // Filter by user_id
        if(array_key_exists('user_id', $filter)){
            $this->db->where('b.user_id', $filter['user_id']);
        }

        // Filter by bet_on
        if(array_key_exists('bet_on', $filter)){
            $this->db->where('b.bet_on', $filter['bet_on']);
        }

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