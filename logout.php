<?php
session_start();
session_destroy(); // it destroy session variables
header('location:index.php'); 