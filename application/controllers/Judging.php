<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Judging extends CI_Controller {
        public function __construct() {
            parent::__construct();
        	$this->load->Model('judging_model');
        }


        public function index(){
            // $this->Auth_model->isLoggedIn();
            $judge_id = $_POST['judge_id'];
            $this->load->view('pages/judging', $judge_id);
	}

    //Get event's participants
    public function get_participants() {
        if($this->input->is_ajax_request()) {
            $event_id = $this->input->post('event_id');
            $user_id = $this->session->userdata('SESS_USER_ID');
            echo json_encode($this->judging_model->get_participants($event_id, $user_id));
        } else {
            redirect('home', 'refresh');
        }
    }

    //Get event's participants and criteria
    public function get_event_data() {
        if($this->input->is_ajax_request()) {
            $event_id = $this->input->post('event_id');
            $user_id = $this->session->userdata('SESS_USER_ID');

            $data['participants'] = $this->judging_model->get_participants($event_id, $user_id);
            $data['criteria'] = $this->judging_model->get_criteria($event_id);

            echo json_encode($data);
        } else {
            redirect('home', 'refresh');
        }
    }
        
    
	//Post judge's scores (FREE JUDGING)
    public function post_scores_1() {
        if($this->input->is_ajax_request()) {
            $event_id = $this->input->post('event_id');
            $judge_id = $this->session->userdata('SESS_USER_ID');

            $this->judging_model->judge_done($event_id, $judge_id);

            $participantsIDs = json_decode( $this->input->post('event_participants_id'), true );

            $scores = json_decode( $this->input->post('score'), true );

            $length = count($participantsIDs);
            for($i=0; $i<$length; $i++)
            {
                $judgeScoreInfo['event_participants_id'] = $participantsIDs[$i];
                $judgeScoreInfo['event_id'] = $event_id;
                $judgeScoreInfo['judge_id'] = $judge_id;
                $judgeScoreInfo['score'] = $scores[$i];

                $this->judging_model->post_judge_score($judgeScoreInfo);
            }

            echo json_encode('success');
        } else {
            redirect('home', 'refresh');
        }
    } 

    //Post judge's scores (PERCENTAGE CRITERIA)
    public function post_scores_2() {
        if($this->input->is_ajax_request()) {
            $event_id = $this->input->post('event_id');
            $judge_id = $this->session->userdata('SESS_USER_ID');

            $this->judging_model->judge_done($event_id, $judge_id);

            $participantsIDs = json_decode( $this->input->post('event_participants_id'), true );
            $scores = json_decode( $this->input->post('score'), true );
            $criteriaIDs = json_decode( $this->input->post('event_criteria_id'), true );

            $criteriaLength = $this->input->post('criteriaLength');

            $criteriaLengthbase = $criteriaLength;

            $length = count($participantsIDs);
            
            $judgesScoresLength = $criteriaLength*$length;
            $j = 0;
            for($k=0; $k<$length; $k++)
            {
                $judgeScoreInfo['event_participants_id'] = $participantsIDs[$k];
                $judgeScoreInfo['event_id'] = $event_id;
                $judgeScoreInfo['judge_id'] = $judge_id;
                $c = 0;
                  
                    while ($j < $criteriaLength) {
                        $judgeScoreInfo['score'] = $scores[$j];
                        $judgeScoreInfo['event_criteria_id'] = $criteriaIDs[$c];
                        $this->judging_model->post_judge_score($judgeScoreInfo);
                        $j++;
                        $c++;
                    }

                if ($criteriaLength != $judgesScoresLength) {
                    $criteriaLength = $criteriaLength + $criteriaLengthbase;
                }
            }

            echo json_encode('success');
        } else {
            redirect('home', 'refresh');
        }
    }    
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */