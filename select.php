<?php

include("table.php");
include("../header_inner.php");

$del_id=0;
$i=0;
?>


		<link rel="stylesheet" type="text/css" href="datatables.min.css">
 
		<script type="text/javascript" src="datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>

<style>
.hiddentd
{
display:inline-block;
    width:180px;
    white-space: nowrap;
    overflow:hidden !important;
   
}
</style>


<div class="">
<?php

	echo "<div class='col-sm-2' style='float:right;margin-bottom:10px;'><form action='form.php' method='post'><input type='submit' name='view' value='Add New' class='form-control btn-danger'></form></div>";
	
?>
<div class="clearfix"></div>
<table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0"  role="grid" aria-describedby="example_info" >

       
        
            
          <?php
	
		  include("../connection.php");
	
	
	
	
	
	
	
	
if(isset($_REQUEST['del_id']))
{
$del_id=$_REQUEST['del_id'];
mysqli_query($con,"delete from $table where id='$del_id'");
//if($del_id!="")
}
	?>
    <script>


function rem()
{
if(confirm('Are you sure you want to delete this record?')){
return true;
}
else
{
return false;
}
}


function rem2()
{
if(confirm('Are you sure you want to deactive this record?')){
return true;
}
else
{
return false;
}
}
</script>
    
	
	<?php


	
	
	

	
	
		  $result2 = mysqli_query($con,"SHOW FIELDS FROM $table");

 echo "<thead><tr>";

while ($row2 = mysqli_fetch_array($result2))
 {

  $name=$row2['Field'];
if($name=="file_type")
{
 
}
else
{
	 echo "<th>".
  str_replace('_', ' ', $name)
  ."</th>";
}
 $i++;
 }
 echo "

 
 <th>Del</th> 
 </tr></thead>";
   
  // $i=0;
   echo "<tbody>";
   
            
            
   if($_SESSION['type']=="owner")
   {
	   $result = mysqli_query($con,"SELECT * FROM $table WHERE file_type='private' and  user='$_SESSION[email]' order by id desc ");
   }
else{
	$result = mysqli_query($con,"SELECT * FROM $table WHERE file_type='private'order by id desc ");
}	
 	
		$j=1;

		while($row = mysqli_fetch_array($result))
		{
		$id=$row['0'];
		echo "<tr>";
	
		for($k=0;$k<$i;$k++)
		{
		
			
			if($k==0)
			{
		

			echo "<td>$j</td>";
				
			}
			
				
			elseif( $k==6)
			{
				
			}
			
			
				elseif($k==3)
			{
			  $filename="hencrypted/".$row['file'];

			echo "<td > <a href='$filename'  download >Click to Download</a></td>";
				
			}
			
			else
			{
			echo "<td >$row[$k]</td>";
			}
		
		
		
		
		
		}
		
		
		
		
			echo "
			
			<td><a href='?del_id=$id' onclick='return rem()'>Del</a></td>
		
			</tr>";
		
		$j++;
		
		}
        
        ?>
        </tbody>
    </table>
			
		



<script type="text/javascript">
	// For demo to fit into DataTables site builder...
	$('#example')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered');
</script>

<div class="clearfix"></div>
	
    </div> 
    <?php
	
//	include("../footer_inner.php");
	?>