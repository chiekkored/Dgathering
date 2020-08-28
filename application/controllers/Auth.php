<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('Auth_model');
            $this->load->Model('logs_model');
        }

        public function index()
	   {
            if($this->session->userdata('SESS_IS_LOGGED')) {
                redirect('home', 'refresh');
            }else{
                // if ($this->Auth_model->check_rem_token(get_cookie('csrf_token_name'))) {
                //     redirect('home', 'refresh');
                // } else {
                    $this->load->view('pages/login');
                // }
            }

       }
        
        public function logout(){
            if($this->session->userdata('SESS_IS_LOGGED')) {
                // If there are existing user session,
                // the user session will be destroyed and the user is logged out
                $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                $this->session->userdata('SESS_USERNAME') . ' has logged out');
                // delete_cookie('csrf_token_name');
                $this->session->sess_destroy();
            }

            // The user will be redirected to the login page,
            // whether there exists a user session or not
            redirect('', 'refresh');
            }
        
        public function login(){
            $username =  $this->input->post('username');
            $password =  $this->input->post('password');
            
            //call the model for auth
            $userData = $this->Auth_model->login($username, $password);

            if($userData){
                //account active
                if ($userData['status'] == 0) {
                    $value['success'] = 1;
                    //update remember token every login
                    $this->Auth_model->update_rem_token($userData['user_id'], $this->input->post('csrf_token_name'));
                    //set cookies
                    $cookie = array(
                        'name'   => 'CHIEEEEE',
                        'value'  => substr(sha1(time()), 0, 16)
                    );
                    $this->input->set_cookie('yesirrrr', substr(sha1(time()), 0, 16));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' has logged in');
                    
                //account deactivated
                } else if($userData['status'] == 1){
                    $value['success'] = 0;
                    $value['error_message'] = 'You account has been deactivated. Contact administrator.';
                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                        $this->session->userdata('SESS_USERNAME') . ' has tried to logged in');
                    $this->session->sess_destroy();
                }
            }
            else{
                $value['success'] = 0;
                $value['error_message'] = 'Invalid username or password!';
            }

            

            echo json_encode($value);
        }
        
        public function change_pass(){
            if($this->input->is_ajax_request()) {
                $data = $this->Auth_model->change_password($this->input->post('user_id'), $this->input->post('password'));
                echo json_encode($data);
            } else {
                redirect('home', 'refresh');
            }
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */