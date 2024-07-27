<?php

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$database = "investments_overview_system";

$connect = mysqli_connect("$hostname","$username","$password","$database");

if($connect == false)
{
    die("". mysqli_connect_error());
}