<?php
session_start();
if(!isset($_SESSION['user']['id'])){
	header('location:index.php');
}