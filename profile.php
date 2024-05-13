<?php include 'includes/nav.php';
in(1); 

?>


<div class="containe w-auto d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="d-flex bg-light  rounded m-5 conBackground">
    <div class="col-4 border-3 border-end border-secondary-emphasis rounded-start friendList">
      <div class="d-flex justify-content-between p-2 bg-dark-subtle rounded-start  ">
        <div class="d-flex align-items-center " role="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          <img
            src="https://cdn-icons-png.flaticon.com/128/64/64572.png"
            alt="your image " class="rounded-circle  object-fit-cover " style="width:50px; height:50px;">
          <h5 class="ms-3"><?php 
          $query = $db->prepare('SELECT `username` FROM `user` WHERE `id` = ? ');
    $query->bind_param('i',$userID);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo $row['username'];
    } 
    ?></h5>
        </div>
        <div class="d-flex justify-content-end align-items-center">
          <div class="ms-3 me-3" role="button" data-bs-toggle="modal" data-bs-target="#requests">
            <img src="https://cdn-icons-png.flaticon.com/128/992/992651.png" alt="requests" class="  object-fit-cover "
              style="width:25px; height:25px;">
          </div>
          <!-- <div class="ms-3 me-3" role="button" data-bs-toggle="modal" data-bs-target="#createGroups">
            <img src="https://cdn-icons-png.flaticon.com/128/681/681494.png" alt="groups" class="  object-fit-cover "
              style="width:25px; height:25px;">
          </div> -->
        </div>
      </div>
      <div class="overflow-y-auto flex-w" style="height: 70vh;">
        <div class="p-2 rounded-start searchContainer">
          <input type="text" name="searchUsers" id="search" class="bg-dark p-2 mt-2 mb-2 w-100 text-light border-0 rounded " placeholder="search usernames">
          <div  class="dataSearch">
              <!-- search result -->
          </div>
        </div>
        <hr>
          <div id="friends" class="friends">
        <!-- friends -->
        </div>
      </div>
    </div>
    <div class=" w-100 messageContainerAll">
      <div class="d-flex justify-content-between rounded-end  p-2 bg-dark-subtle " >
        <div class="d-flex align-items-center d-none message" role="button">
          <img
            src="https://cdn-icons-png.flaticon.com/128/64/64572.png"
            alt="your image " class="rounded-circle  object-fit-cover " style="width:50px; height:50px;">
          <h5 class="ms-3 friendName"><!-- friend name --></h5>
        </div>
        <div class="d-flex justify-content-end align-items-center   " style="height:50px">
          <!-- <div class="ms-3 me-3 d-none message" role="button" data-bs-toggle="modal" data-bs-target="#friendSetting">
            <img src="https://cdn-icons-png.flaticon.com/128/2311/2311524.png" alt="requests"
              class="  object-fit-cover " style="width:25px; height:25px;">
          </div> -->
          <div class="ms-3 me-3 burgerFriendList" role="button" data-bs-toggle="modal">
            <img src="https://cdn-icons-png.flaticon.com/128/5358/5358649.png" alt="friendList" class="  object-fit-cover "
              style="width:35px; height:35px;">
          </div>
        </div>
      </div>
      <div id="messageContainer"  class="overflow-y-auto flex-wrap d-flex justify-content-center w-auto  align-items-center" style="height: 63vh; ">
      <div class="nonSelectedChat bg-dark rounded-5 text-light ps-3 pe-3 pt-1 pb-1">select a chat to start messaging</div> 
      <div class="d-none w-100  message">
        <div class="content">
        <!-- message process -->
        </div>
      </div>
      </div>
      <div class="d-flex justify-content-around mt-1 mb-2 align-items-center " style="min-width:400px">
        <input type="text" id="messageContent" class="border-0 no-focus rounded bg-dark text-light p-2 visually-hidden  messageContent" style="width: 90%; " placeholder="say something" disabled>
        <button id="messageSendBtn" class="btn text-light bg-dark visually-hidden messageSendBtn" disabled>Send</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade " id="requests" tabindex="-1" aria-labelledby="requestsLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="requestsLabel">Requests</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body friend-requests">
        <!-- friendRequests -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade " id="createGroups" tabindex="-1" aria-labelledby="createGroupsLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createGroupsLabel">Create groups</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" name="searchUserForGroup" id="searchUserForGroup"
          class="no-focus border-0 bg-dark-subtle p-2 rounded w-100" placeholder="search username">
        <hr>
        <div class="d-flex justify-content-between mt-1 p-2 bg-body-secondary  ">
          <div class="d-flex align-items-center " role="button">
            <img
              src="https://cdn-icons-png.flaticon.com/128/64/64572.png"
              alt="your image " class="rounded-circle  object-fit-cover " style="width:50px; height:50px;">
            <h5 class="ms-3">Abdulla</h5>
          </div>
          <div class="d-flex justify-content-end align-items-center ">
            <div class="ms-3 me-3 badge text-bg-danger" role="button">
              Remove
            </div>
          </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between mt-1 p-2 bg-body-secondary  ">
          <div class="d-flex align-items-center " role="button">
            <img
              src="https://cdn-icons-png.flaticon.com/128/64/64572.png"
              alt="your image " class="rounded-circle  object-fit-cover " style="width:50px; height:50px;">
            <h5 class="ms-3"><?php 
                      $query = $db->prepare('SELECT `username` FROM `user` WHERE `id` = ? ');
                      $query->bind_param('i',$userID);
                      $query->execute();
                      $result = $query->get_result();
                      if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row['username'];
                      } 
            ?></h5>
          </div>
          <div class="d-flex justify-content-end align-items-center ">
            <div class="ms-3 me-3 badge text-bg-success" role="button">
              Add
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">create group</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade " id="friendSetting" tabindex="-1" aria-labelledby="friendSettingLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="friendSettingLabel">friendSetting</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        lo dwaye
      </div>
    </div>
  </div>
