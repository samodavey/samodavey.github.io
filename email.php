<?php
    mail('samkdavey@gmail.com', $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['Subject'], $_POST['message']);
?>
<p>Your email has been sent.</p>
