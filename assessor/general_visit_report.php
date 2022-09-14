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
<?php
    //require_once 'session.php';
    require_once '../js/connect.php';
?>
<html lang = "eng">
    <head>
        
    <title>General visit details</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="../css/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <link rel="stylesheet" type="text/css" href="../css/moodal.css">
        
        <link rel="stylesheet" type="text/css" href="../fault.css">
        
        <style>
    
</style>

    </head>
<body>
<!--------------------HEAD---------------------->
<?php //include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php //include 'sidebar.php'?>
<!-------------------SIDEBAR0------------------>
<?php require 'assessor_header.php';?>
 <div class="w3-bar w3-grey w3-large w3-hover" style="margin-top: 6px; border-top-style: solid; border-top-color: red; border-bottom-style: solid; border-bottom-color: red;">
  <a href="assessor.php?action=dashboard" class="w3-bar-item w3-button fa fa-home" style="margin-left: 20%; margin-right: ; font-size: 20px; color: white;">Home</a>
 
 <a href="../logout.php" class="w3-bar-item w3-button w3-red w3-right fa fa-sign-out" style="font-size: 20px; color: white;">Logout</a>
</div>


<?php $user_id=$_SESSION['user_id'];
     
      
      $result=mysqli_query($connection,"select * from user, department where user.user_id='$user_id' AND user.department_id=department.department_id")or die(mysqli_error());
      $date=mysqli_query($connection,"SELECT curdate() as date");
      $row=mysqli_fetch_array($result);
      $d=mysqli_fetch_array($date);
      $Name=$row['department_id'];
      $role=$row['role'];
      $depName=$row['department_name'];
$_SESSION['department_id']=$Name;

?>
<div class="page-wrapper" style="margin-left: -4%;">
            <!-- Bread crumb -->

            <div class="row page-titles">
                <div class="col-md-5 align-self-center" style="width: 100%;">
                    <h3 class="text-primary w3-center" >Assessor System Visits details </h3> </div>
               
            </div>
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
                                    <th>Registered Fullname</th>
                                    <th>Department name</th>
                                    <th>System Date & Time</th>
                                    <th>Area Number</th>
                                    <th>System Feedback</th>
                                    
                                    
                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Registered Fullname</th>
                                    <th>Department name</th>
                                    <th>System Date & Time</th>
                                    <th>Area Number</th>
                                    <th>System Feedback</th>
                                    
                                    
                                    
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                
                                    $s_query = $conn->query("SELECT * FROM logs,department,user where logs.user_id='$user_id' AND department.department_id=user.department_id AND logs.user_id=user.user_id")or die(mysqli_error());
                                    while($s_fetch = $s_query->fetch_array()){  
                                ?>
                                <tr>
                                    <td><?php echo $s_fetch['name']?></td>
                                    <td><?php echo $s_fetch['department_name']?></td>
                                    <td><?php echo  date('D d M, Y H:i', $s_fetch['times'])?></td>
                                    <td><?php echo $s_fetch['area']?></td>
                                    <td><?php echo $s_fetch['description']?></td>
                                    
                                    
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>  
                </div>
              
        </div>
   
    <div id="footer" class="">
    <?php include '../footer.php';?>
    </div>
</body> 
<script src = "../js/js/jquery-3.1.1.js"></script>
<script src = "../js/js/sidebar.js"></script>
<script src = "../js/js/bootstrap.js"></script>
<script src = "../js/js/jquery.dataTables.min.js"></script>
<script src = "../js/js/script.js"></script>
<script type = "text/javascript">
    $(document).ready(function(){
        $('#table').DataTable();
    });
</script>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#pic')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200)
                        .css('display', 'block');
                    $('.pic_hide').hide();
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<script type = "text/javascript">
    $(document).ready(function(){
        $('.id').on('click', function(){
            $id = $(this).attr('name');
            $('.delete_student').on('click', function(){
                window.location = 'delete_student.php?id=' + $id;
            });
        });
    });
</script>
</html>
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
    <script src="../js/stopusers.js"></script>


    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>