<?php
session_start();
session_destroy();
setcookie('PHPSESSID','',time()-60);
header('Location: index.html');  
 ?>