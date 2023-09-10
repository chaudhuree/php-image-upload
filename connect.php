<?php

$con = new mysqli("localhost", "root", "root", "imageuploadproject");

if(!$con){
    die(mysqli_error($con));
}
