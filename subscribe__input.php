<?php
$con = mysqli_connect('localhost', 'root', '','srjrental');
extract($_POST);
if (!$con)
{
    die("Connection failed!" . mysqli_connect_error());
}
$sql = "INSERT INTO subscribe (id,email) VALUES ('0','$email')";
$rs = mysqli_query($con, $sql);
if($rs)
{
    echo 'thank you';
    echo '<meta http-equiv="refresh" content="0;url=thankyou.html" />';
}
mysqli_close($con);
?>