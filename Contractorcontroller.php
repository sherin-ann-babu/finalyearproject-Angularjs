<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contractorcontroller extends CI_Controller {
	public function __construct()
     {
     	parent :: __construct();

     	$this->load->library(array('email','session'));
     	$this->load->helper(array('url','form'));
     	$this->load->database('');
     	$this->load->model('Contractormodel');
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
	public function contractorreg()
           {  
            $this->load->view('registrationsubheader');
		$this->load->view('contractor/contractorreg');
		$this->load->view('footer');
	     }
	public function contractorinsert()
	{
	  $p=$this->input->post('password');
	  $b=$this->Contractormodel->passencrypt($p);
      $data1=array('name'=>$this->input->post('name'),
                  'address'=>$this->input->post('address'),
                  'pincode'=>$this->input->post('pincode'),
                  'district'=>$this->input->post('district'),
                  'dob'=>$this->input->post('dob'),
                  'gender'=>$this->input->post('gender'),
                  'contactno'=>$this->input->post('contactno'),
                   );
      $data2=array('email'=>$this->input->post('email'),
                  'password'=>$b,
                  'utype'=>'3'
                  );
	
	  $a=$this->Contractormodel->contractorinsert($data1,$data2);
      if ($a)
      {
    	echo"<script>alert('Registration successful')</script>";
    	redirect('Contractorcontroller/contractorreg','refresh');
      }
      else
      {
    	echo"<script>alert('Registration unsuccess')</script>";
    	redirect('Contractorcontroller/contractorreg','refresh');
      }
   }
   public function contractormainheader()
      {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='3'))
          {
   	     $this->load->view('contractor/contractormainheader');
          }
          else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
   public function contractorsubheader()
      {  
   	   if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='3'))
          {
   	     $this->load->view('contractor/contractormainheader');
          }
         else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
    public function edit()
      {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='3'))
	     {
	      $this->load->view('contractor/contractorsubheader');
	      $e=$this->session->loginid;
		$r['data']=$this->Contractormodel->edit1($e);
		$this->load->view('contractor/contractoreditpage',$r);
		$this->load->view('footer');
	     }
	    else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	 }
	public function update()
	{
		$i=$this->input->post('id');
		$data2=array('name'=>$this->input->post('name'),
	                 'address'=>$this->input->post('address'),
	                 'pincode'=>$this->input->post('pincode'),
                       'district'=>$this->input->post('district'),
                       'dob'=>$this->input->post('dob'),
                       'gender'=>$this->input->post('gender'),
                       'contactno'=>$this->input->post('contactno'),
                       
	               
	                 );
		$u=$this->Contractormodel->update($i,$data2);
		if($u)
		{
			echo"<script>alert('Updation Successful')</script>";
			redirect('Contractorcontroller/edit','refresh');
		}
		else
		{
			echo"<script>alert('Updation unsuccessful')</script>";
			redirect('Contractorcontroller/edit','refresh');
		}
	}
	public function tenderview()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='3'))
	    {     
		$this->load->view('contractor/contractorsubheader');
		$n['data']=$this->Contractormodel->tenderview();
		$this->load->view('contractor/tenderview',$n);
		$this->load->view('footer');
	     }
	     else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function tenderapply()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='3'))
	     {    
	      
		$this->load->view('contractor/contractorsubheader');
		$e=$this->uri->segment(3);
		$r['data']=$this->Contractormodel->applytender($e);
		$this->load->view('contractor/tenderapplying',$r);
		$this->load->view('footer');
	     }
	    else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	
   public function tenderapplyinsert()
	{   
		
		$id=$this->session->loginid;
		$date=date('Y-m-d');
		// echo $date;exit;
		$tenid=$this->input->post('id');
            $config['upload_path']='./uploads/';
                   $config['allowed_types']='mp3|mp4|jpg|docx|pdf|png|PNG|jpeg';
                   $config['max_size']=1000000;
                   $config['max_width']=10240;
                   $config['max_height']=10000;
                   $this->load->library('upload',$config);
            if(! $this->upload->do_upload('photo'))
            {
            	$error=array('error'=>$this->upload->display_errors());
            	$images=$this->input->post('photo');

            }
            else
            {
            	$data=array('images'=>$this->upload->data());
            	$images=$data['images']['file_name'];
            }
            
		// echo $id;exit;echo 
		// print_r($images);exit;
	  
      $data1=array('tamount'=>$this->input->post('tamount'),
                  'noofmonths'=>$this->input->post('noofmonths'),
                  'prevworkdata'=>$images,
                  'currentdate'=>$date,
                  'tenid'=>$tenid,
                  'loginid'=>$id
                   );
	
	 $a=$this->Contractormodel->tenderapplyinsert($data1);
      if ($a)
      {
    	echo"<script>alert('Tender applied successfully')</script>";
    	redirect('Contractorcontroller/tenderapplyview','refresh');
      }
      else
      {
    	echo"<script>alert('Unsuccess tender apply!!! ')</script>";
    	redirect('Contractorcontroller/tenderapplyview','refresh');
      }
   }
   public function tenderclosedapply()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='3'))
	     {    
	      
		$this->load->view('contractor/contractorsubheader');
		$e=$this->uri->segment(3);
		$r['data']=$this->Contractormodel->applyclosedtender($e);
		$this->load->view('contractor/tenderclosedapplying',$r);
		$this->load->view('footer');
	     }
	    else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	 public function tenderclosedapplyinsert()
	{   
		
		$id=$this->session->loginid;
		$date=date('Y-m-d');
		// echo $date;exit;
		$tenid=$this->input->post('id');
            $config['upload_path']='./uploads/';
                   $config['allowed_types']='mp3|mp4|jpg|docx|pdf|png|PNG|jpeg';
                   $config['max_size']=1000000;
                   $config['max_width']=10240;
                   $config['max_height']=10000;
                   $this->load->library('upload',$config);
            if(! $this->upload->do_upload('photo'))
            {
            	$error=array('error'=>$this->upload->display_errors());
            	$images=$this->input->post('photo');

            }
            else
            {
            	$data=array('images'=>$this->upload->data());
            	$images=$data['images']['file_name'];
            }
            
		// echo $id;exit;echo 
		// print_r($images);exit;
	  
      $data1=array(
                  'noofmonths'=>$this->input->post('noofmonths'),
                  'prevworkdata'=>$images,
                  'currentdate'=>$date,
                  'tenid'=>$tenid,
                  'loginid'=>$id
                   );
	
	 $a=$this->Contractormodel->tenderclosedapplyinsert($data1);
      if ($a)
      {
    	echo"<script>alert('Tender applied successfully')</script>";
    	redirect('Contractorcontroller/tenderapplyview','refresh');
      }
      else
      {
    	echo"<script>alert('Unsuccess tender apply!!! ')</script>";
    	redirect('Contractorcontroller/tenderapplyview','refresh');
      }
   }
   
    public function tenderapplyview()
      
	    {   
           
            $this->load->view('contractor/contractorsubheader');
            $id=$this->session->loginid;
            // $tenid=$this->input->post('id');
		$n['data']=$this->Contractormodel->tenderapplypass($id);
		$this->load->view('contractor/tenderapplytable',$n);
		$this->load->view('footer');
           }
    public function dateview()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='3'))
	     {  

		$this->load->view('contractor/contractorsubheader');
		$e=$this->uri->segment(3);
		$n['data']=$this->Contractormodel->dateview($e);
		$this->load->view('contractor/dateview',$n);
		$this->load->view('footer');
	     }
	     else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function conducttender()
	{  
   	 if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='3'))
	{    
		$this->load->view('contractor/contractorsubheader');
		$i=$this->uri->segment(3);
		$lid=$this->session->loginid;
		$taid=$this->Contractormodel->gettenapplyid($i,$lid);
		$lvstatus=$this->Contractormodel->getleavestatus($taid);
		$s['taid']=$taid;
		$s['lvstatus']=$lvstatus;
		$s['data']=$this->Contractormodel->ctenderview($i);
		// $s['datas']=$this->Contractormodel->ctenview($i);
		$this->load->view('contractor/conducttender',$s);
		$this->load->view('footer');
	}
	else
         {
    	      redirect('Usercontroller/index','refresh');
         }
	}
	public function ctenderinsert()
	{   
		$this->load->view('contractor/contractorsubheader'); 
        $data1=array('tamount'=>$this->input->post('tamount'),
        	         
                   );
	
	 $a=$this->Contractormodel->ctenderinsert($data1);
      if ($a)
      {
    	echo"<script>alert('Amount details added successfully')</script>";
    	redirect('Contractorcontroller/tenderapplyview','refresh');
      }
      else
      {
    	echo"<script>alert('Unsuccess Amount adding ')</script>";
    	redirect('Contractorcontroller/tenderapplyview','refresh');
      }
   }
 public function ctenderupdate()
	 {    
	    
		$this->load->view('contractor/contractorsubheader');
		$i=$this->input->post('id');
		$data2=array('tamount'=>$this->input->post('tamount'),
                   );
		$u=$this->Contractormodel->ctenderupdate($i,$data2);
		if($u)
		{
			echo"<script>alert('Updation Successful')</script>";
			redirect('Contractorcontroller/tenderapplyview','refresh');
		}

		else
		{
			echo"<script>alert('Updation unsuccessful')</script>";
			redirect('Contractorcontroller/tenderapplyview','refresh');
		}

	}
          
	public function notificationview()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='3'))
	    {     
		$this->load->view('contractor/contractorsubheader');
		$n['data']=$this->Contractormodel->notificationview();
		$this->load->view('contractor/notificationview',$n);
		$this->load->view('footer');
	     }
	     else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function leavetender()
	{      $e=$this->uri->segment(3);
		// $r=$this->Adminmodel->edit1($e);
		$leave=array('lvstatus'=>'1');
		$r=$this->Contractormodel->leavetender($e,$leave);
	if($r)
	{
		
		echo"<script>alert('Leaving successfully')</script>";
		redirect('Contractorcontroller/tenderapplyview','refresh');
	 }
	 else
	 {
		echo"<script>alert('Unsuccess Leaving')</script>";
		redirect('Contractorcontroller/tenderapplyview','refresh');
	 }
    }
}
