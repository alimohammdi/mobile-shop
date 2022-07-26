<?php
session_start();
const BASEURL = 'http://localhost/shahrvandmobile/';
const HOSTNAME = 'localhost';
const  DB_NAME = 'dbs_shahrvand';
const USERNAME = 'root';
const PASSWORD = '';

$conn = mysqli_connect(HOSTNAME,USERNAME, PASSWORD) or mysqli_connect_error();
$select_db = mysqli_select_db($conn,DB_NAME) or mysqli_connect_error();


function asset($URL){
    return BASEURL."panel/".$URL;
}

