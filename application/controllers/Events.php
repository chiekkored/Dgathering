<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('events_model');
        $this->load->Model('cms_model');
    }

    public function index(){
    	if($this->session->userdata('SESS_IS_LOGGED')) {
    		$this->load->view('pages/events');
    	}else{
    		redirect('home', 'refresh');
    	}
        
	}

	public function view($slug = NULL){
		if ( "Judge" == $this->session->userdata('SESS_ROLE')) {
			if($this->session->userdata('SESS_IS_LOGGED')) {
				$data['event'] = $this->events_model->view_event($slug);

                //Check judge if done judging
                $user_id = $this->session->userdata('SESS_USER_ID');
                $check_judge = $this->events_model->check_judge_status($data['event']['event_id'], $user_id);

				if (!$data['event']) {
					show_404();
				}
                //free judging and ranking based
                if ($data['event']['event_type'] == 1 || $data['event']['event_type'] == 4) {
                    if ($check_judge[0]['status'] == 0) {
                        $this->load->view('judging/free-judging', $data);
                    } else {
                        $this->load->view('judging/done-judging');
                    }
                //percent judging
                }else if ($data['event']['event_type'] == 2) {
                    if ($check_judge[0]['status'] == 0) {
                        $this->load->view('judging/percentage-judging', $data);
                    } else {
                        $this->load->view('judging/done-judging');
                    }
                //range judging
                }else if ($data['event']['event_type'] == 3) {
                    if ($check_judge[0]['status'] == 0) {
                        $this->load->view('judging/range-judging', $data);
                    } else {
                        $this->load->view('judging/done-judging');
                    }
                    
                }

			}else{
				redirect('events', 'refresh');
			}
		}else{
			redirect('events', 'refresh');
		}
	}
    

	public function get() {
		if($this->input->is_ajax_request()) {
			$data=$this->events_model->get_list();
	        echo json_encode($data);
	    } else {
	    	redirect('home', 'refresh');
	    }
	}


	//Get view event
    public function get_event() {
        if($this->input->is_ajax_request()) {
            $event_id = $this->input->post('event_id');
            $data['event_details'] = $this->cms_model->get_event($event_id);
            $data['criteria'] = $this->cms_model->get_event_criteria($event_id);
            $data['participants'] = $this->cms_model->get_event_participants($event_id);
            echo json_encode($data);
        } else {
            redirect('home', 'refresh');
        }
    }

        
        
}