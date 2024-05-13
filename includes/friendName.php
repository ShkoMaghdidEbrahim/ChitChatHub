<?php 
require_once('config.php');
if (isset($_POST['friendID'])) {
    $friendID = secure($_POST['friendID']);
    $query = $db->prepare('SELECT `username` FROM `user` u JOIN `message` m ON (u.id = m.receiveID) WHERE (m.sendID = ? AND m.receiveID = ?) OR (m.sendID = ? AND m.receiveID = ?) ');
    $query->bind_param('iiii',$friendID,$userID,$userID,$friendID);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo $row['username'];
    }
}
?>