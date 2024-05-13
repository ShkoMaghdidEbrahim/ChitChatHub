 <?php
 require_once('config.php');
        $zero = 0;
        $one = 1;
        $query = $db->prepare('SELECT u.*, MAX(m.dateOfSend) as lastMessageTime, m.messageContent  FROM `user` u JOIN sendrequest sr ON ( sr.requestID = ? OR sr.responseID = ? ) AND ( u.id = sr.responseID OR u.id = sr.requestID ) JOIN `message` m ON ((m.sendID = ? OR m.receiveID = ?) AND (m.sendID = u.id OR m.receiveID = u.id)) WHERE sr.isAccept = ? AND u.id <> ? GROUP BY u.id');
        $query->bind_param('iiiiii', $userID, $userID, $userID, $userID, $one, $userID);
        $query->execute();
        $result = $query->get_result();
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $lastMessageTime = $row['lastMessageTime'];
            $user_result_id = $row['id'];
            $isAdd = 1;
            ?>

            <div
              class="d-flex justify-content-between mt-1 p-2 bg-body-secondary  <?php if ($isAdd === 1) {
                echo 'sendMessage';  } ?>"  userID="<?php if ($isAdd === 1) { echo $user_result_id; } ?> ">
              <div class="d-flex align-items-center " role="button">
                <img
                  src="https://cdn-icons-png.flaticon.com/128/64/64572.png"
                  alt="your image " class="rounded-circle  object-fit-cover " style="width:50px; height:50px;">
                  <h5 class="ms-3">
                  <?php echo $row['username']; ?>
                </h5>
              </div>
              <div class="d-flex justify-content-end align-items-center ">
                <div class="ms-3 me-3 user-select-none friendsDisplayTime" >
                <?php
                displayTime($lastMessageTime);
                ?>
                </div>
              </div>
            </div>
          <?php }
        } ?>

        <script>

function scrollToLastMessage() {
    var chatContainer = $('.content')[0]; 
    var lastMessage = chatContainer.lastElementChild;
    lastMessage.scrollIntoView(); 
}

    $(".sendMessage").on('click', function () {
    $(".message").removeClass('d-none');
    $("#messageContainer").addClass('d-flex');
    $(".nonSelectedChat").addClass('d-none');
    var friendID = $(this).attr('userID');
    $('#messageSendBtn').attr('userID', friendID).removeAttr('disabled').removeClass('visually-hidden');
    $("#messageContent").removeAttr('disabled').removeClass('visually-hidden');

    var windowWidth = $(window).width();
        if (windowWidth <= 900) {
          $(".friendList").css('display','none');
          $(".messageContainerAll").show();
          $('#messageContainer').css('height','85vh');
          $('#message').css('height','85vh');
        }

    $.post('./includes/message.php', { friendID: friendID }, function (response) {
      $('.content').html(response);
      scrollToLastMessage();
    });

    $('.friendName').attr('userID', friendID);
    $.post('./includes/friendName.php', { friendID: friendID }, function (response) {
      $('.friendName').html(response);
    });
  });


  function sendMessage(){
    var content = $('#messageContent').val();
    var friendID = $("#messageSendBtn").attr('userID');
    if (content.trim() !== '') {
          $.post("./includes/sendMessage.php", { content: content, friendID: friendID }, function (response) {
      $.post('./includes/message.php', { friendID: friendID }, function (response) {
        $('.content').html(response);
        scrollToLastMessage();
      });
      $("#messageContent").val('').focus();
      
    });
  }
  }

  
  $("#messageSendBtn").on('click', function () {
    sendMessage();
  });

  $('#messageContent').keypress(function(event){
    if(event.which === 13){ 
        sendMessage();
    }
});

        </script>
