<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincontroller extends CI_Controller {
	public function __construct()
     {
     	parent :: __construct();

     	$this->load->library(array('email','session'));
     	$this->load->helper(array('url','form'));
     	$this->load->database('');
     	$this->load->model('Adminmodel');
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
	public function adminhome()
	{  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
	   {
		  $this->load->view('admin/adminhome');
	    }
	   else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	
	public function tb()
	{  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
	  {   
		$n['data']=$this->Adminmodel->pass();
		$this->load->view('admin/admintable',$n);
	  }
	   else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function rejectuser()
	{
		$d=$this->uri->segment(3);
		$rej=array('status'=>'2');
		$re=$this->Adminmodel->rejectuser($d,$rej);
	 if($re)
	 {
		echo"<script>alert('Rejected successfully')</script>";
		redirect('Admincontroller/tb','refresh');
	 }
	 else
	 {
		echo"<script>alert('Unsuccess Rejection')</script>";
		redirect('Admincontroller/tb','refresh');
	 }
	}
	public function approveuser()
	{   $e=$this->uri->segment(3);
		// $r=$this->Adminmodel->edit1($e);
		$aprv=array('status'=>'1');
		$r=$this->Adminmodel->approveuser($e,$aprv);
	if($r)
	{
		
		echo"<script>alert('Approved successfully')</script>";
		redirect('Admincontroller/tb','refresh');
	 }
	 else
	 {
		echo"<script>alert('Unsuccess Approve')</script>";
		redirect('Admincontroller/tb','refresh');
	 }
	}

	public function companyview()
	{  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
	  {   
		$n['data']=$this->Adminmodel->passcompany();
		$this->load->view('admin/admincompanytable',$n);
	  }
	  else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}

	public function rejectcompany()
	{
		$d=$this->uri->segment(3);
		$rej=array('status'=>'2');
		$re=$this->Adminmodel->rejectcompany($d,$rej);
	 if($re)
	 {
		echo"<script>alert('Rejected successfully')</script>";
		redirect('Admincontroller/companyview','refresh');
	 }
	 else
	 {
		echo"<script>alert('Unsuccess Rejection')</script>";
		redirect('Admincontroller/companyview','refresh');
	 }
	}
	public function approvecompany()
	{   $e=$this->uri->segment(3);
		// $r=$this->Adminmodel->edit1($e);
		$aprv=array('status'=>'1');
		$r=$this->Adminmodel->approvecompany($e,$aprv);
	if($r)
	{
		
		echo"<script>alert('Approved successfully')</script>";
		redirect('Admincontroller/companyview','refresh');
	 }
	 else
	 {
		echo"<script>alert('Unsuccess Approve')</script>";
		redirect('Admincontroller/companyview','refresh');
	 }
    }
    public function contractorview()
    {  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
	  {   
		$n['data']=$this->Adminmodel->passcontractor();
		$this->load->view('admin/admincontractortable',$n);
	  }
	  else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function rejectcontractor()
	{
		$d=$this->uri->segment(3);
		$rej=array('status'=>'2');
		$re=$this->Adminmodel->rejectcontractor($d,$rej);
	 if($re)
	 {
		echo"<script>alert('Rejected successfully')</script>";
		redirect('Admincontroller/contractorview','refresh');
	 }
	 else
	 {
		echo"<script>alert('Unsuccess Rejection')</script>";
		redirect('Admincontroller/contractorview','refresh');
	 }
	}
	public function approvecontractor()
	{   $e=$this->uri->segment(3);
		// $r=$this->Adminmodel->edit1($e);
		$aprv=array('status'=>'1');
		$r=$this->Adminmodel->approvecontractor($e,$aprv);
	if($r)
	{
		
		echo"<script>alert('Approved successfully')</script>";
		redirect('Admincontroller/contractorview','refresh');
	 }
	 else
	 {
		echo"<script>alert('Unsuccess Approve')</script>";
		redirect('Admincontroller/contractorview','refresh');
	 }
    }
    public function tenderaddview()
    {  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
    {
    	$this->load->view('admin/admintenderadd');
    }
    else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	   }
    public function tenderaddinsert()
	   {   
		
		// echo $id;exit;
		$date=date('Y-m-d');
	  
      $data1=array('tendertype'=>$this->input->post('tendertype'),
      	          'tendername'=>$this->input->post('tendername'),
                  'amount'=>$this->input->post('amount'),
                  'lastdateforapply'=>$this->input->post('lastdateforapply'),
                  'otherdetails'=>$this->input->post('otherdetails'),
                  'posted_on'=>$date
                  
                   );
	
	 $a=$this->Adminmodel->tenderadd($data1);
      if ($a)
      {
    	echo"<script>alert('Details added successfully')</script>";
    	redirect('Admincontroller/tenderaddview','refresh');
      }
      else
      {
    	echo"<script>alert('Unsuccess Adding ')</script>";
    	redirect('Admincontroller/tenderaddview','refresh');
      }
   }
   public function tendertb()
   {  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
	  {   

		$n['data']=$this->Adminmodel->tenderpass();
		$this->load->view('admin/tendertable',$n);
	   }
	   else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	  }
	public function deletetender()
	{
		$d=$this->uri->segment(3);
		$de=$this->Adminmodel->tenderaddpass1($d);
	 if($de)
	 {
		echo"<script>alert('Delete successful')</script>";
		redirect('Admincontroller/tendertb','refresh');
	 }
	 else
	 {
		echo"<script>alert('Deletion unsuccess')</script>";
		redirect('Admincontroller/tendertb','refresh');
	 }
	}
	public function edittender()
	{  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
	  {   
       
		$e=$this->uri->segment(3);
		$r['data']=$this->Adminmodel->tenderedit1($e);
		$this->load->view('admin/tendereditpage',$r);
		
	   }
	  else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function updatetender()
	{
		$i=$this->input->post('id');
		$data2=array('tendertype'=>$this->input->post('tendertype'),
	                 'tendername'=>$this->input->post('tendername'),
	                 'amount'=>$this->input->post('amount'),
	                 'lastdateforapply'=>$this->input->post('lastdateforapply'),
	                 'otherdetails'=>$this->input->post('otherdetails')
	                 // 'currentdate'=>$date
	                 );
		$u=$this->Adminmodel->tenderupdate($i,$data2);
		if($u)
		{
			echo"<script>alert('Updation Successful')</script>";
			redirect('Admincontroller/tendertb','refresh');
		}
		else
		{
			echo"<script>alert('Updation unsuccessful')</script>";
			redirect('Admincontroller/tendertb','refresh');
		}

	}
	public function tenderclosedadd()
    {  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
    {
    	$e=$this->uri->segment(3);
    	$r['data']=$this->Adminmodel->applyclosedtender($e);
    	$this->load->view('admin/tenderclosedapply',$r);
    }
    else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	   }
	   public function tenderclosedaddinsert()
	   {   
		// $loginid=$this->session->loginid;
		$ctenid=$this->input->post('hide');
		// echo $id;exit;
		$date=date('Y-m-d');
	  
      $data1=array(
                  'date'=>$this->input->post('date'),
                  'time'=>$this->input->post('time'),
                  'ctenid'=>$ctenid,
                  
                   );
	
	 $a=$this->Adminmodel->tenderclosedadd($data1);
      if ($a)
      {
    	echo"<script>alert('Details added successfully')</script>";
    	redirect('Admincontroller/tendertb','refresh');
      }
      else
      {
    	echo"<script>alert('Unsuccess Adding ')</script>";
    	redirect('Admincontroller/tendertb','refresh');
      }
   }
	public function viewapplication()
	{  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
	  {       
		$i=$this->uri->segment(3);
		$r['data']=$this->Adminmodel->applicationview($i);
		$this->load->view('admin/tenderviewapplication',$r);	
	  }
	  else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function accepttender()
	{      $e=$this->uri->segment(3);
		// $r=$this->Adminmodel->edit1($e);
		$accept=array('tstatus'=>'1');
		$r=$this->Adminmodel->accepttender($e,$accept);
	if($r)
	{
		
		echo"<script>alert('Accepted successfully')</script>";
		redirect('Admincontroller/tendertb','refresh');
	 }
	 else
	 {
		echo"<script>alert('Unsuccess Accept')</script>";
		redirect('Admincontroller/tendertb','refresh');
	 }
    }
	public function productcategory()
	{  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
    {
    	$this->load->view('admin/productcategory');
    }
    else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
    
  public function productcategoryinsert()
	   {   
	
	  
      $data1=array('category'=>$this->input->post('category')
                  
                   );
	
	 $a=$this->Adminmodel->productadd($data1);
      if ($a)
      {
    	echo"<script>alert('Details added successfully')</script>";
    	redirect('Admincontroller/productcategorytable','refresh');
      }
      else
      {
    	echo"<script>alert('Unsuccess Adding ')</script>";
    	redirect('Admincontroller/productcategorytable','refresh');
      }
   }
   public function productcategorytable()
   {  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
	  {   

		$n['data']=$this->Adminmodel->productcategorypass();
		$this->load->view('admin/productcategorytable',$n);
	  }
	  else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
   public function deleteproductcategory()
	{
		$d=$this->uri->segment(3);
		$de=$this->Adminmodel->productcategorypass1($d);
	 if($de)
	 {
		echo"<script>alert('Delete successful')</script>";
		redirect('Admincontroller/productcategorytable','refresh');
	 }
	 else
	 {
		echo"<script>alert('Deletion unsuccess')</script>";
		redirect('Admincontroller/productcategorytable','refresh');
	 }
	}
	public function editproductcategory()
	{  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
	  {   
    
		$e=$this->uri->segment(3);
		$r['data']=$this->Adminmodel->productcategoryedit1($e);
		$this->load->view('admin/productcategoryeditpage',$r);
		
	  }
	  else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function updateproductcategory()
	{
		$i=$this->input->post('id');
		$data2=array('category'=>$this->input->post('category')
	                 );
		$u=$this->Adminmodel->productcategoryupdate($i,$data2);
		if($u)
		{
			echo"<script>alert('Updation Successful')</script>";
			redirect('Admincontroller/productcategorytable','refresh');
		}
		else
		{
			echo"<script>alert('Updation unsuccessful')</script>";
			redirect('Admincontroller/productcategorytable','refresh');
		}

	}
	public function productsubcategory()
	{  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
    {
    	$d['data']=$this->Adminmodel->selectcategory();
    	$this->load->view('admin/productsubcategory',$d);
    }
    else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
    public function productsubcategoryinsert()
	{   
      $data1=array('category'=>$this->input->post('category'),
      	       'subcategory'=>$this->input->post('subcategory'),
      	       'taxamount'=>$this->input->post('taxamount')
                   );
	
	 $a=$this->Adminmodel->productsubadd($data1);
      if ($a)
      {
    	echo"<script>alert('Details added successfully')</script>";
    	redirect('Admincontroller/productsubcategorytable','refresh');
      }
      else
      {
    	echo"<script>alert('Unsuccess Adding ')</script>";
    	redirect('Admincontroller/productsubcategorytable','refresh');
      }
   }
   public function productsubcategorytable()
   {  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
	  {   
		$n['data']=$this->Adminmodel->productsubcategorypass();
		$this->load->view('admin/productsubcategorytable',$n);
	   }
	   else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
   public function deleteproductsubcategory()
	{
		$d=$this->uri->segment(3);
		$de=$this->Adminmodel->productsubcategorypass1($d);
	 if($de)
	 {
		echo"<script>alert('Delete successful')</script>";
		redirect('Admincontroller/productsubcategorytable','refresh');
	 }
	 else
	 {
		echo"<script>alert('Deletion unsuccess')</script>";
		redirect('Admincontroller/productsubcategorytable','refresh');
	 }
	}
	public function editproductsubcategory()
	{  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
	  {   
    
		$e=$this->uri->segment(3);
		$r['datas']=$this->Adminmodel->selectcategory($e);
		$r['data']=$this->Adminmodel->productsubcategoryedit1($e);
		$this->load->view('admin/productsubcategoryeditpage',$r);
		
   	}
   	else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function updateproductsubcategory()
	{
		$i=$this->input->post('id');
		
		$data2=array('category'=>$this->input->post('category'),
			       'subcategory'=>$this->input->post('subcategory'),
      	       'taxamount'=>$this->input->post('taxamount')
	                 );
		$u=$this->Adminmodel->productsubcategoryupdate($i,$data2);
		if($u)
		{
			echo"<script>alert('Updation Successful')</script>";
			redirect('Admincontroller/productsubcategorytable','refresh');
		}
		else
		{
			echo"<script>alert('Updation unsuccessful')</script>";
			redirect('Admincontroller/productsubcategorytable','refresh');
		}

	}

	public function addnotification()
	{  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
	  {
		$this->load->view('admin/notification');
	  }
	  else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function adminnotificationinsert()
	{
				$date=date('Y-m-d');
				$data1=array(
					'notification'=>$this->input->post('notification'),
				  'postedon'=>$date
				);
			$a=$this->Adminmodel->insertnotification($data1);
      if ($a)
      {
    	echo"<script>alert('Notification added successfully')</script>";
    	redirect('Admincontroller/addnotification','refresh');
      }
      else
      {
    	echo"<script>alert('Unsuccess Notification Adding ')</script>";
    	redirect('Admincontroller/addnotification','refresh');
      }
   }
   public function adminnotificationview()
   {  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
	  {   
		$n['data']=$this->Adminmodel->adminnotificationview();
		$this->load->view('admin/adminnotificationview',$n);
	  }
   else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function deletenotificationdetails()
	{
		$e=$this->uri->segment(3);
		$de=$this->Adminmodel->deletenotificationdetails($e);
	 if($de)
	 {
		echo"<script>alert('Notification deleted successfully')</script>";
		redirect('Admincontroller/adminnotificationview','refresh');
	 }
	 else
	 {
		echo"<script>alert('Unsuccessful notification deletion ')</script>";
		redirect('Admincontroller/adminnotificationview','refresh');
	 }
	}
	public function editnotificationdetails()
	{  
    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='0'))
	 {       
		$m=$this->uri->segment(3);
		$r['data']=$this->Adminmodel->editnotificationdetails($m);
		$this->load->view('admin/editnotification',$r);	
	  }
	  else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function updatenotificationdetails()
	{
		$i=$this->input->post('id');
		$data2=array('notification'=>$this->input->post('notification'),  
	                
	                 );
		$u=$this->Adminmodel->notificationupdate($i,$data2);
		if($u)
		{
			echo"<script>alert('Notification updation Successful')</script>";
			redirect('Admincontroller/adminnotificationview','refresh');
		}
		else
		{
			echo"<script>alert('Notification updation unsuccessful')</script>";
			redirect('Admincontroller/adminnotificationview','refresh');
		}

	}

	

   
	
	
}


