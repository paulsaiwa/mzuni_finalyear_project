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
  header("location: logout.php");
}

  ?>

<!DOCTYPE html>
<?php
  //require_once 'session.php';
  require_once '../js/connect.php';
?>
<html lang = "eng">
  <head>
    <title>hims</title>
    <meta charset = "UTF-8" />
    <meta name = "viewport" content = "width=device-width, initial-scale=1" />

    <link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">
    <link rel = "stylesheet" type = "text/css" href = "../css/css/bootstrap.css" />
    <link rel = "stylesheet" type = "text/css" href = "../css/css/style.css" />
    <link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css" />
    <link rel = "stylesheet" type = "text/css" href = "../css/css/jquery.dataTables.css" />
    <link rel = "stylesheet" type = "text/css" href = "css/.css" />
  <script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="../vendor/boostrap/css/boostrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/moodal.css">
    <style>

    


    #header h1 {
  margin-top: -12px;
  padding: 5px 20px 0px 0px;
  text-transform: uppercase;
  font-weight: bold;
  text-align:center;
  color:;
}

#header h2 {
  margin: 0 0 0 -80px;
  padding: 0px 0px 0px 95px;
  text-transform: uppercase;
  font-weight: bold;
  font-size: 13px;
}

/** MENU */

#menu {
  width:% ;
  margin: 0px auto;
  text-align:left;
  overflow-x:hidden;
}
#header.head1 { float:left; 
  padding-bottom:-5px; 
  color:#003399;}
.head2{   font: 24px/34px arial, sans-serif;
color:;
text-align:left;
background: #428bca;
height:70px;
width:
padding-left:20px;
padding-top:20px;
}

#footer {
  clear: both;
  width:248%;
  margin-left:  ;
  height: 34px;
  background: #428bca;
  text-align: ;
}

#footer p {
  margin: 0px;
  padding: 18px 0px 0px 0px;
  font-size: 10px;
  color: ;
  width:131.6%;
  margin-left:20%;
}

#footer a {
  color: ;
}


/* Dropdown Button */
.dropbtn {
  background-color: ;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  height:20px;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: green;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: red;} 
</style>

  </head>
<body>
<!--------------------HEAD---------------------->
<?php //include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php //include 'sidebar.php'?>
<!-------------------SIDEBAR0------------------>
<div id="header">
  <h1 style="font-size: 30px;"><img src="../images/health.png" style="width:100px; height: 100%;" />MINISTRY OF HEALTH MALAWI</h1>

</div>

<div class="w3-row w3-grey" style="margin-top: -10px ; font-size: 17px; border-top-color: red; border-top-style: solid; border-bottom-style: solid; border-bottom-color: red;">
<a  href ="home.php?action=dash" class = " w3-btn w3-button fa fa-home" style="background-color:; border:none; margin-left: 10%; margin-right: 20%; font-size: 20px; color: white;"> Home</a>

<div class="dropdown" style="margin-left:; margin-right:10%;">
  <button  class="w3-btn w3-button fa fa-caret-down" style="font-size: 20px; color: white;"><span >Manage District</span></button>
  <div class="dropdown-content">
       <a href="home.php?action=district" class="w3-btn w3-red w3-block" id="uview" >Register District</a>
        <button class="w3-btn w3-red w3-block" id="plan" >District</button>
   
     
    <a href="#"></a>
  </div>
</div>


<div class="dropdown" style="margin-left:; margin-right:3%;">
  <button  class="w3-btn w3-button fa fa-caret-down" style="font-size: 20px; color: white;"><span >Manage Region</span></button>
  <div class="dropdown-content ">
    <a href="home.php?action=region" class="w3-btn w3-red w3-block" id="uview" >Register Region</a>
       <button class="w3-btn w3-red w3-block" id="uview" >Region</button>
   
    <a href="#"></a>
  </div>
</div> 


<a  href ="../logout.php" class = "w3-red w3-button w3-bar-item fa fa-sign-out w3-right" style="height: 30px; padding-top: 6px; color: white;font-size: 20px;">Logout </a>

    </div>

   
    <div class="w3-col " style="margin-top: 6px;">    
    <div class="w3-col ">

    

  <div class="w3-padding cs" id="Region" style="display: none;">
<div class = "alert alert-info w3-center w3-text-black w3-xlarge" style="width: 100%; margin-left: 1%;">Region(s) details</div>
  <?php
  include "connection.php";
  
    
    $selects=mysqli_query($connection,"SELECT * FROM regions");
     $rowscheck=mysqli_num_rows($selects);
     if($rowscheck < 1){
     echo 'No entry(s)';
     
     }else{
     
      ?>        
    
     <?php
        echo ' <div id = "s_table" class = "panel panel-default w3-center"  style="width:90%; margin-left:5%;">';
      echo '<div  class = " panel-heading"  style="width:%;">'; 
      echo '<table id="table3" id="results"  class="table  table-bordered">';
      echo '<thead style="background-color:; padding-left:20px;" class="w3-center">';
      echo '<tr style=""><th>Region name</th><th>Update</th><th>Delete</></tr>';
       echo '</thead style="width:400%;">';
       echo '<tbody>';
      $flag=0;
      while($fetch=mysqli_fetch_array($selects)){
      if($flag%2==0)
        
      echo '<tr bgcolor=#E5E5E5>';
      
  else 
echo '<tr bgcolor=white>';
echo '<td>'.$fetch['region_name'].'</td>';
echo '<td><a href="edit_region.php?region_id='.$fetch['region_id'].
                        '" class="w3-button w3-center w3-khaki fa fa-pencil w3-xlarge">Update</a> </td>';
echo '<td><a href="del_region.php?region_id='.$fetch['region_id'].
                        '" class="w3-button w3-center w3-xlarge w3-red fa fa-remove">Delete</a> </td></tr>';
       $flag++;
      }
      echo '</tbody>';
      echo '</table>';
      echo '</div></div></div>';
  
      
    }
    
    ?>
  </div>


