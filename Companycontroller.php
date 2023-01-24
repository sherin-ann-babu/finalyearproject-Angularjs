<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companycontroller extends CI_Controller {
	public function __construct()
     {
     	parent :: __construct();

     	$this->load->library(array('email','session'));
     	$this->load->helper(array('url','form'));
     	$this->load->database('');
     	$this->load->model('Companymodel');
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
	public function companyreg()
	{   $this->load->view('registrationsubheader');
		$this->load->view('company/companyreg');
		$this->load->view('footer');
	}
	public function companyinsert()
	{
	  $p=$this->input->post('password');
	  $b=$this->Companymodel->passencrypt($p);
      $data1=array('companyname'=>$this->input->post('compname'),
                  'address'=>$this->input->post('address'),
                  'state'=>$this->input->post('state'),
                  'district'=>$this->input->post('district'),
                  'contactno'=>$this->input->post('contactno'),
                   );
      $data2=array('email'=>$this->input->post('email'),
                  'password'=>$b,
                  'utype'=>'2'
                  );
	
	  $a=$this->Companymodel->companyinsert($data1,$data2);
      if ($a)
      {
    	echo"<script>alert('Registration successful')</script>";
    	redirect('Companycontroller/companyreg','refresh');
      }
      else
      {
    	echo"<script>alert('Registration unsuccess')</script>";
    	redirect('Companycontroller/companyreg','refresh');
      }
   }
   public function companymainheader()
   {
   	if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
   	{
   	 $this->load->view('company/companymainheader');
      }
      else
      {
    	redirect('Usercontroller/index','refresh');
      }

    }
    public function companysubheader()
    {  
   	if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
   	{
   	  $this->load->view('company/companysubheader');
      }
      else
      {
    	  redirect('Usercontroller/index','refresh');
      }
    }
    public function edit()
      {  
   	 if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
	   {
	      $this->load->view('company/companysubheader');
	      $e=$this->session->loginid;
		$r['data']=$this->Companymodel->edit1($e);
		$this->load->view('company/companyeditpage',$r);
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
		$data2=array('companyname'=>$this->input->post('compname'),
	                 'address'=>$this->input->post('address'),
	                 'state'=>$this->input->post('state'),
                       'district'=>$this->input->post('district'),
                       'contactno'=>$this->input->post('contactno'),
                       
	               
	                 );
		$u=$this->Companymodel->update($i,$data2);
		if($u)
		{
			echo"<script>alert('Updation Successful')</script>";
			redirect('Companycontroller/edit','refresh');
		}
		else
		{
			echo"<script>alert('Updation unsuccessful')</script>";
			redirect('Companycontroller/edit','refresh');
		}
	}
	public function shipdetails()
	{  
   	 if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
	{    
		$this->load->view('company/shipsubheader');
		$this->load->view('company/shipdetails');
		$this->load->view('footer');
	}
	else
         {
    	      redirect('Usercontroller/index','refresh');
         }
	}
	public function shipdetailsinsert()
	{   
		
		$id=$this->session->loginid;
		
		// echo $id;exit;
	  
      $data1=array('sname'=>$this->input->post('name'),
                  'scategory'=>$this->input->post('scategory'),
                  'source'=>$this->input->post('source'),
                  'destination'=>$this->input->post('destination'),
                  'travelroute'=>$this->input->post('travelroute'),
                  'startingdate'=>$this->input->post('startingdate'),
                  'endingdate'=>$this->input->post('endingdate'),
                  'otherdetails'=>$this->input->post('otherdetails'),
                  'companyloginid'=>$id
                   );
	
	 $a=$this->Companymodel->shipdetails($data1);
      if ($a)
      {
    	echo"<script>alert('Details added successfully')</script>";
    	redirect('Companycontroller/shipdetails','refresh');
      }
      else
      {
    	echo"<script>alert('Unsuccess Adding ')</script>";
    	redirect('Companycontroller/shipdetails','refresh');
      }
   }
   public function shipview()
   {  
   	 if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
	{     $this->load->view('company/shipsubheader');
	      $e=$this->session->loginid;
		// echo $e;exit;
		
		$n['data']=$this->Companymodel->pass($e);
		$this->load->view('company/shipview',$n);
		$this->load->view('footer');
	}
	else
         {
    	      redirect('Usercontroller/index','refresh');
         }
	}
   public function shipdelete()
	{
		$d=$this->uri->segment(3);
		$de=$this->Companymodel->shippass1($d);
	 if($de)
	 {
		echo"<script>alert('Delete successful')</script>";
		redirect('Companycontroller/shipview','refresh');
	 }
	 else
	 {
		echo"<script>alert('Deletion unsuccess')</script>";
		redirect('Companycontroller/shipview','refresh');
	 }
	}
   public function editship()
    {  
   	 if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
	{   
            $this->load->view('company/shipsubheader');
		// $e=$this->session->loginid;
		 $e=$this->uri->segment(3);
		// echo $e ; exit;
		$r['data']=$this->Companymodel->editship($e);
		$this->load->view('company/shipeditpage',$r);
		$this->load->view('footer');
	}
	else
         {
    	      redirect('Usercontroller/index','refresh');
         }
	}
    public function shipupdate()
	 {    
	      $id=$this->session->loginid;
		$i=$this->input->post('id');
		$data2=array('sname'=>$this->input->post('name'),
                  'scategory'=>$this->input->post('scategory'),
                  'source'=>$this->input->post('source'),
                  'destination'=>$this->input->post('destination'),
                  'travelroute'=>$this->input->post('travelroute'),
                  'startingdate'=>$this->input->post('startingdate'),
                  'endingdate'=>$this->input->post('endingdate'),
                  'otherdetails'=>$this->input->post('otherdetails'),
                  'companyloginid'=>$id
                   );
		$u=$this->Companymodel->shipupdate($i,$data2);
		if($u)
		{
			echo"<script>alert('Updation Successful')</script>";
			redirect('Companycontroller/shipview','refresh');
		}
		else
		{
			echo"<script>alert('Updation unsuccessful')</script>";
			redirect('Companycontroller/shipview','refresh');
		}

	}
	public function exportdetailsview()
	  {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
	   {     
		$this->load->view('company/shipsubheader');
		// $e=$this->uri->segment(3);
		$e=$this->session->loginid;
		// echo $e;exit;
		$n['data']=$this->Companymodel->passexportdetails($e);
		$this->load->view('company/comexportdetailstable',$n);
		$this->load->view('footer');
          }
          else
          {
    	      redirect('Usercontroller/index','refresh');
          }
	   }
	public function rejectexport()
	{
		$d=$this->uri->segment(3);
		$rej=array('status'=>'2');
		$re=$this->Companymodel->rejectexport($d,$rej);
	 if($re)
	 {
		echo"<script>alert('Rejected successfully')</script>";
		redirect('Companycontroller/exportdetailsview','refresh');
	 }
	 else
	 {
		echo"<script>alert('Unsuccess Rejection')</script>";
		redirect('Companycontroller/exportdetailsview','refresh');
	 }
	}
	public function approveexport()
	{      $e=$this->uri->segment(3);
		// $r=$this->Adminmodel->edit1($e);
		$aprv=array('status'=>'1');
		$r=$this->Companymodel->approveexport($e,$aprv);
	if($r)
	{
		
		echo"<script>alert('Approved successfully')</script>";
		redirect('Companycontroller/expamount/'.$e,'refresh');
	 }
	 else
	 {
		echo"<script>alert('Unsuccess Approve')</script>";
		redirect('Companycontroller/expamount','refresh');
	 }
    }
    public function expamount()
      {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
	    {    
		$d['id']=$this->uri->segment(3);

		$this->load->view('company/shipsubheader');
		$this->load->view('company/exportamount',$d);
		$this->load->view('footer');
	     }
	     else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	     }
	public function expamountinsert()
	{   
		$id=$this->input->post('hide');
	  // echo $id;exit;
      $data1=array('expamount'=>$this->input->post('expamount')
                  
                  );
	// print_r($data1);exit;
	 $a=$this->Companymodel->expamountinsert($data1,$id);
      if ($a)
      {
    	echo"<script>alert('Amount added successfully')</script>";
    	redirect('Companycontroller/exportdetailsview','refresh');
      }
      else
      {
    	echo"<script>alert('Unsuccess Amount Adding ')</script>";
    	redirect('Companycontroller/exportdetailsview','refresh');
      }
   }

	public function refund()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
	    {   
        
		$data['eid']=$this->uri->segment(3);
		$this->load->view('refund',$data);
	     }
	     else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	     }
	public function makerefund()
	{     
		$id=$this->session->loginid;
		// echo $id;exit;
		$date=date('Y-m-d');
		$eid=$this->input->post('hide');
		 // echo $eid;exit;
		$payname=$this->input->post('payname');
		 //echo $payname;exit;
		$cardno=$this->input->post('cardno');
		// echo $cardno;exit;
		$cvv=$this->input->post('cvv');
		// echo $cvv;exit;
		$result=$this->Companymodel->checkcompany($payname,$cardno,$cvv);
		// echo $result;exit;
		if($result>0)
		{
			// echo $eid;exit;
			$uid=$this->Companymodel->selectuser($eid);
			$fee=$this->Companymodel->selectfee($eid);

			// echo $fee;exit;
			 $tax=$this->Companymodel->selectproduct($eid);
			 // echo $prid;exit;
			 $nmbr=$this->Companymodel->selectnmbr($eid);
			// echo $nmbr;exit;
			 $pay=$fee*$tax*$nmbr;
			// echo $pay;exit;
			$result1=$this->Companymodel->checkcompanybank($payname,$cardno,$cvv);
			// echo $result1;exit;
			if($result1>$fee)
			{
				$new=$result1-$pay;
				// echo $new;exit;
				$data=array('totalamount'=>$new);
				$result2=$this->Companymodel->updateamount($id,$data);
				// $companyid=$this->Usermodel->selectcompany($eid);
				// echo $companyid;exit;
				$result3=$this->Companymodel->checkuserbank($uid);
				$newcompany=$result3+$pay;
				// echo $newcompany;exit;
				$data1=array('totalamount'=>$newcompany);
				$result4=$this->Companymodel->updateuseramount($data1,$uid);
				$data2=array(
				        'payname'=>$payname,
				        'cardno'=>$cardno,
                                'cvv'=>$cvv,
                                'loginid'=>$id,
                                'pstatus'=>'1',
                                'pamount'=>$pay,
                                'currentdate'=>$date
                                );
				$result5=$this->Companymodel->insertpayment($data2);
				$data3=array('refundstatus'=>'1');
				$result6=$this->Companymodel->updatestatus($eid,$data3);
				if($result6)
				{
					echo"<script>alert('Refund Successful')</script>";
			           redirect('Companycontroller/exportdetailsview','refresh');
				}
				else
				{
					echo"<script>alert('Refund Unsuccessful!!!')</script>";
			           redirect('Companycontroller/exportdetailsview','refresh');
				}
			}
			else
			 {
			  echo"<script>alert('Insufficient Balance')</script>";
			  redirect('Companycontroller/exportdetailsview','refresh');
		        }
		}
		else
		  {
		    echo"<script>alert('Incorrect Cardno or cvv')</script>";
		    redirect('Companycontroller/exportdetailsview','refresh');
		   }
		
	}
	public function cancelledpayments()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
       {
    	   $this->load->view('company/companysubheader');
         $id=$this->session->loginid;
       // $tenid=$this->input->post('id');
    	   // $id=$this->uri->segment(3);
         $n['data']=$this->Companymodel->cancelledpaymentsview($id);
         $this->load->view('company/cancelledpayments',$n);
	   $this->load->view('footer');
       }
       else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	     }
    public function complaintview()
        {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
	     {     
		$this->load->view('company/companysubheader');
		// $e=$this->uri->segment(3);
		$e=$this->session->loginid;
		 // echo $e;exit;
		$n['data']=$this->Companymodel->passcomplaint($e);
		$this->load->view('company/complainttable',$n);
		$this->load->view('footer');
	     }
	    else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	   }
	public function rejectcomplaint()
	{
		$d=$this->uri->segment(3);
		$rej=array('cstatus'=>'2');
		$re=$this->Companymodel->rejectcomplaint($d,$rej);
	 if($re)
	 {
		echo"<script>alert('Rejected successfully')</script>";
		redirect('Companycontroller/complaintview','refresh');
	 }
	 else
	 {
		echo"<script>alert('Unsuccess Rejection')</script>";
		redirect('Companycontroller/complaintview','refresh');
	 }
	}
	public function approvecomplaint()
	{      $e=$this->uri->segment(3);
		// $r=$this->Adminmodel->edit1($e);
		$aprv=array('cstatus'=>'1');
		$r=$this->Companymodel->approvecomplaint($e,$aprv);
	if($r)
	{
		
		echo"<script>alert('Approved successfully')</script>";
		redirect('Companycontroller/comrefund/'.$e,'refresh');
	 }
	 else
	 {
		echo"<script>alert('Unsuccess Approve')</script>";
		redirect('Companycontroller/complaintview','refresh');
	 }
    }
    public function comrefund()
     {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
	   {   
        
		$data['cid']=$this->uri->segment(3);
		// $data1['cid']=$this->uri->segment(3);
		$this->load->view('comrefund',$data);	
	   }
	   else
            {
    	      redirect('Usercontroller/index','refresh');
            }
      }
	public function makecomrefund()
	{     
		$id=$this->session->loginid;
		// echo $id;exit;
		$cid=$this->input->post('hide');
		// echo $cid;exit;
		$date=date('Y-m-d');
		$eid=$this->Companymodel->selecteid($cid);
		 // echo $eid;exit;
		$payname=$this->input->post('payname');
		 // echo $payname;exit;
		$cardno=$this->input->post('cardno');
		 // echo $cardno;exit;
		$cvv=$this->input->post('cvv');
		// echo $cvv;exit;
		$result=$this->Companymodel->checkcompany1($payname,$cardno,$cvv);
		 //echo $result;exit;
		if($result>0)
		{
			
			$uid=$this->Companymodel->selectuser1($cid);
			// echo $uid;exit;
			$fee=$this->Companymodel->selectfee1($eid);

			 // echo $fee;exit;
			 $tax=$this->Companymodel->selectproduct1($eid);
			 // echo $tax;exit;
			 $nmbr=$this->Companymodel->selectnmbr1($cid);
			 // echo $nmbr;exit;
			 $pay=$fee*$tax*$nmbr;
			 // echo $pay;exit;
			$result1=$this->Companymodel->checkcompanybank1($payname,$cardno,$cvv);
			// echo $result1;exit;
			if($result1>$pay)
			{
				$new=$result1-$pay;
				 // echo $new;exit;
				$data=array('totalamount'=>$new);
				$result2=$this->Companymodel->updateamount1($id,$data);
				// $companyid=$this->Usermodel->selectcompany($eid);
				// echo $companyid;exit;
				$result3=$this->Companymodel->checkuserbank1($uid);
				$newcompany=$result3+$pay;
				 // echo $newcompany;exit;
				$data1=array('totalamount'=>$newcompany);
				$result4=$this->Companymodel->updateuseramount1($data1,$uid);
				$data2=array(
				        'payname'=>$payname,
				        'cardno'=>$cardno,
                                'cvv'=>$cvv,
                                'loginid'=>$id,
                                'pstatus'=>'1',
                                'pamount'=>$pay,
                                'currentdate'=>$date
                                );
				$result5=$this->Companymodel->insertpayment1($data2);
				$data3=array('refstatus'=>'1');
				$result6=$this->Companymodel->updatestatus1($cid,$data3);
				if($result6)
				{
					echo"<script>alert('Refund Successful')</script>";
			           redirect('Companycontroller/complaintview','refresh');
				}
				else
				{
					echo"<script>alert('Refund Unsuccessful!!!')</script>";
			           redirect('Companycontroller/complaintview','refresh');
				}
			}
			else
			 {
			  echo"<script>alert('Insufficient Balance')</script>";
			  redirect('Companycontroller/complaintview','refresh');
		        }
		}
		else
		  {
		    echo"<script>alert('Incorrect Cardno or cvv')</script>";
		    redirect('Companycontroller/complaintview','refresh');
		   }
		
	}
	public function jobposting()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
	    {    
		$this->load->view('company/jobsubheader');
		$this->load->view('company/jobposting');
		$this->load->view('footer');
	    }
	     else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function jobinsert()
	{   
		
		$date=date('Y-m-d');
		$id=$this->session->loginid;
		// echo $id;exit;
	  
      $data1=array('jobcategory'=>$this->input->post('jobcategory'),
                  'jobname'=>$this->input->post('jobname'),
                  'jobdetails'=>$this->input->post('jobdetails'),
                  'lastdate'=>$this->input->post('lastdate'),
                  'qualification'=>$this->input->post('qualification'),
                  'posted'=>$date,
                  'cmploginid'=>$id
                
                   );
	
	 $a=$this->Companymodel->jobinsert($data1);
      if ($a)
      {
    	echo"<script>alert('Job details added successfully')</script>";
    	redirect('Companycontroller/jobposting','refresh');
      }
      else
      {
    	echo"<script>alert('Unsuccess Job details adding ')</script>";
    	redirect('Companycontroller/jobposting','refresh');
      }
   }
   public function jobview()
     {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
	    {     
	    	$this->load->view('company/jobsubheader');
	      $e=$this->session->loginid;
		// echo $e;exit;
		
		$n['data']=$this->Companymodel->jobview($e);
		$this->load->view('company/jobview',$n);
		$this->load->view('footer');
	     }
	     else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function editjob()
	 {  
   	      if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
	      {   
		// $e=$this->session->loginid;
            $this->load->view('company/jobsubheader');
		$e=$this->uri->segment(3);
		// echo $e;exit;
		$r['data']=$this->Companymodel->editjob($e);
		$this->load->view('company/companyjobedit',$r);
		$this->load->view('footer');
	      }
	      else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}

    public function updatejob()
	{
		 $i=$this->input->post('id');
		$data2=array('jobcategory'=>$this->input->post('jobcategory'),
                  'jobname'=>$this->input->post('jobname'),
                  'jobdetails'=>$this->input->post('jobdetails'),
                  'lastdate'=>$this->input->post('lastdate'),
                  'qualification'=>$this->input->post('qualification')
                  
                   );
		$u=$this->Companymodel->updatejob($i,$data2);
		if($u)
		{
			echo"<script>alert('Job Updation Successful')</script>";
			redirect('Companycontroller/jobview','refresh');
		}
		else
		{
			echo"<script>alert('Updation unsuccessful')</script>";
			redirect('Companycontroller/jobview','refresh');
		}

	}
	public function deletejob()
	{
		$d=$this->uri->segment(3);
		$de=$this->Companymodel->delete($d);
	 if($de)
	 {
		echo"<script>alert('Delete successful')</script>";
		redirect('Companycontroller/jobview','refresh');
	 }
	 else
	 {
		echo"<script>alert('Deletion unsuccess')</script>";
		redirect('Companycontroller/jobview','refresh');
	 }
	}
	public function jobviewapplication()
	 {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
	     {     
		$this->load->view('company/jobsubheader');
		$e=$this->uri->segment(3);
		// $e=$this->session->loginid;
		// echo $e;exit;
		$n['data']=$this->Companymodel->jobapplicationview($e);
		$this->load->view('company/viewapplication',$n);
		$this->load->view('footer');
	     }
	    else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	  }

	public function approvejob()
	{     
	      $e=$this->uri->segment(3);
		// $r=$this->Adminmodel->edit1($e);
		$aprv=array('apstatus'=>'1');
		$r=$this->Companymodel->approvejob($e,$aprv);
	if($r)
	{
		
		echo"<script>alert('Job Approved successfully')</script>";
		redirect('Companycontroller/jobview ','refresh');
	 }
	 else
	 {
		echo"<script>alert('Unsuccess Job Approve')</script>";
		redirect('Companycontroller/jobview','refresh');
	 }
      }
      public function rejectjob()
	{
		$d=$this->uri->segment(3);
		$rej=array('apstatus'=>'2');
		$re=$this->Companymodel->rejectjob($d,$rej);
	 if($re)
	 {
		echo"<script>alert('Job Rejected successfully')</script>";
		redirect('Companycontroller/jobview','refresh');
	 }
	 else
	 {
		echo"<script>alert('Unsuccess Rejection')</script>";
		redirect('Companycontroller/jobview','refresh');
	 }
	}
	public function callletter()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='2'))
	     {   
		$id=$this->uri->segment(3); 
		$this->load->view('company/companysubheader');
		$n['data']=$this->Companymodel->callletter($id);
		$this->load->view('company/companycallletter',$n);
		$this->load->view('footer');
	     }
	     else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	  }
	public function callletterinsert()
	{   
		
		// $id=$this->session->loginid;
		// $date=date('Y-m-d');
		$jobapplyid=$this->input->post('id');

		$config['upload_path']='./uploads/';
                   $config['allowed_types']='mp3|mp4|jpg|docx|pdf|png|PNG|jpeg';
                   $config['max_size']=1000000;
                   $config['max_width']=10240;
                   $config['max_height']=10000;
                   $this->load->library('upload',$config);
            if(! $this->upload->do_upload('uploadcallletter'))
            {
            	$error=array('error'=>$this->upload->display_errors());
            	$images=$this->input->post('uploadcallletter');

            }
            else
            {
            	$data=array('images'=>$this->upload->data());
            	$images=$data['images']['file_name'];
            }
            
		// echo $id;exit;echo 
		// print_r($images);exit;

		 // echo $expid;exit;

	  
      $data1=array(
                  'callletter'=>$images
                  
                   );
	
	 $a=$this->Companymodel->callletterinsert($data1,$jobapplyid);
      if ($a)
      {
    	echo"<script>alert('Job Call letter Uploaded ')</script>";
    	redirect('Companycontroller/jobview','refresh');
      }
      else
      {
    	echo"<script>alert('Job Call letter not uploaded ')</script>";
    	redirect('Companycontroller/jobview','refresh');
      }
   }

   }
   ?>
	
	
   
    

