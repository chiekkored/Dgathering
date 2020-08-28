<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Judging_model extends CI_Model {

    public function __construct() {
        // Call parent constructor
        parent::__construct();
        // Load the Users_table class
        $this->load->library('users_table');
      }

    //Get event's participants
    function get_participants($event_id, $user_id){
        $this->db->select('*');
        $this->db->from('judges_event je');
        $this->db->join('event_participants ep', 'ep.event_id = je.event_id');
        $this->db->where('je.event_id', $event_id);
        $this->db->where('je.judge_id', $user_id);
        $this->db->where('je.status', 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get event's criteria
    function get_criteria($event_id){
        $this->db->select('*');
        $this->db->from('event_criteria');
        $this->db->where('event_id', $event_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Post judge's scores
    function post_judge_score($judgeScoreInfo){
        $this->db->insert('judges_scores', $judgeScoreInfo); 
        return $this->db->insert_id();
    }

    //Update judge's event to done !! status = 0 = pending, 1 = deleted, 2 = done
    function judge_done($event_id, $judge_id){
        $this->db->set('status', 2);
        $this->db->where('judge_id', $judge_id);
        $this->db->where('event_id', $event_id);
        $this->db->where('status', 0);
        return $this->db->update('judges_event');
    }
    
}