<?php
include_once "../config/database.php";
include_once "./login_checker.php";

?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <title>UHC | Manage Categories</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="./plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
<?php include('includes/topheader.php');?>

            <!-- ========== Left Sidebar Start ========== -->
<?php include('includes/leftsidebar.php');?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Manage Categories</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Category </a>
                                        </li>
                                        <li class="active">
                                           Manage Categories
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


<div class="row">
<div class="col-sm-6">  
 
<?php
// to prevent undefined index notice
$showMessage='';
$action = isset($_GET['action']) ? $_GET['action'] : "";
$rid = isset($_GET['rid']) ? $_GET['rid'] : "";
$resid = isset($_GET['resid']) ? $_GET['resid'] : "";
if($action=='del' && $rid)
{

    $id=intval($_GET['rid']);
    $conn = mysqli_connect("localhost","root","","php_login_system");
	$query=mysqli_query($conn,"update tblcategory set Is_Active='0' where id='$id'");
    $msg="Category deleted ";
    $showMessage = '<div class="alert alert-success" role="alert">
<strong>Well done!</strong>.'.htmlentities($msg).'
</div>';
}
// Code for restore
if($resid)
{
    $id=intval($_GET['resid']);
    $conn = mysqli_connect("localhost","root","","php_login_system");
	$query=mysqli_query($conn,"update tblcategory set Is_Active='1' where id='$id'");
    $msg="Category restored successfully";
    $showMessage = '<div class="alert alert-success" role="alert">
<strong>Well done!</strong>.'.htmlentities($msg).'
</div>';
}

// Code for Forever deletionparmdel
if($action=='parmdel' && $_GET['rid'])
{
    $id=intval($_GET['rid']);
    $conn = mysqli_connect("localhost","root","","php_login_system");
	$query=mysqli_query($conn,"delete from  tblcategory  where id='$id'");
    $delmsg="Category deleted forever";
    $showMessage = '<div class="alert alert-success" role="alert">
<strong>Well done!</strong>.'.htmlentities($delmsg).'
</div>';
}

echo $showMessage;

?>
</div>
                           
                                    <div class="row">
										<div class="col-md-12">
											<div class="demo-box m-t-20">
<div class="m-b-30">
<a href="add-category.php">
<button id="addToTable" class="btn btn-success waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline" ></i></button>
</a>
 </div>

												<div class="table-responsive">
                                                    <table class="table m-0 table-colored-bordered table-bordered-primary">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th> Category</th>
                                                                <th>Description</th>
                                                          
                                                                <th>Posting Date</th>
                                                                  <th>Last updation Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php 
$conn = mysqli_connect("localhost","root","","php_login_system");
$query=mysqli_query($conn,"Select id,CategoryName,Description,PostingDate,UpdationDate from  tblcategory where Is_Active=1");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

 <tr>
<th scope="row"><?php echo htmlentities($cnt);?></th>
<td><?php echo htmlentities($row['CategoryName']);?></td>
<td><?php echo htmlentities($row['Description']);?></td>
<td><?php echo htmlentities($row['PostingDate']);?></td>
<td><?php echo htmlentities($row['UpdationDate']);?></td>
<td><a href="edit-category.php?cid=<?php echo htmlentities($row['id']);?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a> 
	&nbsp;<a href="manage-categories.php?rid=<?php echo htmlentities($row['id']);?>&&action=del"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
</tr>
<?php
$cnt++;
 } ?>
</tbody>
                                                  
                                                    </table>
                                                </div>




											</div>

										</div>

							
									</div>
                                    <!--- end row -->



                                    
<div class="row">
<div class="col-md-12">
<div class="demo-box m-t-20">
<div class="m-b-30">

 <h4><i class="fa fa-trash-o" ></i> Deleted Categories</h4>

 </div>

<div class="table-responsive">
<table class="table m-0 table-colored-bordered table-bordered-danger">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th> Category</th>
                                                                <th>Description</th>
                                                          
                                                                <th>Posting Date</th>
                                                                  <th>Last updation Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php 
$conn = mysqli_connect("localhost","root","","php_login_system");
$query=mysqli_query($conn,"Select id,CategoryName,Description,PostingDate,UpdationDate from  tblcategory where Is_Active=0");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

 <tr>
<th scope="row"><?php echo htmlentities($cnt);?></th>
<td><?php echo htmlentities($row['CategoryName']);?></td>
<td><?php echo htmlentities($row['Description']);?></td>
<td><?php echo htmlentities($row['PostingDate']);?></td>
<td><?php echo htmlentities($row['UpdationDate']);?></td>
<td><a href="manage-categories.php?resid=<?php echo htmlentities($row['id']);?>"><i class="ion-arrow-return-right" title="Restore this category"></i></a> 
	&nbsp;<a href="manage-categories.php?rid=<?php echo htmlentities($row['id']);?>&&action=parmdel" title="Delete forever"> <i class="fa fa-trash-o" style="color: #f05050"></i> </td>
</tr>
<?php
$cnt++;
 } ?>
</tbody>
                                                  
                                                    </table>
                                                </div>



                                                
											</div>

										</div>

							
									</div>                  
                            

                    </div> <!-- container -->

                </div> <!-- content -->
<?php include_once "layout_foot.php";?>
            </div>

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="./plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php  ?>


