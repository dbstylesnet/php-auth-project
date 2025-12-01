<? $this->includeCSS('/static/auth/login.form.css'); ?>
<? $this->includeJS('/static/auth/login.wrapper.form.js'); ?>

<div class="buttons-cont">
  <button class="formtab active loginbtn">Log In</button>
  <button class="formtab signinbtn">Sign Up</button>
</div>
<div class="formsCont">
  <form id="loginform" class="modal-content animate login" action="/login" method='post'>
      <h2>Welcome Back</h2>
      <p class="subtitle">Sign in to your account</p>
      
      <div class="imgcontainer">
        <img src="/static/auth/avatar.jpg" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <? if(!empty($error)) { ?>
            <div>
              <?= $error ?>
            </div>
        <?} ?>    
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter your username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter your password" name="password" required>
          
        <button type="submit">Sign In</button>
      </div>

  </form>

  <form id="signinform" class="modal-content animate signin" action="/signin" method='post'>
      <h2>Create Account</h2>
      <p class="subtitle">Sign up to get started</p>
      
      <div class="imgcontainer">
        <img src="/static/auth/avatar.jpg" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <? if(!empty($error)) { ?>
            <div>
              <?= $error ?>
            </div>
        <?} ?>    
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Choose a username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Create a password" name="password" required>
          
        <label for="password_repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Confirm your password" name="password_repeat" required>
          

        <button id="signinbtn" type="submit">Create Account</button>
      </div>

  </form>
</div>
