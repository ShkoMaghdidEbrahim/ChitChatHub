<?php
require_once('config.php');
              $check = mysqli_query($db, "SELECT * FROM `sendrequest` WHERE (`requestID` = '$user_result_id' AND `requestID` <> '$userID') OR (`responseID` = '$user_result_id' AND `responseID` <> '$userID')");
              if (mysqli_num_rows($check) == 0) {
                ?>
                <div class="ms-3 me-3 badge text-bg-primary addFriend" friend="<?php echo $user_result_id; ?>"  role="button">
                  Add friend;
                </div>
              <?php }
                $check = mysqli_query($db, "SELECT * FROM `sendrequest` WHERE (`requestID` = '$user_result_id' AND `requestID` <> '$userID' AND `isaccept` = 1) OR (`responseID` = '$user_result_id' AND `responseID` <> '$userID' AND `isaccept` = 1)");
                if (mysqli_num_rows($check) > 0) {
                ?>
                <div class="ms-3 me-3 badge text-bg-danger removeFriend" friend="<?php echo $user_result_id; ?>" role="button">
                  Remove
                </div>
             <?php 
              }
              $check = mysqli_query($db, "SELECT * FROM `sendrequest` WHERE (`requestID` = '$user_result_id' AND `requestID` <> '$userID' AND `isaccept` = 0)");
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
             
              $check = mysqli_query($db, "SELECT * FROM `sendrequest` WHERE (`responseID` = '$user_result_id' AND `responseID` <> '$userID' AND `isaccept` = 0)");
              if (mysqli_num_rows($check) > 0) {
              ?>
              <div class="ms-3 me-3 badge text-bg-danger cancelRequest" friend="<?php echo $user_result_id; ?>"  role="button">
                cancel request
              </div>
           <?php 
        
            } ?>