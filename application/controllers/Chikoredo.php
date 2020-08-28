<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//8\#^1j9Z$LE|iW~p
class Chikoredo extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('users_model');
        }

        public function index(){
            $this->load->view('pages/users');
		}
        
        public function register() {
		// Check if this is an AJAX request
		if($this->input->is_ajax_request()) {

			// Insert user
			$userInfo['fname'] = $this->input->post('fname');
			$userInfo['lname'] = $this->input->post('lname');
			$userInfo[Users_table::_USERNAME] = $this->input->post('username');
			$userInfo[Users_table::_PASSWORD] = sha1($this->input->post('password'));
			$userInfo[Users_table::_ROLE] = $this->input->post('role');
			if ( isset($_FILES['user_image']) ) {
                $userInfo['user_image'] = $this->do_upload('user_image');
                if ($userInfo['user_image'] == "false") {
                    $userInfo['user_image'] = "";
                }
            }

			$resultUserInfo = $this->users_model->add($userInfo);

			echo json_encode ('success: 1');
		} else {
			// Redirect to the login page if it is not an AJAX request
			redirect('login', 'refresh');
		}
	}
        

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
        
}