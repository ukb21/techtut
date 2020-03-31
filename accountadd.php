<?php


$employee_fname = "";
$employee_lname = "";
$employee_type = "";
  $employee_username="";
  $employee_password="";
  $remember="no";
  $error = false;
  $loginOK = null;
  $employee_id =0;
  $newacc="a new account has been created";
  $memberid = 0;
  $dob ="";
  if(isset($_POST["employee_fname"])) $employee_fname=$_POST["employee_fname"];
  if(isset($_POST["employee_lname"])) $employee_lname=$_POST["employee_lname"];
  if(isset($_POST["employee_username"])) $employee_username=$_POST["employee_username"];
  if(isset($_POST["employee_password"])) $employee_password=$_POST["employee_password"];
  if(isset($_POST["employee_type"])) $employee_type=$_POST["employee_type"];
    

  require_once("db.php");
   $sqla = "select max(employee_id)+1 as maxpid from employee";
   $result = $mydb->query($sqla);
   $row=mysqli_fetch_array($result);
   $employee_id = $row["maxpid"];

  $sql = "INSERT INTO Employee(Employee_fname, Employee_lname, Employee_username, Employee_password, Employee_type, Employee_id) VALUES ('$employee_fname', '$employee_lname','$employee_username', '$employee_password', '$employee_type', '$employee_id')";
 $result=$mydb->query($sql);
 echo "$newacc";
//     if(strcmp("Commissioner", $employee_type) == 0){
//
//       $sqla = "select max(memberid)+1 as maxpid from dbcommissioner";
//       $result = $mydb->query($sqla);
//       $row=mysqli_fetch_array($result);
//       $memberid = $row["maxpid"];
//
//       $sql = "INSERT INTO dbcommissioner(cardid, memberid, membertype, commissionerfirstname, commissionerlastname, commissionerdob) VALUES ($employee_id, $memberid,'$employee_type',
//       '$employee_fname', '$employee_lname', '$dob')";
// $result=$mydb->query($sql);
// echo "<br >added to commissionerdb";
//   }
//     else if(strcmp("Composer", $employee_type)==0){
//
//
//         $sqla = "select max(memberid)+1 as maxpid from dbcomposer";
//         $result = $mydb->query($sqla);
//         $row=mysqli_fetch_array($result);
//         $memberid = $row["maxpid"];
//
//         $sql = "INSERT INTO dbcomposer(cardid, memberid, membertype, composerfirstname, composerlastname, composerdob) VALUES ($employee_id, $memberid,'$employee_type',
//         '$employee_fname', '$employee_lname', '$dob')";
//     $result=$mydb->query($sql);
//     echo "<br >added to composerdb";
//   }
//     else{
//
//           $sqla = "select max(memberid)+1 as maxpid from dbcomposer";
//           $result = $mydb->query($sqla);
//           $row=mysqli_fetch_array($result);
//           $memberid = $row["maxpid"];
//
//           $sql = "INSERT INTO dbmusician(cardid, memberid, membertype, musicianfirst, musicianlast, musiciandob) VALUES ($employee_id, $memberid,'$employee_type',
//           '$employee_employee_fname', '$employee_lname', '$dob')";
//       $result=$mydb->query($sql);
//       echo "<br >added to musiciandb";
//     }

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
