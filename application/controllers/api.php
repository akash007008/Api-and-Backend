<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Api extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('apimodel');
		}

		public function signUp()
		{
			$this->output->set_content_type('application/json');
			$email = $this->input->post('user_email');
			$pass = $this->input->post('user_pass');
			$uname = $this->input->post('user_name');
			if($this->apimodel->checkEmail($email)){
				$this->output->set_output(json_encode(['result'=> 0, 'msg'=> 'Email Alredy Registered', 'data'=> 'Email Alredy Registered']));
				return FALSE;
			}
			else{
				$data = $this->apimodel->signUp($email,$pass,$uname);
				if($data){
					$this->output->set_output(json_encode(['result'=> 1, 'msg'=>'Registered Successfully', 'user_info'=> $data]));
					return FALSE;
				}
				else{
					$this->output->set_output(json_encode(['result'=> -1, 'msg'=>'Registration Unsuccessfull', 'data'=> 'Registration Unsuccessfull']));
					return FALSE;
				}
			}
			
		}
		public function login()
		{
			$this->output->set_content_type('application/json');
			$email=$this->input->post('user_email');
			$pass=$this->input->post('user_pass');
			$data = $this->apimodel->login($email,$pass);
			if($data){
				$this->output->set_output(json_encode(['result' => 1, 'msg'=>'Login Successfull','data' => $data]));
				return FALSE;
			}
			else{
				$this->output->set_output(json_encode(['result'=> -1, 'msg'=>'Login Unsuccessfull', 'data'=>'Invalid Email/Password']));
				return FALSE;	
			}
		}

		public function submitReview()
		{
			$this->output->set_content_type('aplication/json');
			$review_title=$this->input->post('review_title');
			$rating=$this->input->post('review_rating');
			$review_body=$this->input->post('review_body');
			$image=$this->input->post('review_image');
			$data=$this->apimodel->submitReview($review_title,$rating,$review_body,$image);
			if($data){
				$this->output->set_output(json_encode(['result' => 1, 'msg' => 'Review Submitted Successfully', 'user_info' => $user_id]));
				return FALSE;
			}
			else{
				$this->output->set_output(json_encode(['result' => -1, 'msg' => "Can't submit review" , 'data' => 'Review Submission Unsuccessfull']));
				return FALSE;
			}
		}

		public function displayReview()
		{
			$this->output->set_content_type('application/json');
			$data=$this->apimodel->displayReview();
			$this->load->helper('url');
			if($data){
				foreach ($data as $data) {
					$data['review_image'] = base_url('Uploads/'.$data['review_image']);
					//echo $data['review_image'];
				}
				//print_r($data);die;
				$this->output->set_output(json_encode(['result'=> 1, 'msg'=>'Review Published Successfully', 'data'=>$data]));
				return FALSE;
			}
			else{
				$this->output->set_output(json_encode(['result'=> -1, 'msg'=>'No Reviews Found', 'data'=>'No Reviews Found']));
				return FALSE;
			}
		}
		public function forgotPass()
		{
			$this->output->set_content_type('application/json');
			$email= $this->input->post('user_email');
			$pass= $this->input->post('user_pass');
			$check = $this->apimodel->checkEmail($email);

			if($check){
				$data=$this->apimodel->forgotPass($email,$pass);
				if($data){
					$this->output->set_output(json_encode(['result'=> 1, 'msg'=>'Password Updated Successfully', 'data'=>'Password Updated Successfully']));
					return FALSE;
				}
			}
			else
			{
				$this->output->set_output(json_encode(['result'=> -1, 'msg'=>'Invalid Email ID', 'data'=>'Invalid Email ID']));
				return FALSE;
			}
		}

		public function contactUs()
		{
			$user_email= $this->input->post('user_email');
			$user_name= $this->input->post('user_name');
			$mobile= $this->input->post('mobile');
			$subject= $this->input->post('subject');
			$message= $this->input->post('message');
			$data = $this->apimodel->contactUs($user_email,$user_name,$mobile,$subject,$message);
			if($data){
				$this->output->set_output(json_encode(['result'=> 1, 'msg'=>'Submitted Successfully', 'data'=>'Submitted Successfully']));
					return FALSE;
			}
			else{
				$this->output->set_output(json_encode(['result'=> -1, 'msg'=>'Error : Unable to submit', 'data'=>'Error : Unable to submit']));
				return FALSE;
			}
		}

	}
?>