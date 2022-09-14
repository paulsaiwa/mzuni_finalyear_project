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

<div class="w3-row w3-light-gray" style="margin-top: -10px ; font-size: 17px; border-top-color: red; border-top-style: solid; border-bottom-style: solid; border-bottom-color: red;">
<a  href ="home.php?action=dash" class = " w3-btn w3-button fa fa-home" style="background-color:; border:none; margin-left: 10%; margin-right: 10%;"> Home</a>

<a  href ="../logout.php" class = "w3-btn w3-bar-item w3-red fa fa-sign-out w3-button w3-right" style="height:35px; padding-top: 8px;">Logout</a>

    </div>
    
    <div class="w3-col " style="margin-top: 6px;">

      
<div class = "alert alert-info w3-center" style="margin-top: 3%;">Standard Code and Description details</div>
    <div id = "s_table" class = "panel panel-default">
          <div  class = " panel-heading"> 
            <table id = "table2" class = "table table-bordered" style="width: 80%;">
              <thead style="background-color: khaki;">
                <tr>
                  <th>Standard Code</th>
                  <th>Description</th>
                  <th>Department</th>
                  <th>Update</th>
                  <th>Delete</th>
                  
                  
                </tr>
              </thead>
              <tbody>
                <?php
                
                  $s_query = $conn->query("SELECT * FROM `standard`  ORDER by standard_code") or die(mysqli_error());
                  while($s_fetch = $s_query->fetch_array()){  
                ?>
                <tr>
                  <td><?php echo $s_fetch['standard_code']?></td>
                  <td><?php echo $s_fetch['description']?></td>
                  <td><?php echo $s_fetch['department_id']?></td>
                  <td><?php echo "<a href='editstandards.php?standard_code=".$s_fetch['standard_code']."' class='w3-button w3-khaki w3-hover-green fa fa-pencil' style='width:100%; border-radius:4px;'>Update</a> ";?></td>
                  <td><?php echo "<a href='deletestandard.php?standard_code=".$s_fetch['standard_code']."' class='w3-button w3-red w3-hover-green fa fa-remove' style='width:100%; border-radius:4px;'>Delete</a>";?> 
                  </td>
              
                  
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>  
        </div>
  </div>


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

</html>
