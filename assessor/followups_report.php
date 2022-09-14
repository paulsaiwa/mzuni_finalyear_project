<?php error_reporting('E_NOTICE') ?>
<?php 
include('connection.php');

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['username'], $_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
}
else{
    header("location: ../logout.php");
}

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Department Folllows up</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="../css/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/default.css">
    <link rel="stylesheet" type="text/css" href="../css/moodal.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div id="header">
    <h1 style="font-size: 30px; "><img src="../images/health.png" style="width:100px; height: 85px;" />MINISTRY OF HEALTH MALAWI</h1>

</div>
<div class="w3-row w3-grey" style="margin-top: 6px ; font-size: 17px; border-top-color: red; border-top-style: solid; border-bottom-style: solid; border-bottom-color: red;">
<a  href ="assessor.php?action=dashboard"><button class = " w3-btn w3-button fa fa-home w3-hover-silver w3-text-white" style="background-color:; border:none; margin-left: 10%; margin-right: 10%; padding-top: 8px; font-size: 20px;"> Home</button> </a>

<a  href ="../logout.php" class = "w3-btn w3-bar-item w3-red fa fa-sign-out w3-button w3-right" style="height:35px; padding-top: 8px; font-size: 20px;">Logout</a>

        </div>
        <!-- Page wrapper  -->
        <div class="page-wrapper" style="margin-left: -2%;">
            <!-- Bread crumb -->

            <div class="row page-titles">
                <div class="col-md-5 align-self-center" style="width: 100%;">
                    <h3 class="text-primary w3-center" >Department Assessment Details</h3> </div>
               
            </div>

            <?php $user_id=$_SESSION['user_id'];
     
      
      $result=mysqli_query($connection,"select * from user,department where user.user_id='$user_id' AND department.department_id=user.department_id")or die(mysqli_error());
      $date=mysqli_query($connection,"SELECT curdate() as date");
      $row=mysqli_fetch_array($result);
      $d=mysqli_fetch_array($date);
      $Name=$row['department_id'];
      $role=$row['department_name'];
$_SESSION['department_id']=$Name;


?>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title w3-center"><?php echo $role;?></h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                       
                                        <thead>
                                            <tr>
                                                
                                                <th>Standard</th>
                                                <th style="">Recommendation(Assessor)</th>
                                                <th >Management</th>
                                                <th>Follow up Comment</th>
                                                <th>Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               
                                                <th>Standard</th>
                                                <th style="">Recommendation(Assessor)</th>
                                                <th >Management</th>
                                                <th>Follow up Comment</th>
                                                <th>Date</th>
                                                
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                             <?php
                                             include '../connection.php';
                
 $s_query = $conn->query("SELECT * FROM `assessor_followups` ,`standard` where standard.standard_code=assessor_followups.standard_code AND standard.department_id='$Name'") or die(mysqli_error());
                  while($s_fetch = $s_query->fetch_array()){  
                ?>
                <tr>
                  <td><?php echo $s_fetch['standard_code']?></td>
                  <td><?php echo $s_fetch['recommend']?></td>
                  <td><?php echo $s_fetch['plan']?></td>
                  <td><?php echo $s_fetch['follow_comment']?></td>
                  <td><?php echo date("D M Y H:sa",$s_fetch['time_follow'])?></td>
                  
                                                
                  
                </tr>
                <?php
                  }
                ?>
                            </tbody>
                            
                                    </table>
                                </div>
                            </div>
                        </div>
                       </div>
                   </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
           
            <!-- End footer -->
        </div>
<footer class="foote" id="">
                <?php include "../footer.php"?>
            </footer>
        <!-- End Page wrapper  -->
    </div>
     
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/scripts.js"></script>


    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
    <script src="../js/stopusers.js"></script>
</body>

</html>