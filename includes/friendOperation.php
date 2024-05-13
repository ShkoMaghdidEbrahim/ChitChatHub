<?php
include "config.php";
if (isset($_POST['friendID'])) {
    $friendID = secure($_POST['friendID']);
    $one = 1;
    $zero = 0;

    if (!empty($friendID)) {

        // add friend
        if (isset($_POST['addFriend'])) {
            $addFriend = secure($_POST['addFriend']);
            if ($addFriend == 'true') {
                $check = $db->prepare("SELECT * FROM `sendrequest` WHERE ( `requestID` = ? AND `responseID` = ? ) OR ( `responseID` = ? AND `requestID` = ? )");
                $check->bind_param("iiii", $userID, $friendID, $userID, $friendID);
                $check->execute();
                $result = $check->get_result();
                if ($result->num_rows === 0) {
                    $sendRequest = $db->prepare("INSERT INTO `sendrequest`(`requestID`,`responseID`,`isAccept`) VALUE(?,?,?)");
                    $sendRequest->bind_param("iii", $userID, $friendID, $zero);
                    if ($sendRequest->execute()) {
                        exit("Request was successfully sent !");
                    }
                }
            }
        }

        // remove friend
        if (isset($_POST['removeFriend'])) {
            $removeFriend = secure($_POST['removeFriend']);
            if ($removeFriend == 'true') {
                $check = $db->prepare("SELECT * FROM `sendrequest` WHERE ( `requestID` = ?  AND `responseID` = ?  AND `isAccept` = ?) OR ( `responseID` = ?  AND `requestID` = ? AND `isAccept` = ?)");
                $check->bind_param("iiiiii", $userID, $friendID, $one, $userID, $friendID, $one);
                $check->execute();
                $result = $check->get_result();
                if ($result->num_rows === 1) {
                    $remove = $db->prepare("DELETE FROM `sendrequest` WHERE ( `requestID` = ? AND `responseID` = ? AND `isAccept` = ?) OR ( `responseID` = ? AND `requestID` = ? AND `isAccept` = ?)");
                    $remove->bind_param("iiiiii", $userID, $friendID, $one, $userID, $friendID, $one);
                    if ($remove->execute()) {
                        exit("friend removed !");
                    }
                }
            }
        }

        // accept friend
        if (isset($_POST['acceptFriend'])) {
            $acceptFriend = secure($_POST['acceptFriend']);
            if ($acceptFriend == 'true') {
                $check = $db->prepare("SELECT * FROM `sendrequest` WHERE ( `requestID` = ? AND `responseID` = ? AND `isAccept` = ? ) OR ( `responseID` = ? AND `requestID` = ? AND `isAccept` = ? )");
                $check->bind_param("iiiiii", $userID, $friendID, $zero, $userID, $friendID, $zero);
                $check->execute();
                $result = $check->get_result();
                if ($result->num_rows === 1) {
                    $accept = $db->prepare("UPDATE `sendrequest` SET `isAccept` = ? WHERE ( `requestID` = ? AND `responseID` = ? AND `isAccept` = ? ) OR ( `responseID` = ? AND `requestID` = ? AND `isAccept` = ? )");
                    $accept->bind_param("iiiiiii", $one, $userID, $friendID, $zero, $userID, $friendID, $zero);
                    if ($accept->execute()) {
                        global $userID;
                        $content = '! سڵاو، ئێستا ئێمە هاوڕێین';
                        $friendID = secure($_POST['friendID']);
                        $query = mysqli_query($db, "INSERT INTO `message`(`sendID`,`receiveID`,`messageContent`) VALUES('$userID','$friendID','$content')");
                        if ($query) {
                            exit("Accepted friend request !");
                        }
                    }
                }
            }
        }

        // decline friend
        if (isset($_POST['declineFriend'])) {
            $declineFriend = secure($_POST['declineFriend']);
            if ($declineFriend == 'true') {
                $check = $db->prepare("SELECT * FROM `sendrequest` WHERE ( `requestID` = ?  AND `responseID` = ?  AND `isAccept` = ?) OR ( `responseID` = ?  AND `requestID` = ? AND `isAccept` = ?)");
                $check->bind_param("iiiiii", $userID, $friendID, $zero, $userID, $friendID, $zero);
                $check->execute();
                $result = $check->get_result();
                if ($result->num_rows === 1) {
                    $decline = $db->prepare("DELETE FROM `sendrequest` WHERE ( `requestID` = ? AND `responseID` = ? AND `isAccept` = ?) OR ( `responseID` = ? AND `requestID` = ? AND `isAccept` = ?)");
                    $decline->bind_param("iiiiii", $userID, $friendID, $zero, $userID, $friendID, $zero);
                    if ($decline->execute()) {
                        exit("Rejected friend request !");
                    }
                }
            }
        }

        // cancel request
        if (isset($_POST['cancelRequest'])) {
            $cancelRequest = secure($_POST['cancelRequest']);
            if ($cancelRequest == 'true') {
                $check = $db->prepare("SELECT * FROM `sendrequest` WHERE ( `requestID` = ?  AND `responseID` = ?  AND `isAccept` = ?) OR ( `responseID` = ?  AND `requestID` = ? AND `isAccept` = ?)");
                $check->bind_param("iiiiii", $userID, $friendID, $zero, $userID, $friendID, $zero);
                $check->execute();
                $result = $check->get_result();
                if ($result->num_rows === 1) {
                    $cancel = $db->prepare("DELETE FROM `sendrequest` WHERE ( `requestID` = ? AND `responseID` = ? AND `isAccept` = ?) OR ( `responseID` = ? AND `requestID` = ? AND `isAccept` = ?)");
                    $cancel->bind_param("iiiiii", $userID, $friendID, $zero, $userID, $friendID, $zero);
                    if ($cancel->execute()) {
                        exit("friend request cancelled !");
                    }
                }
            }
        }
    }
}

?>