<?php
session_start();
session_destroy();
die(header('Location:/ngo/homepage/homepage.php'));

 ?>