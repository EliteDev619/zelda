<?php

class Users_Model extends CI_Model{

    public function save($data){
        return $this->db->insert('tbl_users', $data);
    }
    
    public function getUser($filter = array()){
        $this->db->select('ua.*', false);
        $this->db->from('tbl_users ua');

        // Filter by Id
        if(array_key_exists('id', $filter)){
            $this->db->where('ua.user_id', $filter['id']);
            return $this->db->get()->row();   
        }

        // Filter by Role
        if(array_key_exists('role', $filter)){
            $this->db->where('ua.role_id', $filter['role']);
        }

        // Filter by username
        if(array_key_exists('username', $filter)){
            $this->db->where('ua.username', $filter['username']);
        }

        // Filter by password
        if(array_key_exists('password', $filter)){
            $this->db->where('ua.password', $filter['password']);
        }

        $result = $this->db->get()->result();
        return $result;
    }

    public function delete($id){
        $this->db->where('user_id', $id);
        return $this->db->delete('tbl_users');
    }
    
    public function update($data, $id){
        $this->db->where('user_id', $id);
        return $this->db->update('tbl_users', $data);
    }
    
    public function update_status($id, $status) {
        $this->db->set('status', $status);
        $this->db->where('user_id', $id);
        return $this->db->update('tbl_users');
    }

    public function getUserAccount($filter = array()){
        if(array_key_exists('mobcompanyid', $filter))
        {
            $this->session->gatesco_company_id = $filter['mobcompanyid'];
        }

        $this->db->select('ua.*, ur.role_name, uc.company_name', false);
        $this->db->from('tbl_users ua');
        $this->db->join('tbl_user_roles ur', 'ur.role_id = ua.role_id', 'left');
        $this->db->join('tbl_company uc', 'uc.company_id = ua.company_id', 'left');
       
        // Filter by Id
        if(array_key_exists('id', $filter)){
            $this->db->where('ua.user_id', $filter['id']);
            $this->db->where('ua.company_id', $this->session->gatesco_company_id);
            return $this->db->get()->row();   
        }
        // Filter by Role
        if(array_key_exists('role', $filter)){
            $this->db->where('ua.role_id', $filter['role']);
        }
        // Filter by UserName
        if(array_key_exists('name', $filter)){
            $this->db->where('ua.username', $filter['name']);
        }
        // Filter by UserName by inventory user upload
        if(array_key_exists('upload_name', $filter)){
            $this->db->where('ua.username', $filter['upload_name']);
            return $this->db->get()->row();   
        }
        // Filter by Phone
        if(array_key_exists('phone', $filter)){
            $this->db->where('ua.phone', $filter['phone']);
            $this->db->where('ua.company_id', $this->session->gatesco_company_id);
            return $this->db->get()->row();
        }
        // Filter by Email
        if(array_key_exists('email', $filter)){
            $this->db->where('ua.email', $filter['email']);
            $this->db->where('ua.company_id', $this->session->gatesco_company_id);
            return $this->db->get()->row();
        }
        // Filter by Status
        if(array_key_exists('status', $filter)){
            $this->db->where('ua.status', $filter['status']);
        }

        // Filter by Status
        if(array_key_exists('company_Id', $filter)){
            $this->db->where('ua.company_Id', $filter['company_Id']);
        }
        // Login Check
        if(array_key_exists('login', $filter)){
            $username = $filter['login']['username'];
            $password = $filter['login']['password'];
            $this->db->where('ua.username', $username);
            $this->db->where('ua.password', $password);
            return $this->db->get()->row();
        }

        // Filter by Keyword
        if(array_key_exists('keyword', $filter)){
            $this->db->group_start();
            $this->db->like('ur.role_name', $filter['keyword']);
            $this->db->or_like('ua.phone', $filter['keyword']);
            $this->db->or_like('ua.firstname', explode(" ",$filter['keyword'])[0]);
            $this->db->or_like('ua.lastname', explode(" ",$filter['keyword'])[0]);
            if(count(explode(" ",$filter['keyword'])) > 1){
                $this->db->or_like('ua.lastname', explode(" ",$filter['keyword'])[1]);
            }
            $this->db->group_end();
        }

        // Login OTP Check
        if(array_key_exists('otp', $filter)){
            $username = $filter['otp']['username'];
            $otp = $filter['otp']['otp'];
            $this->db->where('ua.username', $username);
            $this->db->where('ua.otp', $otp);
            $this->db->where('ua.company_id', $this->session->gatesco_company_id);
            return $this->db->get()->row();
        }
    // Filter by Keyword
    if(array_key_exists('keyword', $filter)){
        $this->db->group_start();
        $this->db->like('ua.firstname', $filter['keyword']);
        $this->db->or_like('ua.lastname', $filter['keyword']);
        $this->db->or_like('ur.role_name', $filter['keyword']);
        $this->db->group_end();
    }
        // Filter by Order
        if(array_key_exists('order', $filter)){
            $by = $filter['order']['by'];
            switch ($by) {
                case 'id': $column = 'ua.user_id'; break;
                case 'create': $column = 'u.created_at'; break;
                case 'update': $column = 'u.upated_at'; break;
                default: $column = 'ua.user_id'; break;
            }
            $this->db->order_by($column, $filter['order']['order']);
        }

        // Set start and limit
        if(array_key_exists("start", $filter) && array_key_exists("limit", $filter)){
            $this->db->limit($filter['limit'], $filter['start']);
        } elseif(!array_key_exists("start", $filter) && array_key_exists("limit", $filter)){
            $this->db->limit($filter['limit']);
        }
        
        $this->db->where('ua.company_id', $this->session->gatesco_company_id);
        $result = $this->db->get()->result();
        return $result;
    }
    
    
    
    function check_unique_order_no($username,$id = '') {
        $this->db->where('username', $username);
        $this->db->where('status', "1");

        if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get('tbl_users')->num_rows();
    }

    
    public function getUserAllData(){
        $this->db->select('tbl_users.*', false);
        $this->db->from('tbl_users');

        $result = $this->db->get()->result();
        return $result;
    }

    public function getparticularuser($id){
        $this->db->select('tbl_users.*', false);
        $this->db->from('tbl_users');
        $this->db->where('user_id', $id);

        $result = $this->db->get()->row();
        return $result;
    }

    public function getAdminID() {
        $this->db->select('user_id', false);
        $this->db->from('tbl_users');
        $this->db->where('company_id', $this->session->gatesco_company_id);
        $this->db->where('role_id', $this->session->gatesco_company_admin_role);

        $result = $this->db->get()->row();
        return $result->user_id;
    }
}