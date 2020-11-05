<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('operation_model');
        $this->load->database();
    }

	public function index()
	{	
		$return_date = $this->operation_model->get_data_by_cols('users', "id,name,age,dob,profession,locality,guests,address", array("status" => 'Y'));
		$data["return_date"] = $return_date;
		$this->load->view('admin/user-list',$data);
	}
}
