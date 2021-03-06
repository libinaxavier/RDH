<?php

function desteganize($file22) {
  // Read the file into memory.
  $img = imagecreatefrompng($file22);
 
  // Read the message dimensions.
  $width = imagesx($img);
  $height = imagesy($img);
 
  // Set the message.
  $binaryMessage = '';
 
  // Initialise message buffer.
  $binaryMessageCharacterParts = [];
 
  for ($y = 0; $y < $height; $y++) {
    for ($x = 0; $x < $width; $x++) {
 
      // Extract the colour.
      $rgb = imagecolorat($img, $x, $y);
      $colors = imagecolorsforindex($img, $rgb);
 
      $blue = $colors['blue'];
 
      // Convert the blue to binary.
      $binaryBlue = decbin($blue);
 
      // Extract the least significant bit into out message buffer..
      $binaryMessageCharacterParts[] = $binaryBlue[strlen($binaryBlue) - 1];
 
      if (count($binaryMessageCharacterParts) == 8) {
        // If we have 8 parts to the message buffer we can update the message string.
        $binaryCharacter = implode('', $binaryMessageCharacterParts);
        $binaryMessageCharacterParts = [];
        if ($binaryCharacter == '00000011') {
          // If the 'end of text' character is found then stop looking for the message.
          break 2;
        }
        else {
          // Append the character we found into the message.
          $binaryMessage .= $binaryCharacter;
        }
      }
    }
  }
 
  // Convert the binary message we have found into text.
  $message = '';
  for ($i = 0; $i < strlen($binaryMessage); $i += 8) {
    $character = mb_substr($binaryMessage, $i, 8);
    $message .= chr(bindec($character));
  }
 
  return $message;
}





$secretfile = $myFile;
$message = desteganize($secretfile);




    # the key should be random binary, use scrypt, bcrypt or PBKDF2 to
    # convert a string into a key
    # key is specified using hexadecimal
    $key = pack('H*', $pass);
    # show key size use either 16, 24 or 32 byte keys for AES-128, 192
    # and 256 respectively
  $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);




    $ciphertext_dec = base64_decode($message);
    
    # retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
    
    # retrieves the cipher text (everything except the $iv_size in the front)
    $ciphertext_dec = substr($ciphertext_dec, $iv_size);

    # may remove 00h valued characters from end of plain text
    $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
                                    $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
    


$myFile = "decrypted/uploads/output.PNG";
	$fh = fopen($myFile, 'w') or die("can't open file");
	fwrite($fh, $plaintext_dec );
    fclose($fh);

echo"<h2>OUTPUT FILE</h2><br>";
echo"<br><br><a href='$myFile' target='_blank' >Click to view image</a>";

?>