<?php


  $employee_fname = "";
  $employee_lname = "";
  $employee_type = "";
  $employee_username="";
  $employee_password="";
  $employee_email="";
   $employee_location="";
   $employee_specialization="";
  $remember="no";
  $error = false;
  $loginOK = null;
  $employee_id =0;
  $newacc="a new account has been created";
  $memberid = 0;
  $dob ="";
  $employee_hiredate = date('Y-m-d');


  if(isset($_POST["Employee_FName"])) $employee_fname=$_POST["Employee_FName"];
  if(isset($_POST["Employee_LName"])) $employee_lname=$_POST["Employee_LName"];
  if(isset($_POST["Employee_UserName"])) $employee_username=$_POST["Employee_UserName"];
  if(isset($_POST["Employee_Password"])) $employee_password=$_POST["Employee_Password"];
  if(isset($_POST["Employee_Type"])) $employee_type=$_POST["Employee_Type"];
  if(isset($_POST["Employee_Email"])) $employee_email=$_POST["Employee_Email"];

  if(isset($_POST["Employee_Location"])) $employee_location=$_POST["Employee_Location"];
  if(isset($_POST["Employee_Specialization"])) $employee_specialization=$_POST["Employee_Specialization"];

  require_once("db.php");
   $sqla = "select max(employee_id)+1 as maxpid from Employee";
   $result = $mydb->query($sqla);
   $row=mysqli_fetch_array($result);
   $employee_id = $row["maxpid"];

  $sql = "INSERT INTO Employee(Employee_FName, Employee_LName, Employee_UserName, Employee_Password, Employee_Type, Employee_ID, Employee_Email, Employee_HireDate, Employee_Location, Employee_Specialization) VALUES ('$employee_fname', '$employee_lname','$employee_username', '$employee_password', '$employee_type', '$employee_id', '$employee_email', '$employee_hiredate', '$employee_location', '$employee_specialization')";
 $result=$mydb->query($sql);
 echo "$newacc";

 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form  action="uloginpage.php" method="post">
      <label>Login Page</label>
      <input class="btn" type="submit" name="submit" value="Login" />
    </form>
  </body>
</html>
