<?php
require_once('config.php');
        $zero = 0;
        $one = 1;
        $query = $db->prepare('SELECT * FROM `user` u JOIN sendrequest sr ON ( sr.requestID = ? OR sr.responseID = ? ) AND ( u.id = sr.responseID OR u.id = sr.requestID ) WHERE sr.isAccept = ? AND u.id <> ?');
        $query->bind_param('iiii', $friendID, $userID, $zero, $userID);
        $query->execute();
        $result = $query->get_result();
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $isAdd = 0;
            $user_result_id = $row['id'];
            ?>
            <div class="d-flex justify-content-between mt-1 p-2 bg-body-secondary  ">
              <div class="d-flex align-items-center " role="button">
                <img
                  src="https://cdn-icons-png.flaticon.com/128/64/64572.png"
                  alt="your image " class="rounded-circle  object-fit-cover " style="width:50px; height:50px;">
                <div class="d-flex flex-column ">
                  <h5 class="ms-3">
                    <?php echo $row['username'] ?>
                  </h5>
                  <span class="badge ms-2 text-secondary ">  	<?php  $t = $row["sendRequestDate"]; displayTime($t); ?></span>
                </div>
              </div>
              <div class="d-flex justify-content-end align-items-center ">
                <?php
                if ($isAdd === 0) {
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
                } ?>

              </div>
            </div>
          <?php }
        } ?>
<script>
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
</script>
