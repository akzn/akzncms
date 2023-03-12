<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		$this->load->library('ion_auth');

	}


	public function index()
	{		
		redirect('customer/login');
	}

	/* 
	* Login Page
	*/
	public function login()
	{
		if (($this->ion_auth->logged_in())) {
            redirect('customer/dashboard');
            die();
        }

		$site  = $this->mConfig->list_config();

		$data = array(	
			'title' => 'Login - '.$site['nameweb'],
			'meta_desc' => $pages['metatext'],
			'site' 	=> $site,
						'isi'		=> 'theme/'.$this->config->item('theme').'/customer/auth/login',
					);
		$this->load->view('theme/'.$this->config->item('theme').'/layout/wrapper',$data);

	}

	/* 
	* Register Page
	*/
	public function register()
	{
		if (($this->ion_auth->logged_in())) {
            redirect('customer/dashboard');
            die();
        }
		
		$site  = $this->mConfig->list_config();

		$data = array(	
			'title' => 'Register - '.$site['nameweb'],
			'meta_desc' => $pages['metatext'],
			'site' 	=> $site,
						'isi'		=> 'theme/'.$this->config->item('theme').'/customer/auth/register',
					);
		$this->load->view('theme/'.$this->config->item('theme').'/layout/wrapper',$data);

	}

	/* 
	* Action function to insert register data to db
	*/
	public function register_action(){
		// FORM VALIDATION
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Nama','trim|max_length[30]|required');
		$this->form_validation->set_rules('email','Email','trim|valid_email|required|is_unique[users.email]');
		$this->form_validation->set_rules('password','Password','trim|min_length[8]|max_length[20]|required');
		$this->form_validation->set_rules('confirm_password','Confirm password','trim|matches[password]|required');
	
		// IF NO SUBMIT GO TO FORM
		if($this->form_validation->run()===FALSE)
		{
			$message = array(
				'type' => 'danger',
				'message' => '<h3>Terjadi kesalahan : </h3>'.validation_errors('<p class="error">', '</p>'),
			);
			$data_form = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
			);
			
			$this->session->set_flashdata('alert',$message);
			$this->session->set_flashdata('post_items',$data_form);
			
			redirect('register');
		}
		else
		{
			// IF SUBMIT, INSERT DATA
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $name,
			);

			$group = array('2');

			// if($this->ion_auth_phpmailer->register($username,$password,$email,$additional_data,$group))
			if($this->ion_auth->register($username,$password,$email,$additional_data,$group))
			{
				// $_SESSION['auth_message'] = 'The account has been created. You may now login.';
				// $this->session->mark_as_flash('auth_message');
				$message = array(
					'type' => 'success',
					'message' => 'Pendaftaran sukses!! Silahkan login menggunakan akun yang anda buat',
				);
				$this->session->set_flashdata('alert', $message);
				redirect('login');
			}
			else
			{
				// $_SESSION['auth_message'] = $this->ion_auth->errors();
				// $this->session->mark_as_flash('auth_message');
				$message = array(
					'type' => 'danger',
					'message' => $this->ion_auth->errors(),
				);
				$this->session->set_flashdata('alert', $message);
				redirect('register');
			}
		}
	}

	/**
	 * Log the user in
	 */
	public function login_action()
	{
		// FORM VALIDATION
		$this->load->library('form_validation');
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() === TRUE)
		{

			// Check if identity_alt is not null, if yes, check input is a valid email. if yes email = identity, if no $this->config->item('identity_alt', 'ion_auth') = identity; 
			if ($this->config->item('identity_alt', 'ion_auth') != null ) {
				if ($this->form_validation->valid_email($this->input->post('identity'))) {
					$this->ion_auth_model->identity_column = 'email';
				} else {
					$this->ion_auth_model->identity_column = $this->config->item('identity_alt', 'ion_auth');
				}
			}

			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool)$this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				
				redirect('customer/dashboard');
				
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				// redirect('login', 'refresh'); 
				$message = array(
					'type' => 'danger',
					'message' => $this->ion_auth->errors(),
				);
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$message = array(
				'type' => 'danger',
				'message' => '<h3>Terjadi kesalahan : </h3>'.validation_errors('<p class="error">', '</p>'),
			);
			$data_form = array(
				'identity' => $this->input->post('identity'),
			);
			
		}

		$this->session->set_flashdata('alert',$message);
		$this->session->set_flashdata('post_items',$data_form);
		
		redirect('login');
	}

	/**
	 * Log out user
	 */
	public function logout()
	{
		// log the user out
		$this->ion_auth->logout();

		// redirect them to the login page
		redirect('login', 'refresh');
	}
}