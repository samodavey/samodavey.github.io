<?php

if(isset($_POST['submit'])){
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $mailFrom = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
}

$mailTo = "samkdavey@gmail.com";
$headers = "From: ".$mailFrom;
$txt = "You have received an e-mail from ".$fname.".\n\n".$message;
//Need to get around this ^^^
//Also need to add error checking
mail($mailTo, $subject, $txt, $headers);
header("Location: index.php?mailsend");

 ?>
