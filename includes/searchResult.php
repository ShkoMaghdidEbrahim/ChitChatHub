<?php 
    include "config.php";
    
    in(1);

    $username = secure($_POST['search']);
    $zero = 0;
    $one = 1;
    $query = mysqli_query($db,"SELECT * FROM `user` WHERE (`username` LIKE '%$username%') AND (`id` <> '$userID')");
    if (mysqli_num_rows($query) > 0) {
      while ($row = mysqli_fetch_assoc($query)) {
        $isAdd = 0;
        $user_result_id = $row['id'];
        ?>
        <div class="d-flex justify-content-between mt-1 rounded  p-2 bg-body-secondary  ">
          <div class="d-flex align-items-center " role="button">
            <img
              src="https://cdn-icons-png.flaticon.com/128/64/64572.png"
              alt="your image " class="rounded-circle  object-fit-cover " style="width:50px; height:50px;">
            <div class="d-flex flex-column ">
              <h5 class="ms-3">
                <?php echo $row['username'] ?>
              </h5>
              <span class="badge ms-2 text-dark"><?php 
               $requestDate = mysqli_query($db, "SELECT `sendRequestDate` FROM `sendrequest`WHERE (`responseID` = '$user_result_id' AND `requestID` = '$userID') OR (`requestID` = '$user_result_id' AND `responseID` = '$userID') AND (`isAccept` = 0 OR `isAccept` = 1)");
               if (mysqli_num_rows($requestDate) > 0) {
                $row = mysqli_fetch_assoc($requestDate);
                displayTime($row['sendRequestDate']);
               }
              ?></span>
            </div>
          </div>
          <div class="d-flex justify-content-end align-items-center ">
            <?php
            if ($isAdd === 0) {
              $check = mysqli_query($db, "SELECT * FROM `sendrequest` WHERE (`responseID` = '$user_result_id' AND `requestID` = '$userID') OR (`requestID` = '$user_result_id' AND `responseID` = '$userID')");
              if (mysqli_num_rows($check) === 0) {
                ?>
                <div class="ms-3 me-3 badge text-bg-primary addFriend" friend="<?php echo $user_result_id; ?>"  role="button">
                  Add friend
                </div>
              <?php }
                $check = mysqli_query($db, "SELECT * FROM `sendrequest` WHERE (`requestID` = '$user_result_id' AND `responseID` = '$userID' AND `isaccept` = 1) OR (`responseID` = '$user_result_id' AND `requestID` = '$userID' AND `isaccept` = 1)");
                if (mysqli_num_rows($check) > 0) {
                ?>
                <div class="ms-3 me-3 badge text-bg-danger removeFriend" friend="<?php echo $user_result_id; ?>" role="button">
                  Remove
                </div>
             <?php 
              }
              $check = mysqli_query($db, "SELECT * FROM `sendrequest` WHERE (`requestID` = '$user_result_id' AND `responseID` = '$userID' AND `isaccept` = 0) AND (`responseID` <> '$user_result_id' AND `requestID` <> '$userID')");
              if (mysqli_num_rows($check) > 0) {
              ?>
              <div class="ms-3 me-3 badge text-bg-success acceptFriend" friend="<?php echo $user_result_id; ?>"  role="button">
                Accept
              </div>
              <div class="ms-3 me-3 badge text-bg-danger declineFriend" friend="<?php echo $user_result_id; ?>" role="button">
                Decline
              </div>
           <?php 
            }
              }
              $check = mysqli_query($db, "SELECT * FROM `sendrequest` WHERE (`responseID` = '$user_result_id' AND `requestID` = '$userID' AND `isaccept` = 0) AND (`requestID` <> '$user_result_id' AND `responseID` <> '$userID')");
              if (mysqli_num_rows($check) > 0) {
              ?>
              <div class="ms-3 me-3 badge text-bg-danger cancelRequest" friend="<?php echo $user_result_id; ?>"  role="button">
                cancel request
              </div>
           <?php 
        
            } ?>

          </div>
        </div>
      <?php
       }
    }
    ?>
    
    <script>
      // friend operations
      $('.addFriend').on('click', function() {
        var friendID = $(this).attr('friend');
        var addFriend = true;
        $.post("./includes/friendOperation.php", { friendID: friendID, addFriend: addFriend }, function (response) {
          alert(response);
          location.reload();
        });
      });

      $('.removeFriend').on('click', function() {
        var friendID = $(this).attr('friend');
        var removeFriend = true;
        $.post("./includes/friendOperation.php", { friendID: friendID, removeFriend: removeFriend }, function (response) {
          alert(response);
          location.reload();
        });
      });

      $('.acceptFriend').on('click', function() {
        var friendID = $(this).attr('friend');
        var acceptFriend = true;
        $.post("./includes/friendOperation.php", { friendID: friendID, acceptFriend: acceptFriend }, function (response) {
          alert(response);
          location.reload();
        });
      });

      $('.declineFriend').on('click', function() {
        var friendID = $(this).attr('friend');
        var declineFriend = true;
        $.post("./includes/friendOperation.php", { friendID: friendID, declineFriend: declineFriend }, function (response) {
          alert(response);
          location.reload();
        });
      });

      $('.cancelRequest').on('click', function() {
        var friendID = $(this).attr('friend');
        var cancelRequest = true;
        $.post("./includes/friendOperation.php", { friendID: friendID, cancelRequest: cancelRequest }, function (response) {
          alert(response);
          location.reload();
        });
      });
    </script>


