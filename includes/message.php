<?php 
include "config.php";
if (isset($_POST['friendID'])) {
  $friendID = secure($_POST['friendID']);
  ?>
  <script>
    var friendID = <?php echo json_encode($friendID); ?>;
    setTimeout(function(){
      $.post('includes/message.php', { friendID : friendID } , function(response){
      $('.content').html(response);
    });
    }, 200);
  </script>
  <?php
  message("m JOIN `user` u ON (u.id = m.sendID) WHERE (m.sendID = $friendID AND m.receiveID = $userID) OR (m.sendID = $userID AND m.receiveID = $friendID) ORDER BY m.dateOfSend ASC");
}
function message($condition){
    global $db;
    global $userID;
    $query = mysqli_query($db, "SELECT * FROM `message` $condition");
    while($row = mysqli_fetch_assoc($query)) {
        $user = secure($row['sendID']);
        ?>
      <?php if ($userID != $user) { ?>
<div  <?php echo "userID = $user"; ?>>
<div class="d-flex align-items-center m-2 user-select-none" style="min-width:390px">
  <img
    src="https://cdn-icons-png.flaticon.com/128/64/64572.png"
    alt="your image " class="rounded-circle  object-fit-cover " style="width:25px; height:25px;">
  <h6 class="ms-1 mt-1 text-black-50 "><?php echo secure($row['username']); ?></h6>
</div>
<div class="bg-secondary-subtle d-inline-block  ps-3 pt-2 rounded-5 ms-4 user-select-none" style="width:auto; max-width:90%;">
  <p class="fw-bold pe-3 pt-2"><?php echo secure($row['messageContent']) ?> 
  <small class="text-secondary opacity-75" style="font-size:10px">
  	<?php  displayTime($row["dateOfSend"]); ?>
  </small>
</p>
</div>
</div>
<?php }else{ ?>

<div class="d-flex justify-content-end user-select-none">
<div class="bg-dark d-inline-block pt-2 ps-3 rounded-5 me-1 mt-2 " style="width:auto; max-width:90%;">
  <p class="fw-bold text-white pe-3 pt-2"><?php echo secure($row['messageContent']); ?>
  <small class="text-secondary opacity-75 " style="font-size:10px">
  	<?php  displayTime($row["dateOfSend"]); ?>
  </small>
</p>
</div>
</div>
</div>
<?php } 
    }
} 
?>


