<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Software</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="../common/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<style>
@media (max-width:767px){
	.mhide
	{
	display:none;	
	}
}

</style>
<body>

<div class="wrapper">

<div class="col-md-6 mhide" data-color="blue" style="background:url(../login/back.jpg);height:657px;">

    	
    </div>
    
     <div class="col-md-6" style="height:100%;background:#F5F5F5;">
        <br><h4>REGISTER AS NEW USER</h4>
<?php

//include("data_validation.php");
include("../connection.php");
include('table.php');



$g=0;

$result = mysqli_query($con,"SHOW FIELDS FROM $table");

$i = 0;


echo "<form action='insert1.php' method='post' enctype='multipart/form-data' name='register_form' id='register_form'>";
while ($row = mysqli_fetch_array($result))
 {

  $name=$row['Field'];
  $type=$row['Type'];
  $type = explode("(", $type);
  $type_only=$type[0];
$i++;

$g++;


//echo " <div ><div >";



if($i==1 )
{
	
	//echo "<td>Male <input type='radio' name='$name'> </td>";
	
}
elseif($name=="password" )
  {
	  echo "
	  
	  
	  <div class='col-md-12'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label><input type='password' name='$name'class='form-control' > </div>
                                        </div>";
	
      
    
  }
elseif($name=="status")
{
	$dateT=date("Y-m-d H:i:s");
	echo "<input type='hidden' name='$name' value='0' class='form-control' >";
}

elseif($i==500)
{
	$dateT=date("Y-m-d H:i:s");
	echo "<input type='hidden' name='$name' value='$dateT' class='form-control' >";
}

   elseif($name=="type" )
  {
	  echo "
	  
	  
	  <div class='col-md-12'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label>";
	  
	  
	  
echo "<select name='$name' class='form-control' required>";
    echo "<option value=''>Select One</option>";
     echo "<option value='owner'>Data Owner</option>";
	   echo "<option value='user'>Data User</option>";
	  echo "</select>";
	    
	  echo "</div>
                                        </div>";
	
      
    
  }
  
  
  
  
  
  
  
  
  
  
  
  


else
{

  if($type_only=="varchar" || $type_only=="int" || $type_only=="int" || $type_only=="tinyint" )
  {
	  echo "
	  
	  
	  <div class='col-md-12'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label><input type='text' name='$name'class='form-control' > </div>
                                        </div>";
	
      
    
  }
  
  
   if($type_only=="date" )
  {
	  $date=date("Y-m-d");
$k=0;
/*
  echo "
	  
	  
	  
	  <div class='col-md-4'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label>
	  
	  <input type='text' name='$name'  class='form-control' value='' id='t$k'></div></div>";
	  */
	  ?>
	  
	    <script type="text/javascript">
$(function() {
	$('#t<?php echo $k;?>').datepick();
	
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>
      <?php
	  $k++;
  }
  
  
  if($type_only=="tinytext" )
  {
	  echo "
	  
	  	  
	  <div class='col-md-12'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label>
	  
	  <input type='file' name='$name' class='form-control'></div></div>";
  }
  if($type_only=="text" )
  {
	  echo "<div class='col-md-12'>
                                            <div class='form-group'><label>
											
											 ".str_replace('_', ' ', $name)."</label>
											
											<textarea name='$name' class='form-control'></textarea>
											</div>
											</div>";
  }
  
  
  

}
  


//echo "</div></div><br>";

  
 
 
 
 
 
  
}



echo "
<div class='col-md-12'>
                              <div class='col-md-3'>              <div class='form-group'>
											<input type='submit' value='Submit' name='submit' class='form-control btn-fill btn-primary'>";



echo "</form>";



echo "


</div></div><div class='col-md-3'>   <div class='form-group'>
<a href='../login/login.php' class='btn btn-fill btn-primary'>LOGIN </a>

</div></div>";


echo "</div></div>




";



mysqli_free_result($result);










echo "</div>






";







//include("../footer_inner.php");

?>

    </div>
  


</body>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="../assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="../assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>

	

</html>
