<?php
    $Recall_ID = 0;
    $Recall_Reason = "";
    $Recall_Date = "";
    $Recall_Summary="";
    $Product_Product_ID="";
    $err = false;
    $count = 0;
    $Product_ID = 0;
    $Product_Manufacturer="";
    $Product_Category="";
    $Product_Name="";




 if (isset($_POST["submit"])) {
    if(isset($_POST["Recall_ID"])) $Recall_ID=$_POST["Recall_ID"];
    if(isset($_POST["Recall_Reason"])) $Recall_Reason=$_POST["Recall_Reason"];
    if(isset($_POST["Recall_Date"])) $Recall_Date=$_POST["Recall_Date"];
    if(isset($_POST["Recall_Summary"])) $Recall_Summary=$_POST["Recall_Summary"];
    if(isset($_POST["Product_Product_ID"])) $Product_Product_ID=$_POST["Product_Product_ID"];
    if(isset($_POST["Product_ID"])) $Product_ID=$_POST["Product_ID"];
    if(isset($_POST["Product_Manufacturer"])) $Product_Manufacturer=$_POST["Product_Manufacturer"];
    if(isset($_POST["Product_Category"])) $Product_Category=$_POST["Product_Category"];
    if(isset($_POST["Product_Name"])) $Product_Name=$_POST["Product_Name"];

    header("HTTP/1.1 307 Temporary Redirect"); //
    header("Location: Recallsuccess.php");

}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Add Recall</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
      <?php
       require_once("db.php");
       $sqla = "SELECT max(Recall_ID)+1 as q
                FROM Recall";
       $result = $mydb->query($sqla);
       $row=mysqli_fetch_array($result);
       $Recall_ID = $row["q"];

       ?>
      <label name>Recall ID: <?php echo $Recall_ID?></label><br />
      <br>
      <label>Choose Product</label>

      <select class="" name="Product_Product_ID">
        <?php

                    $sql = "select Product_ID from Product ";
                    $result = $mydb->query($sql);

                   while ($row = mysqli_fetch_array($result)) {
                     echo"

                     <option value='".$row["Product_ID"]."'>".$row["Product_ID"]."<option>



                    ";
                   }
         ?>

      </select>
      <?php
        if ($err && empty($Product_Product_ID)) {
          echo "<label class='errlabel'>Error: Please enter Your Last Name.</label>";
        }
      ?>

      <br />
      <label>Recall Reason:
      <input type="textarea" name="Recall_Reason" placeholder="Type Reason for Recall"> </label>
      <br>
      <label>Recall Date:
      <input type="date" name="Recall_Date" placeholder="Recall Date" format"yyyy-mm-dd"></label>
      <br>
      <label>Recall Summary:
      <br>
  <textarea name="Recall_Summary" rows="8" cols="80" placeholder=" Recall Summary"></textarea></label>
  <input type="submit" name = "submit" value = "Add">
    </form>

  </body>
</html>
