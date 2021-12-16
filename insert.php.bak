<?php


session_start();
include("../connection.php");


if(isset($_POST['submit']))
{

$pass=$_POST['password'];




$server_path = "uploads/"; //server path to folder
$target_path = $server_path.basename( $_FILES['file']['name']); 
//echo $target_path;
if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
    
    
    
$filename=$target_path;

$infile=$target_path;





     // Open the file and returns a file pointer resource. 
    $handle = fopen($infile, "rb") or die("Could not open a file."); 
     // Returns the read string.
    $contents = fread($handle, filesize($infile));
     // Close the opened file pointer.
    fclose($handle);
	
	
    # the key should be random binary, use scrypt, bcrypt or PBKDF2 to
    # convert a string into a key
    # key is specified using hexadecimal
    $key = pack('H*', $pass);
    # show key size use either 16, 24 or 32 byte keys for AES-128, 192
    # and 256 respectively
    $key_size =  strlen($key);
   // echo "Key size: " . $key_size . "\n";
	
 #--- ENCRYPTION ---	

    # create a random IV to use with CBC encoding
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    
    # creates a cipher text 
    # to keep the text confidential 
    # only suitable for encoded input that never ends with value 00h
    # (because of default zero padding)
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,
                                 $contents, MCRYPT_MODE_CBC, $iv);

    # prepend the IV for it to be available for decryption
    $ciphertext = $iv . $ciphertext;
    
    # encode the resulting cipher text so it can be represented by a string
    $ciphertext_base64 = base64_encode($ciphertext);

    #echo  $ciphertext_base64 . "\n";
	$cipher = "encrypted/$filename";
	$fh = fopen($cipher, 'w') or die("can't open file");
	fwrite($fh, $ciphertext_base64 );
    fclose($fh);
	
	
		include('code2.php');




$ssql="INSERT INTO uploads(user,file_name,password,file_type,file) VALUES ('$_POST[user]','$_POST[file_name]','$_POST[password]','$_POST[file_type]','$filename2')";
//echo "<br><br><br>".$ssql;
$result=mysqli_query($con,$ssql);

if($result)
{
echo"<script>window.location.replace('form.php?a=sucess');</script>";
}
else
{
	echo"<script>window.location.replace('form.php?a=fail');</script>";
}
}
else{
   echo"<script>window.location.replace('form.php?a=fail');</script>";
}


}

else
{
	echo"<script>window.location.replace('form.php?a=fail');</script>";
	
}
 ?>
