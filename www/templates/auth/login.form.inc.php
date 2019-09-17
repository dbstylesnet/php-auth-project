<? $this->includeCSS('/static/auth/login.form.css'); ?>
<? $this->includeJS('/static/auth/login.wrapper.form.js'); ?>

<div class="buttons-cont">
  <button class="formtab active loginbtn">Log In Tab</button>
  <button class="formtab signinbtn">Sign In Tab</button>
</div>
<div class="formsCont">
  <form id="loginform" class="modal-content animate login" action="/login" method='post'>
      <div class="imgcontainer">
        <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar">
      </div>
      <div class="container">
        <? if(!empty($error)) { ?>
            <div>
              <?= $error ?>
            </div>
        <?} ?>    
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <button type="submit">Log In</button>
      </div>
  </form>
  <form id="signinform" class="modal-content animate signin" action="/signin" method='post'>
      <div class="imgcontainer">
        <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar">
      </div>
      <div class="container">
        <? if(!empty($error)) { ?>
            <div>
              <?= $error ?>
            </div>
        <?} ?>    
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <label for="password"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" required>
        <button id="signinbtn" type="submit">Sign In</button>
      </div>
  </form>
</div>
