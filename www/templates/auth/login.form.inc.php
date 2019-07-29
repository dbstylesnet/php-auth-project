<? $this->includeCSS('/static/auth/login.form.css'); ?>

<form class="modal-content animate" action="/login" method='post'>
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
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

</form>

