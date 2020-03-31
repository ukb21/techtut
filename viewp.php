
<?php


$Request_Search= "";

?>
 <!DOCTYPE html>
 <html lang="" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>View My Sheet Music</title>

     <!-- bootstrap -->
     <link href="css/bootstrap.min.css" rel="stylesheet" />
     <script src="jquery-3.1.1.min.js"></script>
     <script src="js/bootstrap.min.js"></script>

     <!-- set stylesheet -->
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- nav bar style/jq -->
     <link rel="stylesheet" href="navbarstyles.css">
     <script type="text/javascript" src="navbarscript.js"></script>

   </head>
   <style>
      h1{
        text-shadow: 3px 2px white;
      }
      body {
      background-color: #F0FFFF;
      }
      button{
        background-color: white;
        color: black;
      }
      table.blueTable {
        border: 1px solid ;
        background-color: #FFE4C4;
        width: 80%;
        text-align: center;
        border-collapse: collapse;
        /* hello */

      }
      table.blueTable td, table.blueTable th {
        border: 1px solid;
        padding: 3px 2px;
      }

      .inner{
      background-color: #FFFACD
      }
    </style>
   <body>

     <div class="navbar">
       <div class="topnav">
         <a class="active" href="vhome.php">Home</a>
         <a href="vhome.php#about">About</a>
             <a href="ulogout.php">Logout</a>
         <a style="text-align:right;float:right;" href="ulogout.php">Logout</a>
       </div>
     </div>

    <div align= center>
     <h1></h1>
    </div>

     <div align= center>

     <table class= "blueTable">
         <tr>
         <td><strong>
           Recall_number
         </strong></td>
         <td><strong>
          Company:
         </strong></td>
         <td><strong>
           Recall_Product
         </strong></td>
         <td><strong>
          Recall_Reason
         </strong></td>
         <td><strong>
          Recall_Date
         </strong></td>
         <td><strong>
           Recall_Summary
         </strong></td>

       </tr>
       <tr>
         <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"/>


           <label>Request Search:</label>
           <input name="Request_Search" type="text" value="<?php echo $Request_Search; ?>"/>
           <!-- <select name="soldYN">
             <option value="all" selected></option>
             <option value="sold">sold</option>
             <option value="not sold">not sold</option>
           </select> -->


           <input type="submit" name="Search" value="Search">
           <br />
        </form>

          <?php
          require_once("db.php");

           if(isset($_POST["Request_Search"])) {$Request_Search=$_POST["Request_Search"];}
           else {$Request_Search='';}



            $sql = "select * from recalls where
            recall_number like '%$Request_Search%'
              OR company like '%$Request_Search%'
            OR Recall_Product like '%$Request_Search%'
            OR Recall_Reason like '%$Request_Search%'
            OR Recall_Date like '%$Request_Search%'
            OR Recall_Summary like '%$Request_Search%'";



           $result = $mydb->query($sql);

           while ($row = mysqli_fetch_array($result)) {
             echo"
            <tr>
             <td class='outer'>".$row["Recall_Number"]."</td>
              <td class='inner'>".$row["company"]."</td>
             <td class='inner'>".$row["Recall_Product"]."</td>
             <td class='inner'>".$row["Recall_Reason"]."</td>
             <td class='inner'>".$row["Recall_Date"]."</td>
             <td class='inner'>".$row["Recall_Summary"]."</td>
            </tr>
            ";
           }

            echo "</table>"

             ?>


  </body>
 </html>