<div class="w3-padding cs" id="District" style="display: ;">
    
<div class = "alert alert-info w3-center w3-text-black w3-xlarge" style="width: 100%; margin-left: 1%;">District details</div>
  

<div id = "s_table" class = "panel panel-default w3-center" style="width: 90%; margin-left: 4%;">
          <div  class = " panel-heading"> 
               <table id = "table2" class = "table table-bordered w3-large" style="width: 90%;">
              <thead style="background-color: ; text-align: center;">
                <tr>
                  <th>District Name</th>                              
                  <th>Update</th>
                  <th>Delete</th>
                                   
                </tr>
              </thead>
              <tbody>
                <?php
                
                  $s_query = $conn->query("SELECT * FROM `districts`") or die(mysqli_error());
                  while($s_fetch = $s_query->fetch_array()){  
                ?>
                <tr>
                  <td><?php echo $s_fetch['district_name']?></td>
                                   
                  <td> <?php echo '<a href="edit_district.php?district_id='.$s_fetch['district_id'].
                        '" class="w3-button w3-center w3-khaki fa fa-pencil w3-xlarge">Update</a> </td>';?>

                  <td><?php echo '<a href="del_district.php?district_id='.$s_fetch['district_id'].
                         '" class="w3-center w3-xlarge w3-bar-item w3-button fa fa-remove w3-red" >Delete</a> </td>';?>
              
                  
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
    </div>
  </div>
    
  </div>



<div id="footer">
  <?php include"../footer.php";?>
  </div>
<div id="modalC"></div>
</body> 
<script src = "../js/js/jquery-3.1.1.js"></script>
<script src = "../js/js/sidebar.js"></script>
<script src = "../js/js/bootstrap.js"></script>
<script src = "../js/js/jquery.dataTables.min.js"></script>
<script src = "../js/js/script.js"></script>



      <script type="text/javascript">
  $('.w3-block').click(function() {
    var text = $(this).text();
    //changing color of button
    $('.w3-block').removeClass('w3-red').removeClass('w3-light-grey');
    $(this).addClass('w3-red');
    //showing the div
    $('.cs').hide();
    $('#'+text).show();
  })
</script>
  
</body> 
<script src = "../js/js/jquery-3.1.1.js"></script>
<script src = "../js/js/sidebar.js"></script>
<script src = "../js/js/bootstrap.js"></script>
<script src = "../js/js/jquery.dataTables.min.js"></script>
<script src = "../js/js/script.js"></script>


    <script src=""></script>
  <script src="../js/stopusers.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>
<script type = "text/javascript">
  $(document).ready(function(){
    $('#table').DataTable();
    $('#table2').DataTable();
    $('#table3').DataTable();
    $('#table4').DataTable();
    $('#table5').DataTable();
    $('#table21').DataTable();
    $('#table10').DataTable();
  });
</script>



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


<?php
if (isset($_GET['act'])) {
  ?>
  <script type="text/javascript">
    $('#gh').click();
    $('#del').click();
    $('#vadd').click();
    $('#uadd').click();
    $('#uview').click();
    $('#udel').click();
    $('#uedit').click();

  </script>
  <?php
}
?>
<script type="text/javascript">
  function showModal(code) {
    $('#modalC').load("modal.php?code="+code);
  }
</script>

<script>
// Wait for DOM to load
document.addEventListener("DOMContentLoaded", function(event) {

    // Do the automatic refresh
   // window.setTimeout(function(){
      //  document.location.reload(true);
   // }, 3500);    

  // Test the refresh by outputting the time in milliseconds
  document.getElementById("timestamp").innerText = new Date().getTime();  
  
});
</script>
</html>
</script>
  <?php include '../footer1.php';?>
  <div class="w3-modal" id="deModal">
    <div class="w3-modal-content" style="width: 500px;" id="modalContent"></div>
  </div>
</body> 

<script src = "../js/js/jquery-3.1.1.js"></script>
<script src = "../js/js/sidebar.js"></script>
<script src = "../js/js/bootstrap.js"></script>
<script src = "../js/js/jquery.dataTables.min.js"></script>
<script src = "../js/js/script.js"></script>


    <script src=""></script>
  <script src="../js/stopusers.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>
<script type = "text/javascript">
  $(document).ready(function(){
    $('#table').DataTable();
    $('#table2').DataTable();
  });

  function deactivate(id) {
    $.ajax({
      url: "draw.php",
      method: "POST",
      data: {id:id},
      success: function(result) {
        $('#modalContent').html(result);
        $('#deModal').show();
      }
    })
  }

  function see(tab) {
      var tabs = document.getElementById(tab);
      if (tabs.checked == true) {
        var ched = "On";
        $.ajax({
        url: "draw.php",
        method: "POST",
        data: {id:tab, valu:ched},
        success: function(result) {
          $('#tt'+tab).html(result);
        }
      });
      }
      else{
        var ched = "Off";
        $.ajax({
        url: "draw.php",
        method: "POST",
        data: {id:tab, valu:ched},
        success: function(result) {
          $('#tt'+tab).html("Off");
        }
      });
      }
  }
</script>


      <script type="text/javascript">
  $('.w3-block').click(function() {
    var text = $(this).text();
    //changing color of button
    $('.w3-block').removeClass('w3-red').removeClass('w3-light-grey');
    $(this).addClass('w3-red');
    //showing the div
    $('.cs').hide();
    $('#'+text).show();
  })
</script>

</html>
