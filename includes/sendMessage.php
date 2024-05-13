<?php 
include "./config.php";
global $userID;
$content = secure($_POST['content']);
$friendID = secure($_POST['friendID']);
$query = mysqli_query($db, "INSERT INTO `message`(`sendID`,`receiveID`,`messageContent`) VALUES('$userID','$friendID','$content')");
if ($query) {
    exit('success');
}

?>