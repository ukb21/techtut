<?php
require_once("db.php");
$employee_fname = "";
$employee_lname = "";
$employee_username = "";
$employee_password = "";
$employee_type = "";
$err = false;
$employee_id = 0;


  if (isset($_POST["submit"])) {
      if(isset($_POST["employee_fname"])) $employee_fname=$_POST["employee_fname"];
      if(isset($_POST["employee_lname"])) $employee_lname=$_POST["employee_lname"];
      if(isset($_POST["employee_username"])) $employee_username=$_POST["employee_username"];
      if(isset($_POST["employee_password"])) $employee_password=$_POST["employee_password"];
      if(isset($_POST["employee_type"])) $employee_type=$_POST["employee_type"];
      if(!empty($employee_fname) && !empty($employee_lname) && !empty($employee_username)&& !empty($employee_password)&& !empty($employee_type)) {
        header("HTTP/1.1 307 Temprary Redirect");
        header("Location: accountadd.php");
}
      else {
        $err = true;
      }

  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Account registration</title>
  </head>
  <body>
 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
   <h1>Register</h1>
 <table>

   <tr>
     <td>
 <label>First Name</label>
 <input type="text" name="employee_fname" placeholder = "first name" value="<?php echo $employee_fname; ?>">
 <?php
   if ($err && empty($employee_fname)) {
     echo "<label class='errlabel'>Error: Please enter Your First Name.</label>";
   }
 ?>
     </td>
   </tr>
   <tr>
     <td>
 <label>Last Name</label>
 <input type="text" name="employee_lname" placeholder = "last name" value="<?php echo $employee_lname; ?>">
 <?php
   if ($err && empty($employee_lname)) {
     echo "<label class='errlabel'>Error: Please enter Your Last Name.</label>";
   }
 ?>
     </td>
   </tr>

   </tr>
   <tr>
     <td>
 <label>Usename</label>
 <input type="text" name="employee_username" placeholder = "username" value="<?php echo $employee_username; ?>">
 <?php
   if ($err && empty($employee_username)) {
     echo "<label class='errlabel'>Error: Please enter Your employee_username.</label>";
   }
 ?>
     </td>
   </tr>
   <tr>
     <td>
 <label>Password</label>
 <input type="password" name="employee_password" value="<?php echo $employee_password; ?>">
 <?php
   if ($err && empty($employee_password)) {
     echo "<label class='errlabel'>Error: Please enter Your employee_password.</label>";
   }
 ?>
     </td>
   </tr>
   <tr>
     <td>
       <label>Account Type</label>
       <select name="employee_type">
       <option value= "investigator">
       investigator
       </option>
       <option value= "manager">
       Manager
       </option>
       </select>
     </td>
   </tr>
   <tr>
   <td>
   <input class="btn" type="submit" name="submit" value="submit" />
   </td>
   </tr>
  </body>
</html>
