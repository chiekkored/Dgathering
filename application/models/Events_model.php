<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events_model extends CI_Model {

    public function __construct() {
        // Call parent constructor
        parent::__construct();
        // Load the Users_table class
        $this->load->library('users_table');
      }

    function view_event($slug){
        $this->db->select("*");
        $this->db->from('judges_event je');
        $this->db->join('events e', 'je.event_id = e.event_id');
        $this->db->where('e.slug', $slug);
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_list(){
        $this->db->select("*");
        $this->db->select('DATE_FORMAT(e.event_startDate, "%M %e, %Y") AS event_sdate', FALSE);
        $this->db->select('DATE_FORMAT(e.event_endDate, "%M %e, %Y") AS event_edate', FALSE);
        $this->db->select('DATE_FORMAT(e.event_time, "%h:%i %p") AS event_time', FALSE);
        $this->db->from('judges_event je');
        $this->db->join('events e', 'je.event_id = e.event_id');
        $this->db->where('je.judge_id', $this->session->userdata('SESS_USER_ID'));
        $this->db->where('e.event_status !=', 3);
        $this->db->where('e.event_status !=', 4);
        $this->db->where('je.status !=', 1);
        $this->db->order_by('e.event_startDate', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Check judge's status if done judging or not
    function check_judge_status($event_id, $judge_id){
        $this->db->select('status');
        $this->db->from('judges_event');
        $this->db->where('judge_id', $judge_id);
        $this->db->where('event_id', $event_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
}