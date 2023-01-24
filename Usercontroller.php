<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercontroller extends CI_Controller {
	public function __construct()
     {
     	parent :: __construct();

     	$this->load->library(array('email','session'));
     	$this->load->helper(array('url','form'));
     	$this->load->database('');
     	$this->load->model('Usermodel');
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
	public function index()
	{     
		$this->load->view('index');
		
	}
	public function loginindex()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
	   {

		$this->load->view('loginindex');
	    }
	     else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function userreg()
	
	{    
		$this->load->view('registrationsubheader');
		$this->load->view('user/userreg');
		$this->load->view('footer');
	}
	
	public function userinsert()
	{
	  $p=$this->input->post('password');
	  $b=$this->Usermodel->passencrypt($p);
      $data1=array('name'=>$this->input->post('name'),
                  'address'=>$this->input->post('address'),
                  'pincode'=>$this->input->post('pincode'),
                  'district'=>$this->input->post('district'),
                  'contactno'=>$this->input->post('contactno'),
                  'adharno'=>$this->input->post('adharno')
                   );
      $data2=array('email'=>$this->input->post('email'),
                  'password'=>$b,
                  'utype'=>'1'
                  );
	
	  $a=$this->Usermodel->userinsert($data1,$data2);
      if ($a)
      {
    	echo"<script>alert('Registration successful')</script>";
    	redirect('Usercontroller/userreg','refresh');
      }
      else
      {
    	echo"<script>alert('Registration unsuccess')</script>";
    	redirect('Usercontroller/userreg','refresh');
      }
   }
   public function usermainheader()
   {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
        {
   	      $this->load->view('user/usermainheader');
         }
     else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
    public function usersubheader()
    {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
        {
   	      $this->load->view('user/usersubheader');
         }
         else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
    public function edit()
    {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
	    {
	      $this->load->view('user/usersubheader');
	     $e=$this->session->loginid;
		$r['data']=$this->Usermodel->edit1($e);
		$this->load->view('user/usereditpage',$r);
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
                       'contactno'=>$this->input->post('contactno'),
                       'adharno'=>$this->input->post('adharno')
	               
	                 );
		$u=$this->Usermodel->update($i,$data2);
		if($u)
		{
			echo"<script>alert('Updation Successful')</script>";
			redirect('Usercontroller/edit','refresh');
		}
		else
		{
			echo"<script>alert('Updation unsuccessful')</script>";
			redirect('Usercontroller/edit','refresh');
		}
	}
	public function exportsearch()
	{  
   	   if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
	   {
	    $this->load->view('user/usersubheader');
	    $s['data']=null;
	    $this->load->view('user/exportsearch',$s);
	    $this->load->view('footer');
	   }
      else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}

	
	public function exportsearchresult()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
	    {    
		$this->load->view('user/usersubheader');
		$source=$this->input->post('source');
		$destination=$this->input->post('destination');

		$bc['data']=$this->Usermodel->exportsearchresult($source,$destination);
		$this->load->view('user/exportsearch',$bc);
		$this->load->view('footer');
	    }
	    else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function exportnow()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
	    {
		$this->load->view('user/usersubheader');
		$d['shipid']=$this->uri->segment(3);
    		$d['datas']=$this->Usermodel->selectcategory();
    		 $d['data']=$this->Usermodel->selectsubcategory();

		$this->load->view('user/exportdetails',$d);
		$this->load->view('footer');
	    }
	else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}

    public function exportdetailsinsert()
	{  
	 $loginid=$this->session->loginid; 
	 $applyon=date('Y-m-d');
	 $shipid=$this->input->post('hide');
	
	  
      $data1=array('category'=>$this->input->post('category'),
      	       'subcategory'=>$this->input->post('subcategory'),
      	       'companyname'=>$this->input->post('companyname'),
      	       'noofproducts'=>$this->input->post('noofproducts'),
      	       'recname'=>$this->input->post('recname'),
      	       'recaddress'=>$this->input->post('recaddress'),
      	       'reccontactno'=>$this->input->post('reccontactno'),
      	       'recemail'=>$this->input->post('recemail'),
      	       'applyon'=>$applyon,
      	       'shipid'=>$shipid,
      	       'loginid'=>$loginid
                   );
	
	 $a=$this->Usermodel->exportdetailsadd($data1);
      if ($a)
      {
    	echo"<script>alert('Details added successfully')</script>";
    	redirect('Usercontroller/exportdetailsview','refresh');
      }
      else
      {
    	echo"<script>alert('Unsuccess Adding ')</script>";
    	redirect('Usercontroller/exportdetailsview','refresh');
      }
   }
    public function exportdetailsview()
    {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
       { 
    	$this->load->view('user/usersubheader');
       $id=$this->session->loginid;
       // $tenid=$this->input->post('id');
       $n['data']=$this->Usermodel->exportdetailsview($id);
       $this->load->view('user/exportdetailstable',$n);
	   $this->load->view('footer');
       }
       else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	
    public function cancelexportdetails()
	{
        $eid=$this->uri->segment(3);
        $data3=array('cancelstatus'=>'1');
                $result6=$this->Usermodel->updatecancelstatus($eid,$data3);
                if($result6)
                {
                    echo"<script>alert('Cancel Successful')</script>";
                       redirect('Usercontroller/exportdetailsview','refresh');
                }
                else
                {
                    echo"<script>alert(Cancel Unsuccessful!!!')</script>";
                       redirect('Usercontroller/exportdetailsview','refresh');
                }
    }
    public function mycancelleditemsview()
    {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
       { 
    	$this->load->view('user/usersubheader');
       $id=$this->session->loginid;
       // $tenid=$this->input->post('id');
       $n['data']=$this->Usermodel->cancelleditemsview($id);
       $this->load->view('user/mycancelleditems',$n);
	   $this->load->view('footer');
       }
       else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
    public function editexportdetails()
    {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
	   {   
        $this->load->view('editsubheader');
		 $e=$this->uri->segment(3);
		 $r['datas']=$this->Usermodel->selectcategory($e);
		 $r['data']=$this->Usermodel->selectsubcategory($e);
		$r['data1']=$this->Usermodel->exportdetailsedit1($e);
		$this->load->view('user/exportdetailseditpage',$r);
		$this->load->view('footer');
	   }
	   else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function updateexportdetails()
	{
		$i=$this->input->post('hide');
		// $e=$this->uri->segment(3);
		$data2=array(
			 'category'=>$this->input->post('category'),
      	       'subcategory'=>$this->input->post('subcategory'),
      	       'companyname'=>$this->input->post('companyname'),
      	       'noofproducts'=>$this->input->post('noofproducts'),
      	       'recname'=>$this->input->post('recname'),
      	       'recaddress'=>$this->input->post('recaddress'),
      	       'reccontactno'=>$this->input->post('reccontactno'),
      	       'recemail'=>$this->input->post('recemail'),
      	       // 'applyon'=>$applyon,
      	       // 'shipid'=>$shipid,
      	       // 'loginid'=>$loginid
	                 );
		$u=$this->Usermodel->exportdetailsupdate($i,$data2);
		if($u)
		{
			echo"<script>alert('Updation Successful')</script>";
			redirect('Usercontroller/exportdetailsview','refresh');
		}
		else
		{
			echo"<script>alert('Updation unsuccessful')</script>";
			redirect('Usercontroller/exportdetailsview','refresh');
		}

	}
	
	public function payment()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
	    {   
        
		  $data['eid']=$this->uri->segment(3);
		  $this->load->view('payment',$data);
	     }
	   else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function makepayment()
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
		$result=$this->Usermodel->checkuser($payname,$cardno,$cvv);
		// echo $result;exit;
		if($result>0)
		{
			// echo $eid;exit;
			$fee=$this->Usermodel->selectfee($eid);
			// echo $fee;exit;
			$tax=$this->Usermodel->selectproduct($eid);
			// echo $prid;exit;
			$nmbr=$this->Usermodel->selectnmbr($eid);
			// echo $nmbr;exit;
			// $ta=$tax*$nmbr;
			$pay=$fee*$tax*$nmbr;
			// echo $pay;exit;
			$result1=$this->Usermodel->checkuserbank($payname,$cardno,$cvv);
			// echo $result1;exit;
			if($result1>$fee )
			{
				$new=$result1-$pay;
				 // echo $new;exit;
				$data=array('totalamount'=>$new);
				$result2=$this->Usermodel->updateamount($id,$data);
				// echo $result2;exit;
				$companyid=$this->Usermodel->selectcompany($eid);
				// echo $companyid;exit;
				$result3=$this->Usermodel->checkcompanybank($companyid);
				$newcompany=$result3+$pay;
				// echo $newcompany;exit;
				$data1=array('totalamount'=>$newcompany);
				$result4=$this->Usermodel->updatecompanyamount($data1,$companyid);
				$data2=array(
				        'payname'=>$payname,
				        'cardno'=>$cardno,
                                'cvv'=>$cvv,
                                'loginid'=>$id,
                                'pstatus'=>'1',
                                'pamount'=>$pay,
                                'currentdate'=>$date
                                );
				$result5=$this->Usermodel->insertpayment($data2);
				$data3=array('paystatus'=>'1');
				$result6=$this->Usermodel->updatestatus($eid,$data3);
				if($result6)
				{
					echo"<script>alert('Payment Successful')</script>";
			           redirect('Usercontroller/exportsearchresult','refresh');
				}
				else
				{
					echo"<script>alert('Payment Unsuccessful!!!')</script>";
			           redirect('Usercontroller/exportsearchresult','refresh');
				}
			}
			else
			{
			  echo"<script>alert('Insufficient Balance')</script>";
			  redirect('Usercontroller/exportsearchresult','refresh');
		      }
		}
	}
	public function complaint()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
	    {
		$this->load->view('user/usersubheader');
		$data['eid']=$this->uri->segment(3);
		$this->load->view('user/complaint',$data);
		$this->load->view('footer');
	    }
	    else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function complaintinsert()
	{   
		
		$id=$this->session->loginid;
		$date=date('Y-m-d');
		$expid=$this->input->post('hide');
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

		 // echo $expid;exit;

	  
      $data1=array('complaint'=>$this->input->post('complaint'),
                  'photo'=>$images,
                  'cnoofproducts'=>$this->input->post('cnoofproducts'),
                  'expid'=>$expid,
                  'uloginid'=>$id,
                  'currentdate'=>$date

                   );
	
	 $a=$this->Usermodel->addcomplaint($data1);
      if ($a)
      {
    	echo"<script>alert('Complaints added successfully')</script>";
    	redirect('Usercontroller/exportdetailsview','refresh');
      }
      else
      {
    	echo"<script>alert('Unsuccess Adding ')</script>";
    	redirect('Usercontroller/exportdetailsview','refresh');
      }
   }
    public function complaintview()
    {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
	    {   
		$this->load->view('user/usersubheader');
	    $m=$this->session->loginid;
		$n['data']=$this->Usermodel->complaintview($m);
		$this->load->view('user/complaintview',$n);
		$this->load->view('footer');
	    }
	     else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function complaintdelete()
	{
		$d=$this->uri->segment(3);
		$de=$this->Usermodel->complaintdelete($d);
	 if($de)
	 {
		echo"<script>alert('Delete successful')</script>";
		redirect('Usercontroller/complaintview','refresh');
	 }
	 else
	 {
		echo"<script>alert('Deletion unsuccess')</script>";
		redirect('Usercontroller/complaintview','refresh');
	 }
	}
	public function complaintedit()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
	   {   
		$this->load->view('user/usersubheader');
 		$e=$this->uri->segment(3);
		$r['data']=$this->Usermodel->complaintedit($e);
		$this->load->view('user/complaintedit',$r);
		$this->load->view('footer');
	   }
	   else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function complaintupdate()
	{
		$id=$this->session->loginid;
		$date=date('Y-m-d');
		$expid=$this->input->post('hide');
		$ab=array(
			     'complaint'=>$this->input->post('complaint'),
                  'photo'=>$images,
                  'cnoofproducts'=>$this->input->post('cnoofproducts'),
                  'expid'=>$expid,
                  'uloginid'=>$id,
                  'currentdate'=>$date

                   );
	
	 $a=$this->Usermodel->complaintupdate($id,$ab);
      if ($a)
      {
    	echo"<script>alert('Complaints updated successfully')</script>";
    	redirect('Usercontroller/complaintview','refresh');
      }
      else
      {
    	echo"<script>alert('Updation Unsuccess  ')</script>";
    	redirect('Usercontroller/complaintview','refresh');
      }
	}
	public function notificationview()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
	   {     
		$this->load->view('user/usersubheader');
		$n['data']=$this->Usermodel->notificationview();
		$this->load->view('user/notificationview',$n);
		$this->load->view('footer');
	    }
	    else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
    public function jobview()
    {  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
	   {   
		// $id=$this->uri->segment(3); 
		// $e=$this->session->loginid;
		$this->load->view('user/usersubheader');
		$n['data']=$this->Usermodel->jobview();
		$this->load->view('user/userjobview',$n);
		$this->load->view('footer');
	   }
	    else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	
	public function jobapply()
	{  
   	    if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
	   {   
		$id=$this->uri->segment(3); 
		// $id=$this->session->loginid;
		$this->load->view('user/usersubheader');
		$n['data']=$this->Usermodel->jobapply($id);
		$this->load->view('user/jobapply',$n);
		$this->load->view('footer');
        }
         else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}

	public function jobapplyinsert()
	{   
		
		$id=$this->session->loginid;
		$date=date('Y-m-d');
		$jobid=$this->input->post('id');
		$config['upload_path']='./uploads/';
                   $config['allowed_types']='mp3|mp4|jpg|docx|pdf|png|PNG|jpeg';
                   $config['max_size']=1000000;
                   $config['max_width']=10240;
                   $config['max_height']=10000;
                   $this->load->library('upload',$config);
            if(! $this->upload->do_upload('uploadcv'))
            {
            	$error=array('error'=>$this->upload->display_errors());
            	$images=$this->input->post('uploadcv');

            }
            else
            {
            	$data=array('images'=>$this->upload->data());
            	$images=$data['images']['file_name'];
            }
            
		// echo $id;exit;echo 
		// print_r($images);exit;

		 // echo $expid;exit;

	  
      $data1=array('jobid'=>$jobid,
                  'userloginid'=>$id,
                  'cv'=>$images,
                  'applydate'=>$date

                   );
	
	 $a=$this->Usermodel->jobapplyinsert($data1);
      if ($a)
      {
    	echo"<script>alert('Job applied successfully')</script>";
    	redirect('Usercontroller/jobview','refresh');
      }
      else
      {
    	echo"<script>alert('Unsuccess Job apply ')</script>";
    	redirect('Usercontroller/jobview','refresh');
      }
   }
   
	public function userjobapplydetailsview()
	{  
   	   if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
	   {   
		$id=$this->session->loginid;
		$this->load->view('user/usersubheader');
		$n['data']=$this->Usermodel->userjobapplydetailsview($id);
		$this->load->view('user/userjobdetailsview',$n);
		$this->load->view('footer');
	   }
	   else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function editjobapplydetails()
	{  
   	   if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)AND ($_SESSION['utype']==='1'))
	   {   
		$id=$this->uri->segment(3); 
		// $id=$this->session->loginid;
		$this->load->view('user/usersubheader');
		$n['data']=$this->Usermodel->editjobapplydetails($id);
		$this->load->view('user/userjobapplyedit',$n);
		$this->load->view('footer');
	   }
	   else
            {
    	      redirect('Usercontroller/index','refresh');
            }
	}
	public function updatejobapplydetails()
	{   
		
		$i=$this->input->post('id');
		$config['upload_path']='./uploads/';
                   $config['allowed_types']='mp3|mp4|jpg|docx|pdf|png|PNG|jpeg';
                   $config['max_size']=1000000;
                   $config['max_width']=10240;
                   $config['max_height']=10000;
                   $this->load->library('upload',$config);
            if(! $this->upload->do_upload('uploadcv'))
            {
            	$error=array('error'=>$this->upload->display_errors());
            	$images=$this->input->post('uploadcv');

            }
            else
            {
            	$data=array('images'=>$this->upload->data());
            	$images=$data['images']['file_name'];
            }
            
		// echo $id;exit;echo 
		// print_r($images);exit;

	  
      $data1=array(
                  'cv'=>$images

                   );
	
	 $a=$this->Usermodel->jobapplyupdate($i,$data1);
      if ($a)
      {
    	echo"<script>alert('Updated successfully')</script>";
    	redirect('Usercontroller/userjobapplydetailsview','refresh');
      }
      else
      {
    	echo"<script>alert('Unsuccess Job apply ')</script>";
    	redirect('Usercontroller/userjobapplydetailsview','refresh');
      }
   }
   public function deletejobapplydetails()
	{
		$d=$this->uri->segment(3);
		$de=$this->Usermodel->deletejobapplydetails($d);
	 if($de)
	 {
		echo"<script>alert('Delete successful')</script>";
		redirect('Usercontroller/userjobapplydetailsview','refresh');
	 }
	 else
	 {
		echo"<script>alert('Deletion unsuccess')</script>";
		redirect('Usercontroller/userjobapplydetailsview','refresh');
	 }
	}




		
}
