<?php
session_start();
//echo $_SESSION['name'];
 session_destroy();
 header('location:welcome.php');
  ?>