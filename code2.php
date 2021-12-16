<?php
function steganize($file, $message, $filename1) {
  // Encode the message into a binary string.
  $binaryMessage = '';
  for ($i = 0; $i < mb_strlen($message); ++$i) {
    $character = ord($message[$i]);
    $binaryMessage .= str_pad(decbin($character), 8, '0', STR_PAD_LEFT);
  }
 
  // Inject the 'end of text' character into the string.
  $binaryMessage .= '00000011';
 
  // Load the image into memory.
  $img = imagecreatefromjpeg($file);
 
  // Get image dimensions.
  $width = imagesx($img);
  $height = imagesy($img);
 
  $messagePosition = 0;
 
  for ($y = 0; $y < $height; $y++) {
    for ($x = 0; $x < $width; $x++) {
 
      if (!isset($binaryMessage[$messagePosition])) {
        // No need to keep processing beyond the end of the message.
        break 2;
      }
 
      // Extract the colour.
      $rgb = imagecolorat($img, $x, $y);
      $colors = imagecolorsforindex($img, $rgb);
 
      $red = $colors['red'];
      $green = $colors['green'];
      $blue = $colors['blue'];
      $alpha = $colors['alpha'];
 
      // Convert the blue to binary.
      $binaryBlue = str_pad(decbin($blue), 8, '0', STR_PAD_LEFT);
 
      // Replace the final bit of the blue colour with our message.
      $binaryBlue[strlen($binaryBlue) - 1] = $binaryMessage[$messagePosition];
      $newBlue = bindec($binaryBlue);
 
      // Inject that new colour back into the image.
      $newColor = imagecolorallocatealpha($img, $red, $green, $newBlue, $alpha);
      imagesetpixel($img, $x, $y, $newColor);
 
      // Advance message position.
      $messagePosition++;
    }
  }
 
  // Save the image to a file.
  $newImage = "hidden/$filename1";
  imagepng($img, $newImage, 9);
 
  // Destroy the image handler.
  imagedestroy($img);
}

$randnum = rand(1111111111,9999999999);
$filename1="uploads/".$randnum.".PNG";

$file = 'abcd.jpg';
$message = $ciphertext_base64;
steganize($file, $message,$filename1);


 $infile2 = "hidden/$filename1";
$pass2="0123456789ABCDEF";

  // Open the file and returns a file pointer resource. 
    $handle2 = fopen($infile2, "rb") or die("Could not open a file."); 
     // Returns the read string.
    $contents2 = fread($handle2, filesize($infile2));
     // Close the opened file pointer.
    fclose($handle2);


    # the key should be random binary, use scrypt, bcrypt or PBKDF2 to
    # convert a string into a key
    # key is specified using hexadecimal
    $key = pack('H*', $pass2);
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
                                 $contents2, MCRYPT_MODE_CBC, $iv);

    # prepend the IV for it to be available for decryption
    $ciphertext = $iv . $ciphertext;
    
    # encode the resulting cipher text so it can be represented by a string
    $ciphertext_base64 = base64_encode($ciphertext);

    #echo  $ciphertext_base64 . "\n";
	
	$randnum2 = rand(1111111111,9999999999);
$filename2="uploads/".$randnum2.".PNG";
	
	$cipher = "hencrypted/$filename2";
	$fh = fopen($cipher, 'w') or die("can't open file");
	fwrite($fh, $ciphertext_base64 );
    fclose($fh);
	



?>