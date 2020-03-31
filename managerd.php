<?php

$employee_fname = "";
$employee_lname = "";
$employee_username = "";
$employee_password = "";
$employee_type = "";
    require_once("db.php");
session_start();
$employee_username= $_SESSION["employee_username"];
$sql = "select employee_id, employee_fname, employee_lname, employee_password, employee_username, employee_type from employee where employee_username='$employee_username'";
echo $sql;
$result = $mydb->query($sql);

$row=mysqli_fetch_array($result);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manager Dashboard</title>


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My first Bootstrap 3 demo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>


  <body>
    <!DOCTYPE html>
    <html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      * {box-sizing: border-box;}

      body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background-image: url("images/cpscvids.jpg");
        background-repeat: no-repeat;
        background-size: cover;
      }
      .hide{
        visibility:hidden;
      }
      .show{
        visibility: visible;
      }

      .topnav {
        overflow: hidden;
        background-color: #e9e9e9;
      }

      .topnav a {
        float: left;
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
      }

      .topnav a:hover {
        background-color: #ddd;
        color: black;
      }

      .topnav a.active {
        background-color: #2196F3;
        color: white;
      }






      @media screen and (max-width: 600px) {
        .topnav .search-container {
          float: none;
        }
        .topnav a, .topnav input[type=text], .topnav .search-container button {
          float: none;
          display: block;
          text-align: left;
          width: 100%;
          margin: 0;
          padding: 14px;
        }
        .topnav input[type=text] {
          border: 1px solid #ccc;
        }
      }

      .cName{
        border-radius: 25px;
        border: 2px solid black;
        padding: 20px;
        width: 300px;
        height: 75px;
        position: relative;
        left: 100px;
      }

      .email{
        position:relative;
        float: right;
      }

      .upsm{
        position: relative;
        left: 100px;
        float: none;
        font-size: 0;
      }

      .vul{
        position: relative;
        left: 150px;
      }

      .ms{
        position: relative;
        left: 200px;
      }

      .mc{
        position: relative;
        left: 250px;
      }

      .cool {
      display:inline-block;
      }

    </style>
  </head>
  <body>
    <div class="navbar">
      <div class="topnav">
        <a href="vhome.php">Home</a>
        <a href="vMessages.php">Messages</a>
        <a href="ulogout.php">Logout</a>
      </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <div >
    <form  action="viewp.php" method="post">
      <input
        type="submit"
        value="Recalls"
        style="height:250px; width: 250px;font-size:15pt;color:white;background-color:gray;border:2px solid #336600;padding:3px">
      </input>

      </form>
  </div>


    <?php
        echo '<div class="';
        if(strcmp('manager', $row['employee_type']) ==0)
        {
          echo 'show';
        }
        else
        {
            echo 'hide';
        }
        echo '">';
    ?>
    <form class="cool" action="signup.php" method="post">
      <input
        type="submit"
        value="create account"
        style="height:250px; width: 250px;font-size:15pt;color:white;background-color:gray;border:2px solid #336600;padding:3px">
      </input>
          </form>
  </div>

<br>
<br>

</body>
</html>
