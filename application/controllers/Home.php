<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('Auth_model');
            $this->load->Model('users_model');
        }


        public function index(){
            // $this->Auth_model->isLoggedIn();
		if($this->session->userdata('SESS_IS_LOGGED')) {
            $data['user'] = $this->users_model->get($this->session->userdata('SESS_USER_ID'));
            $data['ck'] = $_COOKIE; 
            $this->load->view('pages/home', $data);
        }else{
        	redirect('', 'refresh');
        }
	}
        
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */