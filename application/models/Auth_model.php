<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {



     public function __construct() {
    // Call parent constructor
    parent::__construct();
    // Load the Users_table_table class
    $this->load->library('users_table');
  }
    
    public function login($username, $password){
        $result = FALSE;
        $this->db->select(implode(', ', array(
          Users_table::_USER_ID,
          Users_table::_USERNAME,
          Users_table::_FNAME,
          Users_table::_STATUS,
          Users_table::_ROLE
        )));
        $this->db->from(Users_table::_TABLE_NAME);
        $this->db->where(Users_table::_USERNAME, $username);
        $this->db->where(Users_table::_PASSWORD, sha1($password));
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() === 1) {
            $result = $query->row_array();
            $this->session->set_userdata('SESS_IS_LOGGED', TRUE);
            // Set the user ID
            $this->session->set_userdata('SESS_USER_ID', $result[Users_table::_USER_ID]);
            // Set the username
            $this->session->set_userdata('SESS_USERNAME', $result[Users_table::_USERNAME]);
            // Set the username
            $this->session->set_userdata('SESS_FNAME', $result[Users_table::_FNAME]);
            // Set the role of the user
            $this->session->set_userdata('SESS_ROLE', $result[Users_table::_ROLE]);
        }

        return $result;  
    }

    //Check and login remember token
    function check_rem_token($token){
        $result = FALSE;
        $this->db->select(implode(', ', array(
          Users_table::_USER_ID,
          Users_table::_USERNAME,
          Users_table::_FNAME,
          Users_table::_STATUS,
          Users_table::_ROLE
        )));
        $this->db->from(Users_table::_TABLE_NAME);
        $this->db->where('rem_token', $token);
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() === 1) {
            $result = $query->row_array();
            $this->session->set_userdata('SESS_IS_LOGGED', TRUE);
            // Set the user ID
            $this->session->set_userdata('SESS_USER_ID', $result[Users_table::_USER_ID]);
            // Set the username
            $this->session->set_userdata('SESS_USERNAME', $result[Users_table::_USERNAME]);
            // Set the username
            $this->session->set_userdata('SESS_FNAME', $result[Users_table::_FNAME]);
            // Set the role of the user
            $this->session->set_userdata('SESS_ROLE', $result[Users_table::_ROLE]);
        }

        return $result;  
    }

    //Update remember token
    function update_rem_token($user_id, $token){
        $this->db->set('rem_token', $token);
        $this->db->where('user_id', $user_id);
        return $this->db->update('users');
    }

    //Update password
    function change_password($user_id, $password){
        $this->db->set('password', sha1($password));
        $this->db->where('user_id', $user_id);
        return $this->db->update('users');
    }
    
}