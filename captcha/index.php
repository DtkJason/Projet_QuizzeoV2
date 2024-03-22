<?php
session_start();
 
if(isset($_POST['captcha'])) {
   if($_POST['captcha'] == $_SESSION['captcha']) {
      echo "Captcha valide !";
   } else {
      echo "Captcha invalide...";
   }
}
 //test
?>
<form method="POST">
   <img src="captcha.php" />
   <br><br>
   <input type="text" name="captcha" />
   <input type="submit" />
</form>