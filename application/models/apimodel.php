<?php
 class Apimodel extends CI_Model
 {

 	public function checkEmail($email)
 	{
 		$this->db->select('*');
 		$this->db->from('users');
 		$this->db->where('user_email',$email);
 		$q = $this->db->get();
 		return $q->row_array();
 	}
 	
 	public function signUp($email,$pass,$uname)
 	{
 		$this->db->insert('users',['user_email' => $email, 'user_pass' => $pass , 'user_name' => $uname ]);
 		$id =  $this->db->insert_id();
 		return $id; 
 	}

 	public function login($email,$pass)
 	{
 		$q = $this->db->select(['user_id','user_name','user_email'])
 						->from('users')
	 					->where('BINARY user_email ='. $email)
 						->get();
 		return $q->row_array();	
 	}

 	public function submitReview($review_title,$rating,$review_body,$image)
 	{
 		$this->db->insert('reviews',['review_title'=>$review_title, 'rating'=>$rating, 'review_body'=>$review_body, 'review_image'=>$image]);
 		$id =  $this->db->insert_id();
 		return $id; 
 	}

 	public function displayReview()
 	{
 		$q = $this->db->select('*')
 						->from('reviews')
 						->get();
 		return $q->result_array();
 	}

 	public function forgotPass($email,$pass)
 	{
 		 //print_r($email);die;
 		$q = $this->db->where('user_email', $email)
 						->update('users',['user_pass'=>$pass]);
 		return $q;
 	}

 	public function contactUs($user_email,$user_name,$mobile,$subject,$message)
 	{
 		$q = $this->db->insert('contactus',['user_name'=>$user_name, 'user_email'=>$user_email, 'mobile'=>$mobile, 'subject'=>$subject, 'message'=>$message]);
 		return $q;
 	}
 }
?>