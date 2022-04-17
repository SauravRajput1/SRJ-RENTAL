<?php
$con = mysqli_connect('localhost', 'root', '','srjrental');
if($con->connect_error){
    echo"Failled:".$con->connect_error;
}
?>