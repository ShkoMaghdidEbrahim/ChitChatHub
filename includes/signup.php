<?php 
include 'config.php';
$username = secure($_POST['usernameUp']);
$email = secure($_POST['email']);
$password = secure($_POST['passwordUp']);
$age = secure($_POST['age']);
$gender = secure($_POST['gender']);

if(empty($email)  || empty($age) || empty($gender)){
    exit('تکایە خانەکان پڕبکەوە');
}

if(!preg_match("/^[a-zA-Z]*$/", $username)){
    exit('ناوی بەکارهێنەر گونجاو نییە');
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    exit('ئیمەیڵ گونجاو نییە');
}

if (strlen($password) <= 4 && strlen($password) >= 16) {
    exit('وشەی تێپەڕ نابێت لە ٤ پیت، ژمارە، یان هێما کەمتربێت و لە ١٥ زیاتر بێت');
}

if($age > 150 || $age <= 15 ){
    exit('تەمەنت گونجاو نییە');
}

$checkUser = mysqli_query($db, "SELECT `username` FROM `user` WHERE `username` = '$username'");
if (mysqli_num_rows($checkUser) > 0) {
    exit('ناوی بەکارهێنەر بوونی هەیە');
}

$checkEmail = mysqli_query($db, "SELECT `email` FROM `user` WHERE `email` = '$email'");
if (mysqli_num_rows($checkEmail) > 0) {
    exit('ئەم ئیمەیڵە بەکارهاتووە');
}

$password = hash('gost', $password);
$success = mysqli_query($db, "INSERT INTO `user`(`username`,`email`,`password`,`age`,`gender`) VALUES('$username','$email','$password','$age','$gender')");
if ($success) {
    exit('success');
}
?>