
<?php
error_reporting(0);
include("../header_inner.php");

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



$pass2="0123456789ABCDEF";

  // Open the file and returns a file pointer resource. 
    $handle2 = fopen($filename, "rb") or die("Could not open a file."); 
     // Returns the read string.
    $ciphertext_base64 = fread($handle2, filesize($filename));
     // Close the opened file pointer.
    fclose($filename);


    # the key should be random binary, use scrypt, bcrypt or PBKDF2 to
    # convert a string into a key
    # key is specified using hexadecimal
    $key = pack('H*', $pass2);
    # show key size use either 16, 24 or 32 byte keys for AES-128, 192
    # and 256 respectively
  $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);


    $ciphertext_dec = base64_decode($ciphertext_base64);
    
    # retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
    
    # retrieves the cipher text (everything except the $iv_size in the front)
    $ciphertext_dec = substr($ciphertext_dec, $iv_size);

    # may remove 00h valued characters from end of plain text
    $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
                                    $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
    

	$myFile = "dechidden/$filename";
	$fh = fopen($myFile, 'w') or die("can't open file");
	fwrite($fh, $plaintext_dec );
    fclose($fh);
	

include('code3.php');


}
}
?>



