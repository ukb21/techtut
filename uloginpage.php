<?php
$employee_fname="";
$employee_lname="";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- <style media="screen">
        .errlabel {color:red};
        .center {
          margin: auto;
        width: 50%;
        border: 3px solid green;
        padding: 10px;
        display: inline-block;
        background: @blue;
        border: 1px solid darken(@blue, 5%);
        padding: .5em 2em;
        color: white;
        margin-right: .5em;
        box-shadow: inset 0px 1px 0px;
 }



 html, body {
     width: 100%;
     background-color: white;
     margin: auto;
   width: 50%;
   background-image: url("images/cpscvids.jpg") ;

background-position: center;
background-size: cover;

 }

          form {
    display: block;
    width: 100%;
    padding: 2em;


  }
  input {
   display: block;
   margin: auto auto;
   width: 100%;
   margin-bottom: 2em;
   padding: .5em 0;
   border: none;
   border-bottom: 1px solid #eaeaea;
   padding-bottom: 1.25em;
   color: #757575;}
   h1{
color: black;

margin-right: auto;
margin-top: auto;
margin-bottom: auto;

   }
   div {


     background-color: #ddd;
     color:#ddd ;
     padding: 20px;
     margin: auto;
     width: 75%;
   }

   td{
     color: black;

   }
   .btn {
    display: inline-block;
    background-color:white;


    padding: .5em 2em;
    color: blue;
    margin-right: .5em;}
    @grey:#2a2a2a;
@blue:#1fb5bf;
.tiny {font-size: 12px;
color: white;}
#white{color: white;}
    </style> -->

  </head>
  <?php
  $fname = "";
  $lname = "";
  $employee_type = "";
    $employee_username="";
    $employee_password="";
    $remember="no";
    $error = false;
    $loginOK = null;
    $err2 = false;


    if(isset($_POST["submit"])){
      if(isset($_POST["employee_username"])) $employee_username=$_POST["employee_username"];
      if(isset($_POST["employee_password"])) $employee_password=$_POST["employee_password"];
      if(isset($_POST["remember"])) $remember=$_POST["remember"];

      if(empty($employee_username) || empty($employee_password)) {
        $error=true;
      }

      if(!empty($employee_password) && $remember=="yes"){
        setcookie("employee_password", $employee_password, time()+60*60*24*2, "/");
        setcookie("employee_username", $employee_username, time()+60*60*24*2, "/");
        date_default_timezone_set("America/New_York");
        setcookie("last", date("m,d,y,h:i:s"), time()+60*60*24*2, "/");
      }



            if(!$error){
              require_once("db.php");
              $sql = "select employee_id, employee_fname, employee_lname, employee_password, employee_username, employee_type from employee where employee_username='$employee_username'";

              $result = $mydb->query($sql);

              $row=mysqli_fetch_array($result);
              if ($row){
                if(strcmp($employee_password, $row["employee_password"]) ==0 && strcmp($employee_username, $row["employee_username"])==0 ){
                  $loginOK=true;
                  $employee_fname=$row['employee_fname'];
                  $employee_lname=$row['employee_lname'];
                  $employee_id=$row['employee_id'];
                } else {
                  $loginOK = false;
                }
              }

              if($loginOK) {

                session_start();

                $_SESSION["employee_username"] = $employee_username;
                $_SESSION['employee_fname']=$employee_fname;
                $_SESSION['employee_lname']=$employee_lname;
                $_SESSION['employee_id']=$employee_id;

                $employee_type = $row["employee_type"];
                $_SESSION['employee_type']=$employee_type;


                Header("Location:managerd.php");

        }

      }

    }
    if(isset($_POST["update"])){
      if(isset($_POST["employee_username"])) $employee_username=$_POST["employee_username"];
      if(isset($_POST["employee_password"])) $employee_password=$_POST["employee_password"];
      if(isset($_POST["remember"])) $remember=$_POST["remember"];

      if(empty($employee_username) || empty($employee_password)) {
        $error=true;
      }

      if(!empty($employee_password) && $remember=="yes"){
        setcookie("employee_password", $employee_password, time()+60*60*24*2, "/");
        setcookie("employee_username", $employee_username, time()+60*60*24*2, "/");
        date_default_timezone_set("America/New_York");
        setcookie("last", date("m,d,y,h:i:s"), time()+60*60*24*2, "/");
      }



            if(!$error){
              require_once("db.php");
              $sql = "select employee_id, employee_fname, employee_lname, employee_password, employee_username, employee_type from employee where employee_username='$employee_username'";

              $result = $mydb->query($sql);

              $row=mysqli_fetch_array($result);
              if ($row){
                if(strcmp($employee_password, $row["employee_password"]) ==0 && strcmp($employee_username, $row["employee_username"])==0 ){
                  $loginOK=true;
                  $employee_fname=$row['employee_fname'];
                  $employee_lname=$row['employee_lname'];
                  $employee_id=$row['employee_id'];
                } else {
                  $loginOK = false;
                }
              }

              if($loginOK) {

                session_start();

                $_SESSION["employee_username"] = $employee_username;
                $_SESSION['employee_fname']=$employee_fname;
                $_SESSION['employee_lname']=$employee_lname;
                $_SESSION["employee_id"]=$employee_id;


                    Header("Location:uprofileupdate.php");
                }
        }

      }
      if(isset($_POST["delete"])){
        if(isset($_POST["employee_username"])) $employee_username=$_POST["employee_username"];
        if(isset($_POST["employee_password"])) $employee_password=$_POST["employee_password"];
        if(isset($_POST["remember"])) $remember=$_POST["remember"];

        if(empty($employee_username) || empty($employee_password)) {
          $error=true;
        }

        if(!empty($employee_password) && $remember=="yes"){
          setcookie("employee_password", $employee_password, time()+60*60*24*2, "/");
          setcookie("employee_username", $employee_username, time()+60*60*24*2, "/");
          date_default_timezone_set("America/New_York");
          setcookie("last", date("m,d,y,h:i:s"), time()+60*60*24*2, "/");
        }



              if(!$error){
                require_once("db.php");
                $sql = "select employee_id, employee_fname, employee_lname, employee_password, employee_username, employee_type from employee where employee_username='$employee_username'";

                $result = $mydb->query($sql);

                $row=mysqli_fetch_array($result);
                if ($row){
                  if(strcmp($employee_password, $row["employee_password"]) ==0 && strcmp($employee_username, $row["employee_username"])==0 ){
                    $loginOK=true;
                    $employee_fname=$row['employee_fname'];
                    $employee_lname=$row['employee_lname'];
                    $employee_id=$row['employee_id'];
                  } else {
                    $loginOK = false;
                  }
                }

                if($loginOK) {

                  session_start();

                  $_SESSION["employee_username"] = $employee_username;


                      Header("Location:uprofiledeleted.php");
                  }
          }

        }


   ?>
  <body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

<div>


<h1>
   Login
</h1>

      <table class="center">
        <tr>
          <td>employee_username</td>
        </tr>
        <tr>
          <td><input type="text" name="employee_username" value="<?php
            if(!empty($employee_username))
              echo $employee_username;
            else if(isset($_COOKIE['employee_username'])) {
              echo $_COOKIE['employee_username'];
            }
          ?>" /><?php if($error && empty($employee_username)) echo "<span class='errlabel'> please enter a employee_username</span>"; ?></td>
        </tr>
        <tr>
          <td>employee_password</td>
        </tr>
        <tr>
          <td><input type="password" name="employee_password" value="<?php
          if(!empty($employee_password))
            echo $employee_password;
          else if(isset($_COOKIE['employee_password'])) {
            echo $_COOKIE['employee_password'];
          } ?>" /><?php if($error && empty($employee_password)) echo "<span class='errlabel'> please enter a employee_password</span>";
          ?></td>
        </tr>
      </table>


      <table>
        <tr>

          <td>
          <label>Remember me</label>
          <input type="checkbox" name="remember" value="yes"/></td>
        </tr>
        <tr>
        <td>
        <p>
          Don't have an account? <a href="usignup.php">Sign Up</a>
        </p>
        </td>
        </tr>
        <tr>
          <td><?php if(!is_null($loginOK) && $loginOK==false) {echo "<span class='errlabel'>employee_username and employee_password do not match.</span>";} ?></td>
        </tr>
        <tr>
          <td><input class="btn" type="submit" name="submit" value="Login" /></td>


        </tr>
        <tr>
        <td><input class="btn" type="submit" name="update" value="Update Profile" /> <input class="btn" type="submit" name="delete" value="Delete Profile" /></td>

        </tr>



      </table>



      </div>

    </form>

</div>

  </body>
</html>
