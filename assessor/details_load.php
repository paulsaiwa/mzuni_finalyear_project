								<?php
								include "../connect.php";
									$s_query = $conn->query("SELECT * FROM `assessment_details`,`standard`, `department` where assessment_details.standard_code=standard.standard_code AND department.department_id=standard.department_id") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $s_fetch['department_name']?></td>
									<td><?php echo $s_fetch['standard_code']?></td>
									<td><?php echo $s_fetch['do']?></td>
									<td><?php echo $s_fetch['level_achieved']?></td>
									<td><?php echo $s_fetch['comment']?></td>
									<td><?php echo $s_fetch['area']?></td>
									<td><?php echo $s_fetch['date']?></td>
									
									<td><center>  <a href="#" class = "btn btn-warning btn-sm it" title="Edit this" data="<?php echo $s_fetch['id'];?>"><i class="fa fa-pencil"></i></a></center></td>
								</tr>
								<?php
									}
								?>