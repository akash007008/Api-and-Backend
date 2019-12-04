<?php
class Admin_panel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		echo "index page";
	}

	public function dashboard()
	{
		if (!$this->session->userdata('admin_id')) {
            return redirect('admin_panel/login');
        }
		$this->load->helper('html');
		$this->load->view('admin/dashboard');
	}

	public function login()
	{
		if ($this->session->userdata('admin_id')) {
            return redirect('admin_panel/dashboard');
        }
		$this->load->helper('form');
		$this->load->view('login');
	}

	
	public function adminLogin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if ($this->form_validation->run('admin_login') == FALSE)
            {
                $this->load->view('login');
            }
        else
        {
			$email=$this->input->post('email');
			$pass=$this->input->post('pass');
			$this->load->model('admin');
			$data=$this->admin->validateLogin($email,$pass);
			if($data)
			{
				$this->session->set_userdata('admin_id',$data);
				$this->load->view('admin/dashboard');
			}
			else
			{
				$this->load->helper('form');
				$this->load->view('login');
			}
		}
	}


	public function logout()
    {
        $this->session->unset_userdata('admin_id');
        return redirect('admin_panel/login'); 
    }

    public function loadAddreview()
    {
    	if (!$this->session->userdata('admin_id')) {
            return redirect('admin_panel/login');
        }
    	$this->load->helper('form');
    	$this->load->view('admin/add_review');
    }

    public function addReview()
    {
    	$data= $this->input->post();
    	$this->load->model('admin');
    	$config=[
					'upload_path'=>'./uploads',
					'allowed_types'=>'jpeg|gif|png|jpg',
				];
		$this->load->library('upload',$config);
		$this->upload->do_upload();
		unset($data['submit']);
		$data1=$this->upload->data();
		$upload_error=$this->upload->display_errors();
		$img_path=$data1['raw_name'].$data1['file_ext'];
		$data['review_image']=$img_path;
    	if ($this->admin->addReview($data)) {
    		$this->load->view('admin/dashboard');
    	}
    	else
    		echo "Error";
    }

    public function displayReview()
 	{
 		if (!$this->session->userdata('admin_id')) {
            return redirect('admin_panel/login');
        }
 		$this->load->model('admin');
 		$data=$this->admin->displayReview();
 		if ($data) {
 			//echo "<pre>";print_r($data);
 			$this->load->view('admin/view_review',compact('data'));
 		}
 		else
 			echo "Error";
 	}
	
	public function edit_review($review_id)
	{
		if (!$this->session->userdata('admin_id')) {
            return redirect('admin_panel/login');
        }
		$this->load->model('admin');
		$this->load->helper('form');  
		$review=$this->admin->findReview($review_id);
		$this->load->view('admin/edit_review',['data'=>$review]);

	}

	public function editReview()
	{
		$config=[
					'upload_path'=>'./uploads',
					'allowed_types'=>'jpeg|gif|png|jpg',
				];
		$this->load->library('upload',$config);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->load->model('admin');
		$review_id=$this->input->post('review_id');

		if($_FILES['userfile']['name'])
		{
			//echo "received";
			//echo "<pre>";
			//print_r($_FILES['userfile']);
			//echo "</pre>";
			if($this->upload->do_upload())
			{
				//echo "received";
				$data=$this->upload->data();
				//echo "<pre>";
				//print_r($data);die;
				$review=$this->admin->findReview($review_id);
				//print_r($review);die;
				unlink('uploads/'.$review->review_image);
				$edited=$this->input->post();
				unset($edited['submit']);
				unset($edited['review_id']);
				$img_path=$data['raw_name'].$data['file_ext'];
				
				$edited['review_image']=$img_path;
				if($this->admin->updateReview($review_id,$edited))
				{
					return redirect('admin_panel/displayReview');
				}
			}
			else
			{   
				echo "ERROR";
			}

		}
		else
		{	
			//echo " not received 111";die;
				$edited=$this->input->post();
				unset($edited['submit']);
				unset($edited['review_id']);
				if($this->admin->updateReview($review_id,$edited))
				{
					return redirect('admin_panel/displayReview');
				}
				else
					echo "Error";
		}
	}
		

	public function delete_review($review_id)
	{
		$this->load->model('admin');
		$review=$this->admin->findReview($review_id);
		unlink('uploads/'.$review->review_image);
		if($this->admin->deleteReview($review_id))
		{
			return redirect('admin_panel/displayReview');
		}
		else
		{
			echo "Error";
			return redirect('admin_panel/displayReview');
		}

	}

	public function displayUser()
	{
		if (!$this->session->userdata('admin_id')) {
            return redirect('admin_panel/login');
        }
		$this->load->model('admin');
 		$data=$this->admin->displayUser();
 		if ($data) {
 			//echo "<pre>";print_r($data);
 			$this->load->view('admin/user_details',compact('data'));
 		}
 		else
 			echo "Error";
	}

	public function sliderImage()
	{
		$this->load->helper('form');
		$this->load->view('admin/slider_image');
	}


	public function addsliderImage()
	{
		$this->load->model('admin');
		$config=[
					'upload_path'=>'./uploads',
					'allowed_types'=>'jpeg|gif|png|jpg',
				];
		$this->load->library('upload',$config);
		$this->upload->do_upload();
		$data=$this->upload->data();
		$img_path=$data['raw_name'].$data['file_ext'];
		if($this->admin->addsliderImage($img_path))
		{
			return redirect('admin_panel/displayReview');
		}
	
		else
		{   
			echo "ERROR";
		}
		
	}


	public function appImage()
	{
		$this->load->helper('form');
		$table = 'app_image';
		$this->load->model('admin');
		$data=$this->admin->fetchData($table);
		$this->load->view('admin/app_image',compact('data'));
	}

	public function addappImage()
	{
		$this->load->model('admin');
		$config=[
					'upload_path'=>'./uploads',
					'allowed_types'=>'jpeg|gif|png|jpg',
				];
		$this->load->library('upload',$config);
		$this->upload->do_upload();
		$data=$this->upload->data();
		$img_path=$data['raw_name'].$data['file_ext'];
		$array=$this->input->post();

		unset($array['submit']);
		$array['app_image']=$img_path;
		//print_r($array);
		if($this->admin->addappImage($array))
		{
			return redirect('admin_panel/dashboard');
		}
	
		else
		{   
			echo "ERROR";
		}
		
	}
}

?>