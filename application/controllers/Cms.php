<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('logs_model');
        $this->load->Model('events_model');
        $this->load->Model('cms_model');
    }

    public function index(){
        if ( "Administrator" == $this->session->userdata('SESS_ROLE')) {
            if($this->session->userdata('SESS_IS_LOGGED')) {
                // $this->output->cache(15);
                $this->load->view('cms/home');
            }else{
                redirect('', 'refresh');
            }
        }else{
            redirect('home', 'refresh');
        }
    }

    public function events(){
        if ( "Administrator" == $this->session->userdata('SESS_ROLE')) {
            if($this->session->userdata('SESS_IS_LOGGED')) {
                // $this->output->cache(15);
                $this->load->view('cms/events');
            }else{
                redirect('', 'refresh');
            }
        }else{
            redirect('home', 'refresh');
        }
    }

    public function users(){
        if ( "Administrator" == $this->session->userdata('SESS_ROLE')) {
            if($this->session->userdata('SESS_IS_LOGGED')) {
                // $this->output->cache(15);
                $this->load->view('cms/users');
            }else{
                redirect('', 'refresh');
            }
        }else{
            redirect('home', 'refresh');
        }
    }

    public function logs(){
        if ( "Administrator" == $this->session->userdata('SESS_ROLE')) {
            if($this->session->userdata('SESS_IS_LOGGED')) {
                // $this->output->cache(15);
                $this->load->view('cms/logs');
            }else{
                redirect('', 'refresh');
            }
        }else{
            redirect('home', 'refresh');
        }
    }

    // public function view($slug = NULL){
    //     if ( "Administrator" == $this->session->userdata('SESS_ROLE')) {
    //         if($this->session->userdata('SESS_IS_LOGGED')) {
    //             $data['event'] = $this->events_model->view_event($slug);

    //             if (!$data['event']) {
    //                 show_404();
    //             }
                
    //         }else{
    //             redirect('', 'refresh');
    //         }
    //     }else{
    //         redirect('home', 'refresh');
    //     }
    // }
    
    public function register() {
        // Check if this is an AJAX request
        if($this->input->is_ajax_request()) {

            // Insert user
            $userInfo['fname'] = $this->input->post('fname');
            $userInfo['lname'] = $this->input->post('lname');
            $userInfo['username'] = $this->input->post('username');
            $userInfo['password'] = sha1($this->input->post('password'));
            $userInfo['role'] = $this->input->post('role');

            if ( isset($_FILES['user_image']) ) {
                $userInfo['user_image'] = $this->do_upload('user_image');
                if ($userInfo['user_image'] == "false") {
                    $userInfo['user_image'] = "";
                }
            }
            
            $resultUserInfo = $this->cms_model->register($userInfo);


            if($resultUserInfo){
             $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
             $this->session->userdata('SESS_USERNAME') . ' has added a user entry: ' .
                 $this->input->post('username') . '.');
            }
            echo json_encode ('success');
        } else {
            // Redirect to the login page if it is not an AJAX request
            redirect('', 'refresh');
        }
    }


    //Get all event list
    public function get_all() {
        if($this->input->is_ajax_request()) {
            $data=$this->cms_model->get_all_list();
            echo json_encode($data);
        } else {
            redirect('home', 'refresh');
        }
    }

    //Get all event list
    public function get_all_active() {
        if($this->input->is_ajax_request()) {
            $data=$this->cms_model->get_all_list_active();
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
            $data['judges'] = $this->cms_model->get_event_judges($event_id);
            
            $type = $data['event_details'][0]['event_type'];
            $data['winners'] = $this->get_winners($event_id, $type);

            echo json_encode($data);
        } else {
            redirect('home', 'refresh');
        }
    }

    //Get list for current judge account
    public function get() {
        if($this->input->is_ajax_request()) {
            $data=$this->cms_model->get_list();
            echo json_encode($data);
        } else {
            redirect('home', 'refresh');
        }
    }

    //Get list for current month
    public function get_limit_events() {
        if($this->input->is_ajax_request()) {
            echo json_encode($this->cms_model->get_limit());
        } else {
            redirect('home', 'refresh');
        }
    }

    //Get all judges
    public function get_judges() {
        if($this->input->is_ajax_request()) {
            echo json_encode($this->cms_model->get_judges());
        } else {
            redirect('home', 'refresh');
        }
    }

    //Get all users
    public function get_users() {
        if($this->input->is_ajax_request()) {
            echo json_encode($this->cms_model->get_users());
        } else {
            redirect('home', 'refresh');
        }
    }

    //Get requested users
    public function get_user() {
        if($this->input->is_ajax_request()) {
            $user_id = $this->input->post('user_id');
            echo json_encode($this->cms_model->get_user($user_id));
        } else {
            redirect('home', 'refresh');
        }
    }

    //Get 5 logs
    public function get_limit_logs() {
        if($this->input->is_ajax_request()) {
            echo json_encode($this->logs_model->get_limit());
        } else {
            redirect('home', 'refresh');
        }
    }

    //Get 5 logs
    public function get_logs() {
        if($this->input->is_ajax_request()) {
            echo json_encode($this->logs_model->get_all());
        } else {
            redirect('home', 'refresh');
        }
    }

    //Get 5 logs
    public function get_winners_detailed() {
        if($this->input->is_ajax_request()) {
            $event_id = $this->input->post('event_id');

            $data['event_details'] = $this->cms_model->get_event($event_id);
            $type = $data['event_details'][0]['event_type'];

            $part = $this->get_winners($event_id, $type);
            $win_details['details'] = array();
            if ($type == 1 || $type == 4) {
                for ($i=0; $i < count($part); $i++) {
                    $part_id = $part[$i]['event_participants_id'];
                    array_push($win_details['details'], $this->cms_model->get_scores_1($part_id));
                }
            } else {
                for ($i=0; $i < count($part); $i++) {
                    $part_id = $part[$i]['event_participants_id'];
                    array_push($win_details['details'], $this->cms_model->get_scores_2($part_id));
                }
            }
            

            $criteriaPercent = $this->cms_model->get_event_criteria($event_id);
            $judgesCount = $this->cms_model->get_event_judges($event_id);
            $win_details['event_name'] = $data['event_details'][0]['event_name'];
            $win_details['event_t'] = $type;
            $win_details['judges_c'] = count($judgesCount);
            $win_details['criteria_c'] = count($criteriaPercent);
            echo json_encode($win_details);
        } else {
            redirect('home', 'refresh');
        }
    }

    // public function get_participants() {
    //     if($this->input->is_ajax_request()) {
    //         echo json_encode($this->cms_model->get_limit());
    //     } else {
    //         redirect('home', 'refresh');
    //     }
    // }

    //Image upload in CMS
    //Connected with upload_contact_photo() function
    function do_upload( $fileName ) {
        $path = "./resources/images/uploads";
        //$path = 'resources/media/images';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg|gif|svg';
        $config['encrypt_name'] = true;


        if(!is_dir($path)) {
            mkdir($path);
            chmod($path, 0777);
        }

        $this->upload->initialize($config);
        if (!$this->upload->do_upload( $fileName )) {
            // FOR UPLOAD DEBUGGING
            // $error = array('error' => $this->upload->display_errors());
            // print_r( $error );
            return "false";
        } else {
            $data = array('upload_data' => $this->upload->data());
            return  $data["upload_data"]["file_name"];
        }
    }

    public function edit_user() {
        // Check if this is an AJAX request
        if($this->input->is_ajax_request()) {

            // Update user
            $user_id = $this->input->post('user_id');
            $userInfo['fname'] = $this->input->post('fname');
            $userInfo['lname'] = $this->input->post('lname');
            $userInfo['username'] = $this->input->post('username');
            $userInfo['password'] = sha1($this->input->post('password'));
            $userInfo['role'] = $this->input->post('role');

            if ( isset($_FILES['user_image']) ) {
                $userInfo['user_image'] = $this->do_upload('user_image');
                if ($userInfo['user_image'] == "false") {
                    $userInfo['user_image'] = "";
                }
            }
            
            $resultUserInfo = $this->cms_model->update_user($userInfo, $user_id);


            if($resultUserInfo){
             $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
             $this->session->userdata('SESS_USERNAME') . ' has edited the account: ' .
                 $this->input->post('username') . '.');
            }
            echo json_encode ('success');
        } else {
            // Redirect to the login page if it is not an AJAX request
            redirect('', 'refresh');
        }
    }

    //Add event from CMS page
    public function add_event() {
        if($this->input->is_ajax_request()) {
            //Event name to slug convert
            $slug = strtolower($this->input->post('event_name'));
            $slug = str_replace("&","and",$slug);
            $slug = str_replace("+","-",$slug);
            $slug = str_replace(" ","-",$slug);
            $slug = str_replace("~","-",$slug);
            
            // Insert Event data to events table
            $event['event_name'] = ucwords($this->input->post('event_name'));
            $event['slug'] = $slug;
            $event['event_startDate'] = $this->input->post('event_startDate');
            $event['event_endDate'] = $this->input->post('event_endDate');
            $event['event_time'] = $this->input->post('event_time');
            $event['event_type'] = $this->input->post('event_type');
            $event['event_venue'] = ucfirst($this->input->post('event_venue'));
            $event['event_remarks'] = ucfirst($this->input->post('event_remarks'));
            $event['event_guide'] = ucfirst($this->input->post('event_guide'));
            $event['created_by'] = $this->session->userdata('SESS_USERNAME');

            if ( isset($_FILES['event_image']) ) {
                $event['event_image'] = $this->do_upload('event_image');
                if ($event['event_image'] == "false") {
                    $event['event_image'] = "";
                }
            }
            

            $resultevent = $this->cms_model->add($event);

            // Insert Event data to judges_event table
            if( $resultevent ) {
                $judgesEvent = json_decode( $this->input->post('judge_ids'), true );

                foreach ( $judgesEvent as $item ) {
                    $judgesEventInfo['event_id'] = $resultevent;
                    $judgesEventInfo['judge_id'] = $item['user_id'];

                    $this->cms_model->add_judges_event($judgesEventInfo);
                }
            }

            // Insert Event data to event_criteria table for percentage type
            if( $this->input->post('event_type') == 2 ) {
                $criteriaNames = json_decode( $this->input->post('criteria_names'), true );
                $percents = json_decode( $this->input->post('criteria_percents'), true );

                $length = count($criteriaNames);
                for($i=0; $i<$length; $i++)
                {
                    $criteriaNamesInfo['event_id'] = $resultevent;
                    $criteriaNamesInfo['criteria_name'] = ucwords($criteriaNames[$i]);
                    $criteriaNamesInfo['criteria_percent'] = $percents[$i];

                    $this->cms_model->add_event_criteria($criteriaNamesInfo);
                }
            }

            

            // Insert Event data to event_criteria table for range type
            if( $this->input->post('event_type') == 3 ) {
                $criteriaNames = json_decode( $this->input->post('criteria_names'), true );

                foreach ( $criteriaNames as $item ) {
                        $criteriaNamesInfo['event_id'] = $resultevent;
                        $criteriaNamesInfo['criteria_name'] = ucwords($item);
                        $criteriaNamesInfo['max_range'] = $this->input->post('max_range');
                        $this->cms_model->add_event_criteria($criteriaNamesInfo);
                }
            }

            
            $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
            $this->session->userdata('SESS_USERNAME') . ' added an event: ' . $this->input->post('event_name'));
            echo json_encode("success");
        } else {
            redirect('home', 'refresh');
        }
    }

    public function edit_participant() {
        if($this->input->is_ajax_request()) {
            $id = $this->input->post('pk');
            $name = $this->input->post('name');
            $rowData = $this->input->post('value');
            $data[$name]= $rowData;
            
            $resultevent = $this->cms_model->update_participant($data, $id);


            $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
            $this->session->userdata('SESS_USERNAME') . ' edited a participant');
            echo json_encode('success');
        } else {
            redirect('home', 'refresh');
        }
    }

    //Add event from CMS page
    public function edit_event() {
        if($this->input->is_ajax_request()) {
            //Event name to slug convert
            $event_id = $this->input->post('event_id');
            $slug = strtolower($this->input->post('event_name'));
            $slug = str_replace("&","and",$slug);
            $slug = str_replace("+","-",$slug);
            $slug = str_replace(" ","-",$slug);
            $slug = str_replace("~","-",$slug);
            
            // Insert Event data to events table
            $event['event_name'] = ucwords($this->input->post('event_name'));
            $event['slug'] = $slug;
            $event['event_startDate'] = $this->input->post('event_startDate');
            $event['event_endDate'] = $this->input->post('event_endDate');
            $event['event_time'] = $this->input->post('event_time');
            $event['event_venue'] = ucfirst($this->input->post('event_venue'));
            $event['event_remarks'] = ucfirst($this->input->post('event_remarks'));
            $event['event_guide'] = ucfirst($this->input->post('event_guide'));
            // $event['event_type'] = $this->input->post('event_type');
            // $event['created_by'] = $this->session->userdata('SESS_USERNAME');

            if ( isset($_FILES['event_image']) ) {
                $event['event_image'] = $this->do_upload('event_image');
                if ($event['event_image'] == "false") {
                    $event['event_image'] = "";
                }
            }
            

            $resultevent = $this->cms_model->update($event, $event_id);

            //Bad method in updating checklist !Needs to change!
            $resultjudgesevent = $this->cms_model->update_judges_event($event_id);

            // Insert Event data to judges_event table
            if( $resultjudgesevent ) {
                $judgesEvent = json_decode( $this->input->post('judge_ids'), true );

                foreach ( $judgesEvent as $item ) {
                    $judgesEventInfo['event_id'] = $event_id;
                    $judgesEventInfo['judge_id'] = $item['user_id'];

                    $this->cms_model->add_judges_event($judgesEventInfo);
                }
            }

            // Insert Event data to event_criteria table
            // if( $resultevent ) {
            //     $criteriaNames = json_decode( $this->input->post('criteria_names'), true );
            //     $percents = json_decode( $this->input->post('criteria_percents'), true );

            //     foreach ( $criteriaNames as $item ) {
            //         foreach ($percents as $item2) {
            //             $criteriaNamesInfo['event_id'] = $resultevent;
            //             $criteriaNamesInfo['criteria_name'] = $item;
            //             $criteriaNamesInfo['criteria_percent'] = $item2;
            //             $criteriaNamesInfo['max_range'] = $this->input->post('max_range');
            //         }
            //         $this->cms_model->add_event_criteria($criteriaNamesInfo);
            //     }
            // }

            
            $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
            $this->session->userdata('SESS_USERNAME') . ' updated an event: ' . $this->input->post('event_name'));
            echo json_encode("success");
        } else {
            redirect('home', 'refresh');
        }
    }

    //Add participants
    public function add_participant(){
        if($this->input->is_ajax_request()) {

            
            // Insert Participant data to event_participants table
            $fnames = json_decode( $this->input->post('fnames'), true );
            $bnames = json_decode( $this->input->post('bnames'), true );
            $hometowns = json_decode( $this->input->post('hometowns'), true );
            $remarks = json_decode( $this->input->post('remarks'), true );

            $length = count($bnames);
            for($i=0; $i<$length; $i++)
            {
                $participantsInfo['fname'] = ucwords($fnames[$i]);
                $participantsInfo['event_id'] = $this->input->post('event_id');
                $participantsInfo['bname'] = ucwords($bnames[$i]);
                $participantsInfo['hometown'] = ucfirst($hometowns[$i]);
                $participantsInfo['remark'] = ucfirst($remarks[$i]);

                $this->cms_model->add_event_participants($participantsInfo);
            }

            // foreach ( $obj_merged as $item ) {
            //         $participantsInfo['fname'] = $item['fname'];
            //         $participantsInfo['event_id'] = $this->input->post('event_id');
            //         $participantsInfo['lname'] = $item['lname'];

            //         var_dump($participantsInfo);
                    
            //     // 
            // }

            
            $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
            $this->session->userdata('SESS_USERNAME') . ' added participant(s) to event: ' . $this->input->post('event_name'));
            echo json_encode("success");
        } else {
            redirect('home', 'refresh');
        }
    }

    //Toggle to inactive from cms-events.js
    public function toggle_inactive(){
        if($this->input->is_ajax_request()) {
            $event_id = $this->input->post('event_id');
            $this->cms_model->toggle_to_inactive($event_id);

            $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
            $this->session->userdata('SESS_USERNAME') . ' paused the event: ' . $this->input->post('event_name'));

            echo json_encode("updated");
        } else {
            redirect('home', 'refresh');
        }
    }

    //Toggle to active from cms-events.js
    public function toggle_active(){
        if($this->input->is_ajax_request()) {
            $event_id = $this->input->post('event_id');
            $this->cms_model->toggle_to_active($event_id);

            $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
            $this->session->userdata('SESS_USERNAME') . ' activated the event: ' . $this->input->post('event_name'));

            echo json_encode("updated");
        } else {
            redirect('home', 'refresh');
        }
    }

    //Event done
    public function event_done(){
        if($this->input->is_ajax_request()) {
            $event_id = $this->input->post('event_id');
            $this->cms_model->event_to_done($event_id);

            $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
            $this->session->userdata('SESS_USERNAME') . ' toggled done to event: ' . $this->input->post('event_name'));

            echo json_encode("updated");
        } else {
            redirect('home', 'refresh');
        }
    }

    //Event cancel
    public function event_cancel(){
        if($this->input->is_ajax_request()) {
            $event_id = $this->input->post('event_id');
            $this->cms_model->event_to_cancel($event_id);

            $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
            $this->session->userdata('SESS_USERNAME') . ' cancelled the event: ' . $this->input->post('event_name'));

            echo json_encode("updated");
        } else {
            redirect('home', 'refresh');
        }
    }

    //Event delete
    public function event_delete(){
        if($this->input->is_ajax_request()) {
            $event_id = $this->input->post('event_id');
            $this->cms_model->event_to_delete($event_id);

            $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
            $this->session->userdata('SESS_USERNAME') . ' deleted the event: ' . $this->input->post('event_name'));

            echo json_encode("updated");
        } else {
            redirect('home', 'refresh');
        }
    }

    //Deactivate User
    public function toggle_deactivate(){
        if($this->input->is_ajax_request()) {
            $user_id = $this->input->post('user_id');
            $this->cms_model->toggle_to_deactivate($user_id);

            $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
            $this->session->userdata('SESS_USERNAME') . ' deactivated the user: ' . $this->input->post('username'));

            echo json_encode("updated");
        } else {
            redirect('home', 'refresh');
        }
    }

    //Activating User
    public function toggle_activate(){
        if($this->input->is_ajax_request()) {
            $user_id = $this->input->post('user_id');
            $this->cms_model->toggle_to_activate($user_id);

            $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
            $this->session->userdata('SESS_USERNAME') . ' activated the user: ' . $this->input->post('username'));

            echo json_encode("updated");
        } else {
            redirect('home', 'refresh');
        }
    }

    //Activating User
    public function user_delete(){
        if($this->input->is_ajax_request()) {
            $user_id = $this->input->post('user_id');
            $this->cms_model->user_delete($user_id);

            $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
            $this->session->userdata('SESS_USERNAME') . ' deleted the user: ' . $this->input->post('username'));

            echo json_encode("updated");
        } else {
            redirect('home', 'refresh');
        }
    }


    //Getting the winners
    public function get_winners($event_id, $type){
        if($this->input->is_ajax_request()) {


            if ($type == 1) { //For FREE JUDGING
                $judgeScores = $this->cms_model->get_judges_scores_1($event_id);
                return $judgeScores;

            } else if($type == 2){ //For PERCENTAGE CRITERIA
                //Get needed details
                $criteriaPercent = $this->cms_model->get_event_criteria($event_id);
                $judgeScores = $this->cms_model->get_judges_scores_2($event_id);
                $participants = $this->cms_model->get_event_participants($event_id);
// print_r($judgeScores);
                //Count number of arrays
                $judgeScoresLength = count($judgeScores);
                $criteriaPercentLength = count($criteriaPercent);
                $participantsLength = count($participants);
                //Base number that will be used
                $criteriaPercentLengthbase = $criteriaPercentLength * $participantsLength;

                //--------Start calculate percentage of criteria to judge's score
                $final = array();
                $fname = array();
                $individualTotalScore = 0;
                $i=0;
                while ( $i < $judgeScoresLength) { 

                    //What to put inside the final array to be returned
                    $pID = $judgeScores[$i]['event_participants_id'];
                    $fname[] = $judgeScores[$i]['fname'];

                    //Loop on how many criteria present and add to each other
                    for ($j=0; $j < $criteriaPercentLength; $j++) { 

                        //Calculation of score
                        $individualScore = ($criteriaPercent[$j]['criteria_percent'] / 100) * $judgeScores[$i]['score'];
                        $individualTotalScore = $individualTotalScore + $individualScore;
                        
                        $i++;
                    }
                    
                    //Convert judge's final score to participant into 2 decimal places
                    $individualTotalScore = number_format((float)$individualTotalScore, 2, '.', '');
                    $pScore = array("score" => $individualTotalScore, "event_participants_id" => $pID);

                    //Insert converted score to $final array
                    array_push($final, $pScore);

                    //This will check if judge's scores in the participants is finished
                    //If it is finish, go back to 0
                    if ($j != $criteriaPercentLengthbase) {
                            $individualTotalScore = 0;
                        }
                }
                //--------End of calculate percentage of criteria to judge's scores

                    //--------Start of adding judges scores to same participant(id) 
                    $result = array();
                    foreach($final as $k => $v) {
                        $id = $v['event_participants_id'];
                        $result[$id][] = $v['score'];
                    }

                    $new = array();
                    foreach($result as $key => $value) {
                        $new[] = array('event_participants_id' => $key, 'score' => array_sum($value));
                    }
                    //--------End of adding judges scores to same participant(id)

                    //--------Start of combining participant details to its score
                    $combined = array();
                    foreach ($participants as $arr) {
                        //Here you can add more details from $participants' array
                            $comb = array('event_participants_id' => $arr['event_participants_id'], 'fname' => $arr['fname'], 'score' => '');
                            foreach ($new as $arr2) {
                                if ($arr2['event_participants_id'] == $arr['event_participants_id']) {
                                    $comb['score'] = $arr2['score'];
                                    break;
                                }
                            }
                        $combined[] = $comb;
                    }
                    //--------End of combining participant details to its score

                    //Sort array of scores to descending to determine rankings
                    $scores = array_column($combined, 'score');
                    array_multisort($scores, SORT_DESC, $combined);
                    
                return $combined;

            }else if($type == 3){ //For RANGE CRITERIA
                $judgeScores = $this->cms_model->get_judges_scores_3($event_id);
                return $judgeScores;

            }else if($type == 4){ //For RANKING BASED
                $judgeScores = $this->cms_model->get_judges_scores_4($event_id);
                return $judgeScores;
            }
            
            $data['criteria'] = $this->cms_model->get_event_criteria($event_id);

            $data['participants'] = $this->cms_model->get_event_participants($event_id);
            $data['winners'] = $this->get_winners($event_id);

            return $data;
        } else {
            redirect('home', 'refresh');
        }
    }    
        
}