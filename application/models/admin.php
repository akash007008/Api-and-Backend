<?php
class Admin extends CI_Model
{
	public function validateLogin($email,$password)
	{
		$temp=$this->db->get_where('admin',array('admin_email'=>$email,'admin_pass'=>$password));
		$q= $temp->result();
		if($temp->num_rows()==1)
		{
			return $temp->row()->admin_id;
		}else{
			return FALSE;
		}
	}

	public function addReview($data)
	{
		$q=$this->db->insert('reviews',$data);
		return $q;
	}

	public function displayReview()
 	{
 		$q = $this->db->select('*')
 						->from('reviews')
 						->get();
 		return $q->result_array();
 	}

 	public function findReview($review_id)
	{
		$review= $this->db->select('*')
			->where('review_id',$review_id)
			->get('reviews');
		return $review->row();
	}

	public function updateReview($review_id,$array)
	{
		//print_r($review_id);die;
		return $this->db->where('review_id',$review_id)
						->update('reviews',$array);
	}

	public function deleteReview($review_id)
	{
		$this->db->where('review_id',$review_id);
		return $this->db->delete('reviews');
	}

	public function displayUser()
	{
		$q = $this->db->select('*')
 						->from('users')
 						->get();
 		return $q->result_array();
	}

	public function addsliderImage($data)
	{
		$q=$this->db->insert('slider',['slider_image'=>$data]);
		return $q;
	}

	public function addappImage($data)
	{
		$q=$this->db->insert('app_image',$data);
		return $q;
	}

	public function fetchData($data){
		$q=$this->db->select('*')
					->from($data)
					->get();
		return $q->result_array();
	}
	
}
?>