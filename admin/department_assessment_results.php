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
	header("location:../logout.php");
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
	 <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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

h2,h3,h4 {
	color: ;
	font-size: 24px;
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

<div class="w3-row w3-light-gray" style="margin-top: -10px ; font-size: 17px; border-top-color: red; border-top-style:solid ; border-bottom-style:solid ; border-bottom-color: red;">
<a  href ="home.php?action=dash" class = " w3-btn w3-button fa fa-home" style="background-color:; border:none; margin-left: 10%; margin-right: 10%;"> Home</a>

<a  href ="../logout.php" class = "w3-btn w3-bar-item w3-red fa fa-sign-out w3-button w3-right" style="height:35px; padding-top: 8px;">Logout</a>

		</div>
		
		<div class="w3-col ">

			<div class="w3-container">
				 <h2 class="" style="margin-left: 30%; color: ">Department Standard, Assessement and Planning</h2>
  <div class="w3-container w3-left-align" style="width: ; margin-left: ;">
  	 <?php
  	 $Name='FANC';

  	 ?>

 
<tr><td>
	<button onclick="myFunction('Demo1')" class="w3-btn w3-block w3-light-gray w3-left-align " style="width: 94%;margin-left: 3%; border-top-color:; border-top-style:; border-bottom-style: ; border-bottom-color:; "><h2 class="fa fa-bars" style="font-size: 24px; width:  ">Focus Antenatal Care</h2></button>

<div id="Demo1" class="w3-container w3-hide">
	
  <button onclick="CC1('Demo3')" class="w3-btn w3-block w3- w3-left-align w3-black" style="width:80%; height:30px; margin-left:10%;"><h5 style="color:  " class="w3-text-white w3-center">Assessment Session Details</h5></button>
<div id="Demo3" class="w3-container w3-hide">
	 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title ">Assessment Session Details</h4>
                                <h6 class="card-subtitle ">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40 w3-left">
                                    <table id="example23" class=" w3-table w3-table-all table-bordered" cellspacing="0" width="100%;">
                                        <thead>
                                            <tr>
                                                
												<th>Standard</th>
												<th style="width:50%;"> Criteria</th>
												<th style="width:20%;" >Observation</th>
												<th style="width:50%;">Comment</th>
												<th style="width:20%;">Session Year</th>
												
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               
												<th>Standard</th>
												<th style=""> Criteria</th>
												<th >Observation</th>
												<th>Comment</th>
												<th>Session Year</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>     <?php
                                include"../connection.php";
                                include"../connect.php";
                                   	
									$s_query = $conn->query("SELECT * FROM `assessment_details`,`standard` where  standard.department_id='$Name' AND standard.standard_code=assessment_details.standard_code") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){	
								?>
								<tr>
									
									<td><?php echo $s_fetch['standard_code']?></td>
									
									<td style="width: 120px;"><?php echo $s_fetch['do']?></td>
									<td style="width:;"><?php echo $s_fetch['level_achieved']?></td>
									<td><?php echo $s_fetch['comment']?></td>
									
									<td><?php echo $s_fetch['year']?></td>		
													
									                                    
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

<button onclick="CC('Demo2')" class="w3-btn w3-block w3-light-green w3-left-align" style="width: 80%;margin-left:10%; "><h4 class="w3-center">Manage Plan</h4></button>
<div id="Demo2" class="w3-container w3-hide">
 <div id = "" class = "w3-content" style="margin-top: 2%;">
				
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered" style="">
							<thead class="">
								<tr>
									<th>Standard</th>
									<th style=""> Criteria</th>
									<th >Observation</th>
									<th>Comment</th>									
									<th style="width: 10%;">Action</th>
									
								</tr>
							</thead>
							<tbody id="mainCont">
								<?php
								
									$s_query = $conn->query("SELECT * FROM `assessment_details`,`standard`, `department` where assessment_details.standard_code=standard.standard_code AND department.department_id=standard.department_id AND standard.department_id='$Name' ") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){	
								?>
								<tr>
									
									<td><?php echo $s_fetch['standard_code']?></td>
									<td style="width: 120px;"><?php echo $s_fetch['do']?></td>
									<td style="width:;"><?php echo $s_fetch['level_achieved']?></td>
									<td><?php echo $s_fetch['comment']?></td>
										
													
									
									<td> <?php echo '<a href="plan.php?id='.$s_fetch['id'].
                        '" "><li class="w3-button w3-center w3-khaki fa fa-users">Plan</li></a> </td>';?></td>
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
               </td></tr>

               <tr><td><button onclick="myCancer('D1')" class="w3-button w3-block w3-light-gray w3-left-align w3-border-top" style="width: 94%; margin-left: 3%; font-size: 24px;  border-top-color:; border-top-style:; border-bottom-style: ; border-bottom-color:;"><h2 class="fa fa-bars">Cervical Cancer</h2></button>
<div id="D1" class="w3-hide w3-container">
    <p>Some text..</p>

		    <button onclick="myCancer('Do1')" class="w3-button w3-block w3-light-gray w3-left-align"><h3 style="width: 80%">Standards details</h3></button>
		    <div id="Do1" class="w3-hide w3-container">
		    	Standard
		    </div>


    <button onclick="myCancer('Do2')" class="w3-button w3-block w3-light-gray w3-left-align"><h3 style="width: 80%">Assessment Session Details</h3></button>
    <div id="Do2" class="w3-hide w3-container">
    	Assessment
    </div>


				    <button onclick="myCancer('Do3')" class="w3-button w3-block w3-light-gray w3-left-align"><h3 style="width: 80%">Hospital Assessment Plan Implementation</h3></button>
				    <div id="Do3" class="w3-hide w3-container">
				    	planning
				    </div>
</div>


</td></tr>

<tr><td><button onclick="myCancer('D2')" class="w3-button w3-block w3-light-gray w3-left-align w3-border-top" style="width: 94%; margin-left: 3%; border-top-color:; border-top-style:; border-bottom-style: ; border-bottom-color:;"><h2 class="fa fa-bars" style="font-size: 24px;">Support System</h2></button>
<div id="D2" class="w3-hide w3-container">
    <p>Some other text..</p>

			    <button onclick="myCancer('ss1')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Standard details</h2></button>
				<div id="ss1" class="w3-hide w3-container">
			    	<p>Standard details</p>			    
				</div>


		<button onclick="myCancer('ss2')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Assessment details</h2></button>
		<div id="ss2" class="w3-hide w3-container">
   				 <p>Assement</p>
    
			</div>

							<button onclick="myCancer('ss3')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>planning</h2></button>
							<div id="ss3" class="w3-hide w3-container">
   							 <p>planning</p>   
							</div>
</div>

</td></tr>



<tr><td><button onclick="myCancer('D3')" class="w3-button w3-block w3-light-gray w3-border-top w3-left-align table" style="width: 94%; margin-left: 3%; font-size: 24px;  border-top-color:; border-top-style:0.5px solid black; border-bottom-style: ; border-bottom-color:;"><h2 class="fa fa-bars">Practise Setting Casualty, Surgical and Medical Wards</h2></button>
<div id="D3" class="w3-hide w3-container">
    <p>Some other text..</p>

			    <button onclick="myCancer('p1')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Standard details</h2></button>
				<div id="p1" class="w3-hide w3-container">
			    	<p>Standard details</p>			    
				</div>


		<button onclick="myCancer('p2')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Assessment details</h2></button>
		<div id="p2" class="w3-hide w3-container">
   				 <p>Assement</p>
    
			</div>

							<button onclick="myCancer('p3')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>planning</h2></button>
							<div id="p3" class="w3-hide w3-container">
   							 <p>planning</p>   
							</div>

				</div></td></tr>

				<tr><td>
<button onclick="myCancer('D5')" class="w3-button w3-block w3-light-gray w3-left-align" style="width: 94%; margin-left: 3%; font-size: 24px;  border-top-color:; border-top-style:; border-bottom-style: ; border-bottom-color:;"><h2 class="fa fa-bars">Family Planning Follow Up Visit</h2></button>
<div id="D5" class="w3-hide w3-container">
    <p>Some other text..</p>

			    <button onclick="myCancer('f1')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Standard details</h2></button>
				<div id="f1" class="w3-hide w3-container">
			    	<p>Standard details</p>			    
				</div>


		<button onclick="myCancer('f2')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Assessment details</h2></button>
		<div id="f2" class="w3-hide w3-container">
   				 <p>Assement</p>
    
			</div>

							<button onclick="myCancer('f3')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>planning</h2></button>
							<div id="f3" class="w3-hide w3-container">
   							 <p>planning</p>   
							</div>

				</div></td></tr>

				<tr><td>
<button onclick="myCancer('D6')" class="w3-button w3-block w3-light-gray w3-left-align" style="width: 94%; margin-left: 3%; font-size: 24px;  border-top-color:; border-top-style:; border-bottom-style: ; border-bottom-color:;"><h2 class="fa fa-bars">IEC and Community Participation</h2></button>
<div id="D6" class="w3-hide w3-container">
    <p>Some other text..</p>

			    <button onclick="myCancer('c1')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Standard details</h2></button>
				<div id="c1" class="w3-hide w3-container">
			    	<p>Standard details</p>			    
				</div>


		<button onclick="myCancer('c2')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Assessment details</h2></button>
		<div id="c2" class="w3-hide w3-container">
   				 <p>Assement</p>
    
			</div>

							<button onclick="myCancer('c3')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>planning</h2></button>
							<div id="c3" class="w3-hide w3-container">
   							 <p>planning</p>   
							</div>

				</div></td></tr>

				<tr><td><button onclick="myCancer('D7')" class="w3-button w3-block w3-light-gray w3-left-align" style="width: 94%; margin-left: 3%; font-size: 24px;  border-top-color:; border-top-style:; border-bottom-style: ; border-bottom-color:;"><h2 class="fa fa-bars">Management of Complications during Labour and Delivery</h2></button>
<div id="D7" class="w3-hide w3-container">
    <p>Some other text..</p>

			    <button onclick="myCancer('m1')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Standard details</h2></button>
				<div id="m1" class="w3-hide w3-container">
			    	<p>Standard details</p>			    
				</div>


		<button onclick="myCancer('m2')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Assessment details</h2></button>
		<div id="m2" class="w3-hide w3-container">
   				 <p>Assement</p>
    
			</div>

							<button onclick="myCancer('m3')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>planning</h2></button>
							<div id="m3" class="w3-hide w3-container">
   							 <p>planning</p>   
							</div>

				</div></td></tr>

				<tr><td>

<button onclick="myCancer('D7')" class="w3-button w3-block w3-light-gray w3-left-align" style="width: 94%; margin-left: 3%; font-size: 24px;  border-top-color:; border-top-style:; border-bottom-style: ; border-bottom-color:;"><h2  class="fa fa-bars">STI Syndromic Management Approach</h2></button>
<div id="D7" class="w3-hide w3-container">
    <p>Some other text..</p>

			    <button onclick="myCancer('m1')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Standard details</h2></button>
				<div id="m1" class="w3-hide w3-container">
			    	<p>Standard details</p>			    
				</div>


		<button onclick="myCancer('m2')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Assessment details</h2></button>
		<div id="m2" class="w3-hide w3-container">
   				 <p>Assement</p>
    
			</div>

							<button onclick="myCancer('m3')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>planning</h2></button>
							<div id="m3" class="w3-hide w3-container">
   							 <p>planning</p>   
							</div>

				</div>

</td></tr>

<tr><td>

<button onclick="myCancer('D8')" class="w3-button w3-block w3-light-gray w3-left-align" style="width: 94%; margin-left: 3%; font-size:24px; border-top-color:; border-top-style:; border-bottom-style: ; border-bottom-color:; "><h2 class="fa fa-bars">Normal Labour and Delivery</h2></button>
<div id="D8" class="w3-hide w3-container">
    <p>Some other text..</p>

			    <button onclick="myCancer('n1')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Standard details</h2></button>
				<div id="n1" class="w3-hide w3-container">
			    	<p>Standard details</p>			    
				</div>


		<button onclick="myCancer('n2')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Assessment details</h2></button>
		<div id="n2" class="w3-hide w3-container">
   				 <p>Assement</p>
    
			</div>

							<button onclick="myCancer('n3')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>planning</h2></button>
							<div id="n3" class="w3-hide w3-container">
   							 <p>planning</p>   
							</div>

				</div>
</td></tr>

<tr><td>


<button onclick="myCancer('D9')" class="w3-button w3-block w3-light-gray w3-left-align" style="width: 94%; margin-left: 3%; font-size: 24px;  border-top-color:; border-top-style:; border-bottom-style: ; border-bottom-color:;"><h2 class="fa fa-bars">Post-Abortion Care</h2></button>
<div id="D9" class="w3-hide w3-container">
    <p>Some other text..</p>

			    <button onclick="myCancer('a1')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Standard details</h2></button>
				<div id="a1" class="w3-hide w3-container">
			    	<p>Standard details</p>			    
				</div>


		<button onclick="myCancer('a2')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Assessment details</h2></button>
		<div id="a2" class="w3-hide w3-container">
   				 <p>Assement</p>
    
			</div>

							<button onclick="myCancer('a3')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>planning</h2></button>
							<div id="a3" class="w3-hide w3-container">
   							 <p>planning</p>   
							</div>

				</div></td></tr>


				<tr><td>
<button onclick="myCancer('D8')" class="w3-button w3-block w3-light-gray w3-left-align" style="width: 94%; margin-left: 3%; border-top-color:; border-top-style:; border-bottom-style: ; border-bottom-color:;"><h2>wait</h2></button>
<div id="D8" class="w3-hide w3-container">
    <p>Some other text..</p>

			    <button onclick="myCancer('n1')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Standard details</h2></button>
				<div id="n1" class="w3-hide w3-container">
			    	<p>Standard details</p>			    
				</div>


		<button onclick="myCancer('n2')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>Assessment details</h2></button>
		<div id="n2" class="w3-hide w3-container">
   				 <p>Assement</p>
    
			</div>

							<button onclick="myCancer('n3')" class="w3-button w3-block w3- w3-left-align" style="width: 94%; margin-left: 3%;"><h2>planning</h2></button>
							<div id="n3" class="w3-hide w3-container">
   							 <p>planning</p>   
							</div>

				</div></td></tr>

</table>

            
</div>

</body>	
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


    <script src=""></script>
	<script src="../js/stopusers.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>
<script>

	//focus Antenatal care
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}


function CC1(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

function CC(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>



<script>

	//cancer department
function myCancer(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace("w3-", "w3-red");
    } else { 
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace("w3-red", "w3-");
    }
}
</script>

</html>
