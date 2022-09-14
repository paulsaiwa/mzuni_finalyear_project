<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/4/w3.css">
<body>

<div class="w3-container">
  <h2>Modal</h2>
  <p>The w3-modal class creates a dialog box/popup window that is displayed on top of the current page.</p>
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-red">Open Modal</button>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h2 class="w3-teal">Header</h2>
      </header>
      <div class="w3-container">
         <select ><?php
         include 'connection.php';
            $sel=mysql_query("SELECT *FROM user ");
            while($fetch=mysql_fetch_array($sel)){
                   echo '<option value="'.$fetch['user_id'].'">'.$fetch['username'].' '.$fetch['name'].'  '.$fetch['role'].'  '.$fetch['user_id'].'</option>';
         
      }
            ?>
            </select>
        <input type="text" name="fa">
        <input type="submit">
      </div>
      <footer class="w3-container w3-teal">
        <p class="w3-teal">Footer</p>
      </footer>
    </div>
  </div>
</div>
          
</body>

<!-- Mirrored from www.w3schools.com/w3css/tryit.asp?filename=tryw3css_ref_modal by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Jul 2018 05:44:53 GMT -->
</html>
