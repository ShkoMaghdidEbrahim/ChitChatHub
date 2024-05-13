<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'ajax');
if (!$db) {
    echo "database is not connect !";
    exit(mysqli_errno($db));
}

date_default_timezone_set('Asia/Baghdad');


function secure($data)
{
    global $db;
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return mysqli_real_escape_string($db, $data);
}
function BSInput()
{
    echo "form-control border-light bg-dark placeholder-light text-light radius-5";
}

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $username = $_SESSION['username'];
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    unset($userID);
    unset($username);
    header("location: index.php");
}

function in($return)
{
    global $userID;
    if ($return === 1) {
        if (!isset($userID)) {
            header("Location: index.php");
        }
    }
    if ($return === 0) {
        if (isset($userID)) {
            header("Location: profile.php");
        }
    }
}

function displayTime($time){
    if (date('Y-m-d', strtotime($time)) == date('Y-m-d', time())) {
      echo strtoupper(date('h:i A', strtotime($time)));
    }else if (date('Y-m-d', strtotime('+1 day', strtotime($time))) == date('Y-m-d', time())) {
      echo strtoupper("Yesterday ".date('h:i A', strtotime($time)));
    }else if(date('Y-m-d', strtotime('+1 day', strtotime($time))) < date('Y-m-d', time()) && date('Y-m-d', strtotime('+7 day', strtotime($time))) > date('Y-m-d', time())){
      echo strtoupper(date('D', strtotime($time)).' '.date('h:i A', strtotime($time)));
    }else if(date('Y-m-d', strtotime('+7 day', strtotime($time))) < date('Y-m-d', time())){
      echo strtoupper(date('M d', strtotime($time)) .' AT '.date('h:i A', strtotime($time)));
    }else if(date('Y', strtotime('+1 year', strtotime($time))) == date('Y', time())){
      echo strtoupper("Last year ".date('M d', strtotime($time)) .' AT '.date('H:i A', strtotime($time)));
    }else if(date('Y', strtotime('+1 year', strtotime($time))) < date('Y', time())){
      echo strtoupper(date('Y M d', strtotime($time)) .' AT '.date('H:i A', strtotime($time)));
    }
    }

function users($condition, $isAdd) {
    global $db;
    global $userID;
    if (isset($_GET['accept'])) {
        $requestID = secure($_GET['accept']);
        if (!empty($requestID)) {
            $query = mysqli_query($db, "UPDATE `sendrequest` SET `isAccept` = 1 WHERE `requestID` = '$requestID' AND `responseID` = '$userID' ");
            if ($query) {
                header("Location: profile.php");
            }
        }
    }
    $query = mysqli_query($db, "SELECT * FROM `user` $condition");
    if (mysqli_num_rows($query) > 0 ) {
    while ($row = mysqli_fetch_assoc($query)) {
        $userResultID = secure($row['id']);
        $gender = secure($row['gender']);
        if($gender == 1 ){ $g = "man"; } else{ $g = "woman"; }
        echo '<div class=" row '; if ($isAdd === 1) { echo 'sendMessage'; } echo ' bg-dark text-light m-2 p-2 rounded shadow border border-light" userID="'; if ($isAdd === 1) { echo $userResultID; } echo '">
                <img src="assets/images/'. $g .'.png" class="mr-3 col-lg-3 col-sm-3" style="object-fit:cover" width="20" alt="h">
                <h6 class="mt-2 ml-5 text-white col-lg-7 col-sm-9">' . secure($row['username']) . '</h6>';
                if ($isAdd === 0) {
                    $check = mysqli_query($db, "SELECT * FROM `sendrequest` WHERE (`requestID` = '$userResultID' AND `requestID` <> '$userID') OR (`responseID` = '$userResultID' AND `responseID` <> '$userID')");
                    if (mysqli_num_rows($check) == 0) {
                        echo '<span id="send" friend="'.$userResultID.'" class="col-lg-1 mb-1" style="font-size:1.5rem; cursor:pointer">+</span>';
                    }
                }
                if ($isAdd == 2) {
                    echo '<a class="col-lg-1 text-decoration-none" href="?accept='.$userResultID.'"><span friend="'.$userResultID.'" class="mb-1 text-light" style="font-size:1.5rem; cursor:pointer">&#10003;</span></a>';
                }
                
              echo '</div>';
        }
    }else{
        echo "<div class='text-danger text-center'>Not found</div>";
    }
    ?>
    <script>
        $("#send").on('click', function(){
            var friendID = $(this).attr('friend');
            $(this).addClass('d-none');
            $.post('includes/sendRequest.php', { friendID : friendID }, function(response){
                alert(response);
            })
        });
    </script>
    <?php
}
?>