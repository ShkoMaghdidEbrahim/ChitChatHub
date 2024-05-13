$(document).ready(function(){

    // change forms
    $("#signup").on("click", function(){
        $("#showSignin").removeClass("d-none");
        $("#showSignup").addClass("d-none");
    });


    // Sign up 
    $("#signupAction").on('click', function(e){  

      var usernameUp = $('#usernameUp').val();
      var email = $('#email').val();
      var passwordUp = $('#passwordUp').val();
      var age = $('#age').val();
      var gender = $('#gender option:selected').val();
    
      $.post('includes/signup.php', { usernameUp: usernameUp, email: email, passwordUp: passwordUp, age: age, gender: gender }, function(response){
          if (response === "success") {
              window.location.href = "index.php";
          } else {
              $('.error').removeClass('d-none');
              $('.error').html(response);
    
          }
      });
    });



    // login
    $('#login').on('click', function(){
        var username = $("#username").val();
        var password = $("#password").val();
        
        $.post('includes/login.php', { username : username , password : password }, function(response){
          if (response === "success") {
                window.location.href="index.php";
            }else {
                $('.error').removeClass('d-none');
                $('.error').html(response);
             }  
        });
    });


           // my profile / change username
    $("#changeUsernameBtn").on('click', function(e){  
        var changeUsername = $('#changeUsername').val();   
      
        $.post('includes/myProfile.php', { changeUsername : changeUsername }, function(response){
            if (response === "success") {
                window.location.href = "profile.php";
            } else {
                $('.errors').removeClass('d-none');
                $('.errors').html(response);
      
            }
        });
      });  

      // my profile / change password
      $("#changePasswordBtn").on('click', function(e){  
        var oldPassword = $('#oldPassword').val();   
        var changePassword = $('#changePassword').val();   
        var confirmChangePassword = $('#confirmChangePassword').val();   

      
        $.post('includes/myProfile.php', { oldPassword : oldPassword, changePassword : changePassword, confirmChangePassword : confirmChangePassword }, function(response){
            if (response === "success") {
                window.location.href = "profile.php";
            } else {
                $('.errors').removeClass('d-none');
                $('.errors').html(response);
      
            }
        });
      });

                    //search
    $('#search').on('keydown', function (e) {
        if (e.which == 8 && $('#search').val() == "") {          
            $('.dataSearch').addClass('d-none');
            $('.searchContainer').css('backgroundColor','');
        }
    })


    $('#search').on('keypress', function(){
        var search = $("#search").val();
        $('.dataSearch').removeClass('d-none');
        $.post('includes/searchResult.php', { search : search }, function(response){
          $('.searchContainer').css('backgroundColor','#76ABAE');
          $('.dataSearch').html(response);
        });
      });
  $.post('./includes/friends.php', function(response) {
        $('#friends').html(response); 
    });

    $.post('./includes/friendRequests.php', function(response) {
        $('.friend-requests').html(response); 
    });

    $('.burgerFriendList').on('click', function(){
        var windowWidth = $(window).width();
        if (windowWidth <= 815) {
          $(".friendList").show();
          $(".messageContainerAll").hide();
        }
    });
    // mobile
    
    var windowWidth = $(window).width();
    if (windowWidth <= 900) {
        $(".friendList").show();
        $(".messageContainerAll").hide();
        $('.burgerFriendList').show();
        $('.conBackground').css('min-width','100%').css('width','100%');
    }else{
        $(".messageContainerAll").show(); 
        $('.conBackground').css('min-width','390px').css('width','100%');
    }
    $(window).on('resize', function (){
        var windowWidth = $(window).width();
        if (windowWidth <= 900) {
            $(".friendList").show();
            $(".messageContainerAll").hide();
            $('.burgerFriendList').show();
            $('.conBackground').css('min-width','100%').css('width','100%');
        }else{
            $(".messageContainerAll").show(); 
            $('.conBackground').css('min-width','390px').css('width','100%');
        }
    });
});