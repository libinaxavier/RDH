
<?php

include("../header_inner.php");
include("table.php");
error_reporting(0);

if($_REQUEST['a']=="error")
{
	echo "<script>alert('Insert Failed!!!!')</script>";
}
if($_REQUEST['a']=="fail")
{
	echo "<script>alert('Insert Failed!!!!')</script>";
}
if($_REQUEST['a']=="sucess" || $_REQUEST['a']==1)
{
	echo "<script>alert('Insert Successfully')</script>";
}

$k=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <style>
  .error
  {
	  color:#F00 !important;
  }
  </style>
</head>
<body>
<!--<style>
div
{
text-transform:capitalize;
margin-bottom:5px;	
}

</style>-->
<?php



echo "<div class='col-sm-12'>";
echo "<h2>$title DECRYPTION</h2>";
echo "<form action='decfile.php' method='post' enctype='multipart/form-data' name='register_form' id='register_form'>";

	  echo "
	  
	  
	  <div class='col-md-6'>
                                            <div class='form-group'><label>
	  
	 AES Security Key</label><input type='text'  name='password'class='form-control' > </div>
                                        </div>";
	
      
    
	  echo "
	  
	  	  
	  <div class='col-md-6'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label>
	  
	  <input type='file' name='file' class='form-control'></div></div>";
  

echo "
<div class='col-md-12'>
                              <div class='col-md-3'>              <div class='form-group'>
											<input type='submit' value='Submit' name='submit' class='form-control btn-success'>";



echo "</form>";



echo "
</div></div>
";







echo "</div>



<div class='clearfix'></div>


";






mysqli_close($con);

include("../footer_inner.php");

?>
   <div id="sample">
 <!-- <script type="text/javascript" src="nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>-->