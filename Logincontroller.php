<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logincontroller extends CI_Controller {
	public function __construct()
     {
     	parent :: __construct();

     	$this->load->library(array('email','session'));
     	$this->load->helper(array('url','form'));
     	$this->load->database('');
     	$this->load->model('Loginmodel');
     }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function enterlogin()
	{
		$this->load->view('login/loginindex');
	}
	
	public function logprocess()
	{
		$this->load->helper('security');
		$em=$this->input->post('email');
		// echo $em;exit;
		$pa=$this->input->post('password');
		// echo $pa;exit;
		if($em==null && $pa==null)
		{
			echo"<script>alert('email and password cannot be empty')</script>";
			redirect ('Logincontroller/enterlogin','refresh');

		}
		else
		{
			if($this->Loginmodel->selectpass($em,$pa))
			{
			  $id=$this->Loginmodel->getuserid($em);
			  $rr=$this->Loginmodel->getuserdetails($id);
			  $this->session->set_userdata(array('loginid'=>$rr->lid,
			                                      'logined'=>(bool)true,
			                                      'utype'=>$rr->utype,
                                            'status'=>$rr->status
			                                    ) );
			   if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1')AND($_SESSION['status']==='1'))
			   {
			     	redirect('Usercontroller/usermainheader','refresh');
			   }

			  elseif(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2')AND($_SESSION['status']==='1'))
			  	{
			  	   redirect('Companycontroller/companymainheader','refresh');
			   }
			   elseif(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='3')AND($_SESSION['status']==='1'))
			  	{
			  	   redirect('Contractorcontroller/contractormainheader','refresh');
			   }
			   elseif(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0')AND($_SESSION['status']==='1'))
			  	{
			  	   redirect('Admincontroller/adminhome','refresh');
			   }

			  else
			  {
			  	echo"<script>alert('Invalid User')</script>";
			  	redirect('Logincontroller/enterlogin','refresh');
			  }
			}
         else
           {
            echo"<script>alert('Invalid User')</script>";
			  	redirect('Logincontroller/enterlogin','refresh');	
            }	
            }
      }
      public function logout()
	{
		$data1= new stdClass();
		if(isset($_SESSION['logined']) && $_SESSION['logined']===true)
		{
			foreach($_SESSION as $key=>$value)
			{
				unset($_SESSION[$key]);
			}
			// $this->session->set_flashdata('logout_notification', 'logged_out');
		    redirect('Logincontroller/enterlogin','refresh');
		}
		else
			redirect('/');
	}
    

}
 