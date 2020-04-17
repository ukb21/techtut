<?php
$Listing_ID = 0;

$Date_Posted = "";
$Listing_url="";
$Consumer_Email="";
$err = false;
$count = 0;
$Submission_ID = 0;
$employee_hiredate = date('Y-m-d');



if (isset($_POST["submit"])) {
   if(isset($_POST["Listing_ID"])) $Listing_ID=$_POST["Listing_ID"];
   $Date_Posted= date('Y-m-d');
   if(isset($_POST["Listing_URL"])) $Listing_url=$_POST["Listing_URL"];
   if(isset($_POST["Consumer_Email"])) $Consumer_Email=$_POST["Consumer_Email"];
    header("HTTP/1.1 307 Temporary Redirect"); //
    header("Location: listingsucess.php");

}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Add listing</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
      <?php
       require_once("db.php");
       $sqla = "SELECT max(Listing_ID)+1 as q
                FROM Listing";
       $result = $mydb->query($sqla);
       $row=mysqli_fetch_array($result);
       $Listing_ID = $row["q"];

       ?>
      <label >Listing_ID: <?php echo $Listing_ID?></label><br />

      <label>Listing URL
      <input type="textarea" name="Listing_URL" placeholder="URL"> </label>
      <br>
      <label id= "date">Listing Date</label><script>
   var d = new Date();
       var e = new String("Hire Date: ")
       document.getElementById("date").innerHTML = e + d;
      </script>
      <br>
      <label>Consumer Email:
      <br>
<input type="text" name="Consumer_Email" value="<?php echo $Consumer_Email?>">
</label>
  <br>
  <input type="submit" name = "submit" value = "Add">
    </form>

  </body>
</html>
