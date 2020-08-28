<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms_model extends CI_Model {

    public function __construct() {
        // Call parent constructor
        parent::__construct();
        // Load the Users_table class
        $this->load->library('users_table');
      }

    //Get all event list
    function get_all_list(){
        $this->db->select("*");
        $this->db->select('DATE_FORMAT(event_startDate, "%b %e") AS c_date', FALSE);
        $this->db->select('DATE_FORMAT(event_endDate, "%M %e, %Y") AS c_edate', FALSE);
        $this->db->select('DATE_FORMAT(event_time, "%h:%i %p") AS c_time', FALSE);
        // $this->db->select('CONCAT(converted_date, " ", converted_time) AS event_sched');
        $this->db->from('events');
        $this->db->order_by("event_startDate", "desc");
        $this->db->where('event_status !=', 4);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get all event list pending (for dropdown)
    function get_all_list_active(){
        $this->db->select("*");
        $this->db->select('DATE_FORMAT(event_startDate, "%b %e, %Y") AS c_date', FALSE);
        $this->db->select('DATE_FORMAT(event_time, "%h:%i %p") AS c_time', FALSE);
        // $this->db->select('CONCAT(converted_date, " ", converted_time) AS event_sched');
        $this->db->from('events');
        $this->db->order_by("event_startDate", "desc");
        $this->db->where('event_status', 0);
        // $this->db->or_where('event_status', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get all event list
    function get_event($event_id){
        $this->db->select("*");
        $this->db->select('DATE_FORMAT(event_startDate, "%M %e, %Y") AS c_date', FALSE);
        $this->db->select('DATE_FORMAT(event_endDate, "%M %e, %Y") AS c_edate', FALSE);
        $this->db->select('DATE_FORMAT(event_time, "%h:%i %p") AS c_time', FALSE);
        $this->db->select('DATE_FORMAT(event_created, "%M %e, %Y") AS c_created', FALSE);
        $this->db->from('events');
        $this->db->where('event_id', $event_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get event criteria
    function get_event_criteria($event_id){
        $this->db->select("*");
        $this->db->from('event_criteria');
        $this->db->where('event_id', $event_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get event participants
    function get_event_participants($event_id){
        $this->db->select('*');
        $this->db->from('event_participants');
        $this->db->where('event_id', $event_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get all judges
    function get_event_judges($event_id){
        $this->db->select('*, je.status as je_status');
        $this->db->from('judges_event je');
        $this->db->join('users u', 'je.judge_id = u.user_id');
        $this->db->where('je.event_id', $event_id);
        $this->db->where('je.status !=', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get list for current judge account
    function get_list(){
        $this->db->select("*");
        $this->db->from('judges_event je');
        $this->db->join('events e', 'je.event_id = e.event_id');
        $this->db->where('je.judge_id', $this->session->userdata('SESS_USER_ID'));
        $this->db->where('e.event_status', 0);
        $this->db->order_by('e.event_startDate', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get list for current month
    function get_limit(){
        $this->db->select("*");
        $this->db->select('DATE_FORMAT(event_startDate, "%M %D") AS c_date', FALSE);
        $this->db->from('events');
        $this->db->where("MONTH(event_startDate) = MONTH(CURDATE())");
        $this->db->where('event_status !=', 3);
        $this->db->where('event_status !=', 4);
        $this->db->order_by("event_startDate", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get all judges
    function get_judges(){
        $this->db->select('user_id, CONCAT(fname, " ", lname) as name', FALSE);
        $this->db->from('users');
        $this->db->where('role', 'Judge');
        $this->db->where('status', 0);
        $this->db->order_by('user_id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get requested user
    function get_user($user_id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get all users
    function get_users(){
        $this->db->select('*, CONCAT(fname, " ", lname) as f_name', FALSE);
        $this->db->from('users');
        $this->db->where('status !=', 2);
        $this->db->order_by("user_id", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get judges scores for free judging
    function get_judges_scores_1($event_id){
        $this->db->select('*,ep.fname,
            js.event_id, 
            js.event_participants_id, 
            CAST(AVG(js.score) AS DECIMAL(10,1)) as score', FALSE);
        $this->db->from('judges_scores js');
        $this->db->join('event_participants ep', 'ep.event_participants_id = js.event_participants_id');
        $this->db->where('js.event_id', $event_id);
        $this->db->group_by('js.event_participants_id');
        $this->db->order_by('score', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get judges scores for percentage judging
    function get_judges_scores_2($event_id){
        $this->db->select('*');
        $this->db->from('judges_scores js');
        $this->db->join('event_participants ep', 'ep.event_participants_id = js.event_participants_id');
        $this->db->join('event_criteria ec', 'ec.event_criteria_id = js.event_criteria_id');
        $this->db->where('js.event_id', $event_id);
        $this->db->order_by('js.judges_scores_id', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get judges scores for range judging
    function get_judges_scores_3($event_id){
        $this->db->select('*,ep.fname,
            js.event_id, 
            js.event_participants_id, 
            CAST(AVG(js.score) AS DECIMAL(10,1)) as score', FALSE);
        $this->db->from('judges_scores js');
        $this->db->join('event_participants ep', 'ep.event_participants_id = js.event_participants_id');
        $this->db->where('js.event_id', $event_id);
        $this->db->group_by('js.event_participants_id');
        $this->db->order_by('score', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get judges scores for ranking based judging
    function get_judges_scores_4($event_id){
        $this->db->select('*,ep.fname,
            js.event_id, 
            js.event_participants_id, 
            SUM(js.score) as score', FALSE);
        $this->db->from('judges_scores js');
        $this->db->join('event_participants ep', 'ep.event_participants_id = js.event_participants_id');
        $this->db->where('js.event_id', $event_id);
        $this->db->group_by('js.event_participants_id');
        $this->db->order_by('score', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get all individual and detailed scores for free judging type
    function get_scores_1($part_id){
        $this->db->select('*, u.fname as judge_fname, ep.fname as fname');
        $this->db->from('judges_scores js');
        $this->db->join('event_participants ep', 'ep.event_participants_id = js.event_participants_id');
        $this->db->join('users u', 'u.user_id = js.judge_id');
        $this->db->where('js.event_participants_id', $part_id);
        // $this->db->order_by('score', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Get all individual and detailed scores for percentage AND range judging type
    function get_scores_2($part_id){
        $this->db->select('*, u.fname as judge_fname, ep.fname as fname');
        $this->db->from('judges_scores js');
        $this->db->join('event_participants ep', 'ep.event_participants_id = js.event_participants_id');
        $this->db->join('event_criteria ec', 'ec.event_criteria_id = js.event_criteria_id');
        $this->db->join('users u', 'u.user_id = js.judge_id');
        $this->db->where('js.event_participants_id', $part_id);
        // $this->db->order_by('score', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Add user
    function register($userInfo){
        $this->db->insert('users', $userInfo); 
        return $this->db->insert_id();
    }

    //Add event
    function add($event){
        $this->db->insert('events', $event); 
        return $this->db->insert_id();
    }

    //Add judges' event
    function add_judges_event($judgesEventInfo){
        $this->db->insert('judges_event', $judgesEventInfo); 
        return $this->db->insert_id();
    }

    //Add event criteria
    function add_event_criteria($criteriaNamesInfo){
        $this->db->insert('event_criteria', $criteriaNamesInfo); 
        return $this->db->insert_id();
    }

    //Add event participants
    function add_event_participants($participantsInfo){
        $this->db->insert('event_participants', $participantsInfo); 
        return $this->db->insert_id();
    }

    //Update event
    function update($event, $event_id){
        $this->db->where('event_id', $event_id);
        return $this->db->update('events', $event);
    }

    //Update event
    function update_user($userInfo, $user_id){
        $this->db->where('user_id', $user_id);
        return $this->db->update('users', $userInfo);
    }

    //Update past judges' event to 1
    function update_judges_event($event_id){
        $this->db->set('status', 1);
        $this->db->where('event_id', $event_id);
        return $this->db->update('judges_event');
    }

    //Update participant
    function update_participant($data, $id){
        $this->db->where('event_participants_id', $id);
        return $this->db->update('event_participants', $data);
    }

    //Toggle to inactive
    function toggle_to_inactive($event_id){
        $this->db->set('event_status', 0);
        $this->db->where('event_id', $event_id);
        return $this->db->update('events');
    }

    //Toggle to active
    function toggle_to_active($event_id){
        $this->db->set('event_status', 1);
        $this->db->where('event_id', $event_id);
        return $this->db->update('events');
    }

    //Event done
    function event_to_done($event_id){
        $this->db->set('event_status', 2);
        $this->db->where('event_id', $event_id);
        return $this->db->update('events');
    }

    //Event cancel
    function event_to_cancel($event_id){
        $this->db->set('event_status', 3);
        $this->db->where('event_id', $event_id);
        return $this->db->update('events');
    }

    //Event cancel
    function event_to_delete($event_id){
        $this->db->set('event_status', 4);
        $this->db->where('event_id', $event_id);
        return $this->db->update('events');
    }

    //Toggle to deactivate
    function toggle_to_deactivate($user_id){
        $this->db->set('status', 1);
        $this->db->where('user_id', $user_id);
        return $this->db->update('users');
    }

    //Toggle to deactivate
    function toggle_to_activate($user_id){
        $this->db->set('status', 0);
        $this->db->where('user_id', $user_id);
        return $this->db->update('users');
    }

    //Toggle to deactivate
    function user_delete($user_id){
        $this->db->set('status', 2);
        $this->db->where('user_id', $user_id);
        return $this->db->update('users');
    }

}