<?php 
include 'config.php';

$username = secure($_POST['username']);
$password = secure($_POST['password']);

if(empty($username) || empty($password)){
    exit('تکایە خانەکان پڕبکەوە');
}

if (strlen($password) < 4 || strlen($password) > 15) {
    exit('وشەی تێپەڕ گونجاو نییە');
}

if(!preg_match("/^[a-zA-Z]*$/", $username)){
    exit('ناوی بەکارهێنەر گونجاو نییە');
}

$password = hash('gost', $password);
$checkLogin = mysqli_query($db, "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'");
if (mysqli_num_rows($checkLogin) > 0) {
    while($row = mysqli_fetch_assoc($checkLogin)){
        session_regenerate_id(true);
        $_SESSION['userID'] = $row['id'];
        $_SESSION['username'] = $row['username'];
    }
    exit('success');
}else {
    exit('بەکارهێنەر بوونی نییە');
}

?>