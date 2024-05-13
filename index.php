<?php include 'includes/nav.php';
in(0); ?>

<div class="container mt-5">
    <div class="col-lg-5 text-center bg-dark rounded-5 p-5 m-auto signin" id="showSignup">
        <img src="assets/images/signal.png" width="100" alt="your browser is not support this image">
        <div class="form-control border-danger bg-dark text-light  radius-5 mt-3 d-none error"></div>
        <input type="text" class="form-control border-dark bg-light text-dark radius-5 mt-3" id="username" placeholder="USERNAME">
        <input type="password" class="form-control border-dark bg-light text-dark radius-5 mt-3" id="password" placeholder="PASSWORD">
        <input type="submit" class="btn btn-dark border-light bg-dark w-100 mt-3 btn-hover-light" name="login" id="login" value="LOGIN">
        <span id="signup" class="text-light" role="button">create account</span>
    </div>
</div>




<?php include 'signup.php' ?>