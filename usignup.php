<?php
require_once("db.php");
$employee_fname = "";
$employee_lname = "";
$employee_username = "";
$employee_password = "";
$employee_type = "";
$err = false;
$employee_id = 0;
$dob="";

  if (isset($_POST["submit"])) {
      if(isset($_POST["employee_fname"])) $employee_fname=$_POST["employee_fname"];
      if(isset($_POST["employee_lname"])) $employee_lname=$_POST["employee_lname"];
      if(isset($_POST["employee_username"])) $employee_username=$_POST["employee_username"];
      if(isset($_POST["employee_password"])) $employee_password=$_POST["employee_password"];
      if(isset($_POST["employee_type"])) $employee_type=$_POST["employee_type"];
          if(isset($_POST["dob"])) $dob=$_POST["dob"];

      if(!empty($employee_fname) && !empty($employee_lname) && !empty($employee_username)&& !empty($employee_password)&& !empty($employee_type)&&!empty($dob) ) {


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
    <title>Sign Up Page</title>
    <style media="screen">
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
    background-image: url("mic.jpg");


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
  .white{color: white;}

    </style>
    <script src="jquery-3.1.1.min.js"></script>
    <script>
      $(function(){
        setInterval(updateTime, 1000);



      })

      function updateTime() {
        var d = new Date();
        var hours= d.getHours(),
            minutes=d.getMinutes(),
            seconds=d.getSeconds(),
            ampm = 'AM';

            if(hours>12)
              ampm = 'PM';

        $("#current-time").text(hours + ":" + minutes +":"+seconds+" "+ampm);
      }

    </script>
  </head>
  <body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<p id="current-time" class "white">00:00:00</p>
      <div class = "center">
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
<label>employee_password</label>
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
<label>Date Of birth</label>
<input type="date" name="dob" value="<?php echo $dob; ?>">
<?php
  if ($err && empty($employee_fname)) {
    echo "<label class='errlabel'>Error: Please enter Your Date of Birth.</label>";
  }
?>

</td>
</tr>
  <tr>
  <td>
<label>Account Type</label>
<select name="employee_type">
<option value= "type">
type
</option>


</select>
  </td>
  </tr>
  <tr>
  <td>
  <input class="btn" type="submit" name="submit" value="Register" />
  <a href="uloginpage.php" class="stn"> already have an account?</a>
  </td>
  </tr>

</table>
</div>
  </body>
</html>
