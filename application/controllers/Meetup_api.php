<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meetup_api extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('operation_model');
        $this->load->helper(array('form','security'));
        $this->load->library(array('form_validation','email'));
        $this->load->database();
    }

	public function register(){
		$auth_data = $this->operation_model->get_data('server_auth_token_master');
        $auth_code = $this->input->request_headers();

        if(isset($auth_data['token']) && isset($auth_code['Authorization']) && ($auth_code['Authorization'] == $auth_data['token'])) {
			$this->form_validation->set_rules('name', 'Name', 'xss_clean|trim|required|alpha',
									array('required'=>'Please enter valid name'));
			$this->form_validation->set_rules('age', 'Age', 'xss_clean|trim|required|numeric',
									array('required'=>'Please enter valid age'));
			$this->form_validation->set_rules('dob', 'DOB', 'xss_clean|required|trim|callback_date_valid',
									array('required'=>'Please enter valid date of birth'));
			$this->form_validation->set_rules('profession', 'Profession', 'xss_clean|required|trim|in_list[Employed,Student]',
									array('required'=>'Please enter valid profession'));
			$this->form_validation->set_rules('locality', 'Locality', 'xss_clean|trim|required|alpha_numeric',
									array('required'=>'Please enter valid locality'));
			$this->form_validation->set_rules('guests[]', 'Guests', 'xss_clean|required|trim',
									array('required'=>'Please enter valid guests'));
			$this->form_validation->set_rules('address', 'Address', 'xss_clean|required|trim|max_length[50]',
									array('required'=>'Please enter valid address'));
	        if($this->form_validation->run())
	        {    
	            $name = $this->input->post("name");
	            $age = $this->input->post("age");
	            $dob = $this->input->post("dob");
	            $profession = $this->input->post("profession");
	            $guests = $this->input->post("guests");
	            if(count($guests) >= 3){
	            	$response  = array('status' => false, 'message' => "Less than two guest are allowed");
	            	echo json_encode($response);
	            	exit;
	            }
	            $address = $this->input->post("address");
	            $locality = $this->input->post("locality");
	            $guests12 =  implode(',',$guests);
	        	$insrt_data["name"] = $name;
		        $insrt_data["age"] = $age;
		        $insrt_data["dob"] = $dob;
		        $insrt_data["profession"] = $profession;
		        $insrt_data["locality"] = $locality;
		        $insrt_data["guests"] = $guests12;
		        $insrt_data["address"] = $address;
		        
		        $insrt_result = $this->operation_model->insert_data($insrt_data, 'users');
		       	if($insrt_result){
			        $response["status"] = "Register sucessfully";
		        	$response["flag"] = true;
		        }else{
		        	$response["status"] = "Something went wrong";
		        	$response["flag"] = false;
		        }
	        }
	        else{
	        	$response  = array('status' => false, 'message' => validation_errors());
	        }
	    }
        else {
            $response["status"] = "Server Authentication Failed";
            $response["flag"] = "0";
        }      
        echo json_encode($response);
	}

	public function update(){
		$auth_data = $this->operation_model->get_data('server_auth_token_master');
        $auth_code = $this->input->request_headers();

        if(isset($auth_data['token']) && isset($auth_code['Authorization']) && ($auth_code['Authorization'] == $auth_data['token'])) {
			$this->form_validation->set_rules('name', 'Name', 'xss_clean|trim|required|alpha',
									array('required'=>'Please enter valid name'));
			$this->form_validation->set_rules('age', 'Age', 'xss_clean|trim|required|numeric',
									array('required'=>'Please enter valid age'));
			$this->form_validation->set_rules('dob', 'DOB', 'xss_clean|required|trim|callback_date_valid',
									array('required'=>'Please enter valid date of birth'));
			$this->form_validation->set_rules('profession', 'Profession', 'xss_clean|required|trim|in_list[Employed,Student]',
									array('required'=>'Please enter valid profession'));
			$this->form_validation->set_rules('locality', 'Locality', 'xss_clean|trim|required|alpha_numeric',
									array('required'=>'Please enter valid locality'));
			$this->form_validation->set_rules('guests[]', 'Guests', 'xss_clean|required|trim',
									array('required'=>'Please enter valid guests'));
			$this->form_validation->set_rules('address', 'Address', 'xss_clean|required|trim|max_length[50]',
									array('required'=>'Please enter valid address'));
			$this->form_validation->set_rules('user_id', 'User id', 'xss_clean|trim|required|numeric',
									array('required'=>'Please enter valid user id'));
	        if($this->form_validation->run())
	        {    
	            $name = $this->input->post("name");
	            $age = $this->input->post("age");
	            $dob = $this->input->post("dob");
	            $profession = $this->input->post("profession");
	            $guests = $this->input->post("guests");
	            if(count($guests) >= 3){
	            	$response  = array('status' => false, 'message' => "Less than two guest are allowed");
	            	echo json_encode($response);
	            	exit;
	            }
	            $address = $this->input->post("address");
	            $locality = $this->input->post("locality");
	            $user_id = $this->input->post("user_id");
	            $guests12 =  implode(',',$guests);
	        	$update_data["name"] = $name;
		        $update_data["age"] = $age;
		        $update_data["dob"] = $dob;
		        $update_data["profession"] = $profession;
		        $update_data["locality"] = $locality;
		        $update_data["guests"] = $guests12;
		        $update_data["address"] = $address;
		        
		        $update_result = $this->operation_model->update_data_by_id($user_id,$update_data, 'users');
		       	if($update_result){
			        $response["status"] = "User update sucessfully";
		        	$response["flag"] = true;
		        }else{
		        	$response["status"] = "Already have same information";
		        	$response["flag"] = false;
		        }
	        }
	        else{
	        	$response  = array('status' => false, 'message' => validation_errors());
	        }
	    }
        else {
            $response["status"] = "Server Authentication Failed";
            $response["flag"] = "0";
        }      
        echo json_encode($response);
	}

	public function user_list(){
		$auth_data = $this->operation_model->get_data('server_auth_token_master');
        $auth_code = $this->input->request_headers();

        if(isset($auth_data['token']) && isset($auth_code['Authorization']) && ($auth_code['Authorization'] == $auth_data['token'])) {
	        $return_date = $this->operation_model->get_data_by_cols('users', "id,name,age,dob,profession,locality,guests,address", array("status" => 'Y'));
	       	if(!empty($return_date)){
		        $response["status"] = "Success";
		        $response["data"] = $return_date;
	        	$response["flag"] = true;
	        }else{
	        	$response["status"] = "There is no data";
	        	$response["data"] = $return_date;
	        	$response["flag"] = false;
	        }
	        
	    }
        else {
            $response["status"] = "Server Authentication Failed";
            $response["flag"] = "0";
        }      
        echo json_encode($response);
	}
	
	public function date_valid($date)
	{
		$parts = explode("/", $date);
		if (count($parts) == 3) {      
		  if (checkdate($parts[1], $parts[0], $parts[2]))
		  {
		    return TRUE;
		  }
		}
		$this->form_validation->set_message('date_valid', 'The Date field must be mm/dd/yyyy');
		return false;
	}


}
