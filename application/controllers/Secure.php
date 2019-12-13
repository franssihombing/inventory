<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secure extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('login_status') == NULL) {
			redirect('secure/login');
		}
	}

	public function admin()
	{
		if ($this->session->userdata('username') == 'admin') {
			redirect('admin');
		}
		elseif ($this->session->userdata('username') == 'marketing') {
			redirect('marketing');
		}
		else{
			redirect('secure/login');
		}
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function check_login()
	{
		 $username = $this->input->post('username');
   $password = SHA1($this->input->post('password'));
   $this->load->model('M_data');
   $data = $this->M_data->checkleveluser($username, $password);

    $level = $this->M_data->find_user($data);


   if($data){

    $user_data = array(
		'username' => $username,
        'id' => $data,
        'login_status' => 'success',
    );

    $this->session->set_userdata($user_data);

    $validator['success'] = true;
    $validator['status'] = 'success';
    $validator['messages'] = "Admin";

   }else{

    $validator['success'] = false;
    $validator['status'] = 'error';
    $validator['messages'] = "Username / Password anda salah";
    
   }

   echo json_encode($validator);
	}

	public function logout()
	{
		 $this->session->sess_destroy();
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");
  redirect('secure');
	}
}
