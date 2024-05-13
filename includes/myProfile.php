<?php require_once('./config.php');
// change username
if (isset($_POST['changeUsername'])) {
    $newUsername = secure($_POST['changeUsername']);

if (empty($newUsername)) { 
    exit('خانەکە پڕبکەوە');
}

if(!preg_match("/^[a-zA-Z]*$/", $newUsername)){
    exit('ناوی بەکارهێنەر گونجاو نییە');
}

$checkUser = mysqli_query($db, "SELECT `username` FROM `user` WHERE `username` = '$newUsername'");
if (mysqli_num_rows($checkUser) > 0) {
    exit('ناوی بەکارهێنەر بوونی هەیە');
}


$stmt = $db->prepare("UPDATE user SET username = ? WHERE id = ?");
$stmt->bind_param("si", $newUsername, $userID);
$stmt->execute(); 
if($stmt) { exit("success"); }
}

// change password
if (isset($_POST['oldPassword']) || isset($_POST['changePassword']) || isset($_POST['confirmChangePassword'])) {
    $oldPassword = secure($_POST['oldPassword']);
    $changePassword = secure($_POST['changePassword']);
    $confirmChangePassword = secure($_POST['confirmChangePassword']);


if (empty($oldPassword) || empty($changePassword) || empty($confirmChangePassword)) { 
    exit('خانەکان پڕبکەوە');
}

$hashedOldPassword = hash('gost', $oldPassword);
$checkOldPassword = mysqli_query($db, "SELECT `password` FROM `user` WHERE `id` = '$userID' AND `password` = '$hashedOldPassword'  ");
if (mysqli_num_rows($checkOldPassword) == 0) {
        exit('وشەی تێپەڕی کۆن هەڵەیە');
}

if (strlen($changePassword) < 4 || strlen($changePassword) > 15) {
    exit('وشەی تێپەڕ نابێت لە ٤ پیت، ژمارە، یان هێما کەمتربێت و لە ١٥ زیاتر بێت');
}

if ($changePassword !== $confirmChangePassword) {
    exit('پێویستە وشەی تێپەڕە نوێیەکە وەک یەک بنووسیت');
}

$hashedChangePassword = hash('gost', $changePassword);
$checkPassword = mysqli_query($db, "SELECT `password` FROM `user` WHERE `id` = '$userID' AND `password` = '$hashedChangePassword' ");
if (mysqli_num_rows($checkPassword) > 0) {
        exit('وشەی تێپەڕی نوێ دابنێ');
}

$password = hash('gost', $changePassword);
$stmt = $db->prepare("UPDATE user SET `password` = ? WHERE id = ?");
$stmt->bind_param("si", $password, $userID);
$stmt->execute(); 
if($stmt) { exit("success"); }
}

 ?> 