</div>


<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <div class="d-flex justify-content-between p-2">
      <div class="d-flex align-items-center " role="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <img
          src="https://cdn-icons-png.flaticon.com/128/64/64572.png"
          alt="your image " class="rounded-circle  object-fit-cover " style="width:50px; height:50px;">
        <h5 class="offcanvas-title ms-4" id="offcanvasExampleLabel"><?php 
                  $query = $db->prepare('SELECT `username` FROM `user` WHERE `id` = ? ');
                  $query->bind_param('i',$userID);
                  $query->execute();
                  $result = $query->get_result();
                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['username'];
                  } 
        ?></h5>
      </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <div class="form-control border-danger bg-light text-dark radius-5 mt-3 d-none errors"></div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <!-- <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            change photo
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
              <label for="cheangePhoto" class="form-label">Choose your new photo</label>
              <input class="form-control" type="file" id="changePhoto">
              <button type="button" class="btn btn-dark mt-2">submit</button>
          </div>
        </div>
      </div> -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            change username
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
              <label for="changeUsername" class="form-label">Enter your new username</label>
              <input type="text" class="form-control" id="changeUsername">
              <button type="button" class="btn btn-dark mt-2" id="changeUsernameBtn">submit</button>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            change password
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <form action="#" method="POST" enctype="multipart/form-data">

              <label for="oldPassword" class="form-label">Enter your old password</label>
              <input type="password" class="form-control" id="oldPassword">
              <label for="changePassword" class="form-label">Enter your new password</label>
              <input type="password" class="form-control" id="changePassword">
              <label for="confirmChangePassword" class="form-label">Confirm password</label>
              <input type="password" class="form-control" id="confirmChangePassword">
              <button type="button" class="btn btn-dark mt-2" id="changePasswordBtn">submit</button>
            </form>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <a class="nav-link text-danger ms-4 mt-2" aria-current="page" href="?logout">LOGOUT</a>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>