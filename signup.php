
<div class="container mt-5">
<div class="col-lg-5 text-center m-auto d-none bg-dark p-5 rounded-5 signup" id="showSignin">
<img src="assets/images/signal.png" width="100" alt="your browser is not support this image">
<div class="form-control border-danger bg-dark text-light radius-5 mt-3 d-none error "></div>
<input type="text" class="form-control border-dark bg-light text-dark radius-5 mt-3 usernameUp" name="usernameUp" id="usernameUp" placeholder="USERNAME">
<input type="email" class="form-control border-dark bg-light text-dark radius-5 mt-3" name="email" id="email" placeholder="EMAIL">
<input type="password" class="form-control border-dark bg-light text-dark radius-5 mt-3"  name="password" id="passwordUp" placeholder="PASSWORD">
<input type="number" class="form-control border-dark bg-light text-dark radius-5 mt-3" name="age" id="age" placeholder="AGE">
<select id="gender" class="form-control border-dark bg-light text-dark radius-5 mt-3">
    <option value="0" disabled selected>GENDER</option>
    <option value="1">MALE</option>
    <option value="2">FEMALE</option>
    <option value="3">OTHERS</option>
</select>
<input type="submit" class="btn btn-dark border-light bg-dark w-100 mt-3 btn-hover-light"  name="signupAction" id="signupAction" value="CREATE ACCOUNT">
<a href="index.php" id="signin" class="btn text-light" style="cursor:pointer">login</a>
</div>
</div>

<?php require_once('includes/footer.php') ?>

