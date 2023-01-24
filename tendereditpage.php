<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Vizhinjam Portal</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="<?php echo base_url();?>admin/./css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="<?php echo base_url();?>admin/./images/logov.jpeg" alt="">
                <img class="logo-compact" src="<?php echo base_url();?>admin/./images/logo-text.png" alt="">
                <!-- <img class="brand-title" src="<?php echo base_url();?>admin/./images/logo-text.png" alt=""> -->
                <li class="nav-label first">VIZHINJAM PORTAL</li>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right"> 
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="<?php echo base_url();?>admin/pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"> 

                         <ul class="list-unstyled"> 
                                            
                        <ul aria-expanded="false">
                        <li><a href="<?php echo base_url();?>Admincontroller/addnotification" class="media dropdown-item"><i class="ti-plus"></i> Add Notification</a></li>
                        <li><a href="<?php echo base_url();?>Admincontroller/adminnotificationview" class="media dropdown-item"><i class="ti-eye"></i> View Notification</span></a></li>
                        </ul>
                        <div class="media-body">
                    </div></li></ul>
                    <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="./email-inbox.html" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="./page-login.html" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">View</span></a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url();?>Admincontroller/tb">User </a></li>
                            <li><a href="<?php echo base_url();?>Admincontroller/companyview">Company </a></li>
                            <li><a href="<?php echo base_url();?>Admincontroller/contractorview">Contractor</a></li>
                        </ul>
                    </li>
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Tender </span></a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url();?>Admincontroller/tenderaddview" class="ti-plus"> Tender Add</a></li>
                            <li><a href="<?php echo base_url();?>Admincontroller/tendertb" class="ti-layout"> Tender Table</a></li>
                            
                        </ul>
                        
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="ti-shopping-cart"></i><span class="nav-text">Products </span></a>
                        <ul aria-expanded="false">
                             <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class=""></i><span class="nav-text">Product Category  </span></a>
                          
                           <ul aria-expanded="false">
                            <li><a href="<?php echo base_url();?>Admincontroller/productcategory"><i
                                class="ti-plus"></i>Product Category Add</a></li>
                            <li><a href="<?php echo base_url();?>Admincontroller/productcategorytable"><i class="ti-layout"></i>Product Category Table</a></li>
                           </ul>
                             </li>
                        
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class=""></i><span class="nav-text">Product Subcategory  </span></a>
                          
                           <ul aria-expanded="false">
                            <li><a href="<?php echo base_url();?>Admincontroller/productsubcategory"><i
                                class="ti-plus"></i>Product Subcategory Add</a></li>
                            <li><a href="<?php echo base_url();?>Admincontroller/productsubcategorytable"><i class="ti-layout"></i>Product Subcategory Table</a></li>
                           </ul>
                            </li>
                            </ul>
                    </li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-bell"></i><span class="nav-text">Notification </span></a>
                        <ul aria-expanded="false">
                        <li><a href="<?php echo base_url();?>Admincontroller/addnotification"><i
                                class="ti-plus"></i>Add Notification</a></li>
                        <li><a href="<?php echo base_url();?>Admincontroller/adminnotificationview"><i class="ti-eye"></i></i><span class="nav-text">View Notification</span></a></li>
                        </ul>
                             </li>
                       <li><a href="<?php echo base_url();?>Logincontroller/logout"><i
                                class="ti-power-off"></i>Logout </a></li>
                        
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body"> 
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Edit Tender</h4>
                            <!-- <span class="ml-1"> EditTender </span> -->
                        </div>
                    </div>
                    
                </div>
                 <!-- row   
                <div class="row">
                    <div class="col-xl-6 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Input Style</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-default " placeholder="input-default">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-rounded" placeholder="input-rounded">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Textarea</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="4" id="comment"></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Input Size</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-group">
                                            <input class="form-control form-control-lg" type="text" placeholder="form-control-lg">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Default input">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-sm" type="text" placeholder="form-control-sm">
                                        </div>
                                    </form>
                                </div>
                            </div>
                         </div> 
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Select Size</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-group">
                                            <select class="form-control form-control-lg">
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                                <option>Option 3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                                <option>Option 3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control form-control-sm">
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                                <option>Option 3</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Select List</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-group">
                                            <label>Select list (select one):</label>
                                            <select class="form-control" id="sel1">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mutiple select list (hold shift to select more than one):</label>
                                            <select multiple class="form-control" id="sel2">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div> -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tender Edit</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="<?php echo base_url();?>Admincontroller/updatetender">
                                    	<?php foreach($data as $row)
	{ ?>
    <input type="hidden" name="id" value="<?php echo $row->tid; ?>">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Tender Type</label>
                                                <select id="inputState" name="tendertype"class="form-control" value="<?php echo $row->tendertype; ?>"required>
                                                    <option selected><?php echo $row->tendertype; ?></option>
                                                    <option>Open Tender</option>
                                                    <option>Closed Tender</option>
                                                    
                                                </select>
                                               
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tender name</label>
                                                <input type="text" name="tendername" class="form-control" placeholder="Tender Name" value="<?php echo $row->tendername; ?>"required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Amount</label>
                                                <input type="text" name="amount" class="form-control" placeholder="Amount" value="<?php echo $row->amount; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Last date for apply</label>
                                                <input type="date" name="lastdateforapply"class="form-control" placeholder="Last date for apply" value="<?php echo $row->lastdateforapply; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Other Details</label>
                                                <input type="text" name="otherdetails" class="form-control" placeholder="Other Details" value="<?php echo $row->otherdetails; ?>" required>
                                                    
                                            </div>
                                            
                                        </div>
                                         
                                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                                        <?php
  } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
        <!--**********************************
            Content body end
        ***********************************


        <!--**********************************
            Footer start
        ***********************************
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo base_url();?>admin/./vendor/global/global.min.js"></script>
    <script src="<?php echo base_url();?>admin/./js/quixnav-init.js"></script>
    <script src="<?php echo base_url();?>admin/./js/custom.min.js"></script>
    
</body>

</html>
