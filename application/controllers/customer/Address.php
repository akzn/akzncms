<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		$this->load->library('ion_auth');

		if (!($this->ion_auth->logged_in())) {
            redirect('login');
            die();
        }

        $this->user_id = $this->ion_auth->user()->row()->id;
        $this->load->model('customer/Address_model', 'address_model');
	}

	public function index()
	{
        $site  = $this->mConfig->list_config();
        $address_list = $this->address_model->getListById($this->user_id);

        $data = array(	
			'title' => 'Tambah Alamat - '.$site['nameweb'],
			'meta_desc' => $pages['metatext'],
            'address_list' => $address_list,
			'site' 	=> $site,
						'isi'		=> 'theme/'.$this->config->item('theme').'/customer/address/address_list',
					);
		$this->load->view('theme/'.$this->config->item('theme').'/layout/wrapper',$data);
	}

    /* Add new address */
    public function add()
    {	
		$site  = $this->mConfig->list_config();

		$data = array(	
			'title' => 'Tambah Alamat - '.$site['nameweb'],
			'meta_desc' => $pages['metatext'],
			'site' 	=> $site,
						'isi'		=> 'theme/'.$this->config->item('theme').'/customer/address/address_form',
					);
		$this->load->view('theme/'.$this->config->item('theme').'/layout/wrapper',$data);
    }

    /* Add new address */
    public function update($id)
    {	
		$site  = $this->mConfig->list_config();
        $address_data = $this->address_model->getById($id);
        
		$data = array(	
            'address_data' => $address_data,

			'title' => 'Tambah Alamat - '.$site['nameweb'],
			'meta_desc' => $pages['metatext'],
			'site' 	=> $site,
						'isi'		=> 'theme/'.$this->config->item('theme').'/customer/address/address_form',
					);
		$this->load->view('theme/'.$this->config->item('theme').'/layout/wrapper',$data);
    }

    /* Add new address action*/
    public function form_action()
    {
        $this->load->library('form_validation');
		$this->form_validation->set_rules('full_name', 'Nama Lengkap','trim|required');
		$this->form_validation->set_rules('phone', 'Nomor Telepon','trim|required');
		$this->form_validation->set_rules('address', 'Alamat Lengkap','trim|max_length[255]|required');
		
        if ($this->form_validation->run() === TRUE) {
            // save to db if valid post
            $data_ins = array(
                'user_id' => $this->user_id,
                'full_name' => $this->input->post('full_name'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
            );

            if (null !== $this->input->post('id') && $this->input->post('id') !=="" ) {
                # update data
                $params = array(
                    'user_id' => $this->user_id,
                    'address_id' => $this->input->post('id')
                );
                $do_data = $this->address_model->update($data_ins,$params);
            } else {
                # new data, insert
                $do_data = $this->address_model->add($data_ins,$this->user_id);
            }

            if($do_data){
                $message = array(
					'type' => 'success',
					'message' => 'Data alamat disimpan',
				);
				$this->session->set_flashdata('alert', $message);
				redirect('customer/address');
            } else {
                // if failed to insert
                $message = array(
                    'type' => 'danger',
                    'message' => 'gagal menyimpan data'
                  );
            }
        } else {
            // IF validation false
            $message = array(
                'type' => 'danger',
                'message' => validation_errors('<p class="error">', '</p>')
              );
        }

        $this->session->set_flashdata('alert',$message);
        redirect($_SERVER['HTTP_REFERER']);
    }

    // set main addrees by address_id and user_id
    public function set_main($id)
    {
        $data = array(
            'is_main' => '1'
        );

        $params = array(
            'user_id' => $this->user_id,
            'address_id' => $id
        );

        $update = $this->address_model->setMain($data,$params);

        if($update){
            $message = array(
                'type' => 'success',
                'message' => 'Data alamat disimpan',
            );
            $this->session->set_flashdata('alert', $message);
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            // if failed to insert
            $message = array(
                'type' => 'danger',
                'message' => 'failed to update data'
              );
        }

        $this->session->set_flashdata('alert',$message);
        redirect($_SERVER['HTTP_REFERER']);
    }

    // delete addrees by address id and user id
    public function delete($id)
    {
        $params = array(
            'user_id' => $this->user_id,
            'address_id' => $id
        );

        $delete = $this->address_model->delete($params);

        if($delete){
            $message = array(
                'type' => 'success',
                'message' => 'Data alamat dihapus',
            );
            $this->session->set_flashdata('alert', $message);
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            // if failed to insert
            $message = array(
                'type' => 'danger',
                'message' => 'failed to update data'
              );
        }

        $this->session->set_flashdata('alert',$message);
        redirect($_SERVER['HTTP_REFERER']);
    }

}