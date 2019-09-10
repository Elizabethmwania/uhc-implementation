<?php
// show error reporting
error_reporting(E_ALL);

// start php session
session_start();

// set your default time-zone
date_default_timezone_set('Asia/Manila');

// home page url
//TO-DO: on upload to a server remove the /HMIS directory in code
$home_url="http://".$_SERVER['HTTP_HOST']. 

// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 2;

// set number of records per page
$records_per_page = 5;

// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
?>