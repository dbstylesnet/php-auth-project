<?php
/**
 * @var $name string
 * @var $pageTitle string
 * @var $description string
 * @var $status string
 * @var $success string
 * @var $denied string
 * @var $error string 
 * @var $username string
 * @var $password string
 */

?>

<!-- <link rel="stylesheet" type="text/css" href="/static/auth/login.form.css"> -->
<? $this->includeCSS('/static/auth/login.wrapper.form.css'); ?>

<div id="main-wrapper"> 

    <?php if(!empty($pageTitle)): ?>
        <h2 class="page-title"><?= $pageTitle ?></h2>
    <?php endif; ?>
    
    <?php if(!empty($name)): ?>
        <div>Hello <?=$name?></div>
    <?php endif; ?>
    
    <?php if(!empty($description)): ?>
        <div><?= $description ?></div>
    <?php endif; ?>

    <?= $this->render('/auth/login.form.inc.php', [
        'error' => $error,
        'username' => $username
    ]) ?>

    <?php if(!(empty($username) && empty($password))): ?>
        <div style="margin-top: 20px; padding: 15px; background: rgba(255, 255, 255, 0.05); border-radius: 8px; max-width: 420px; margin-left: auto; margin-right: auto;">
            <div style="color: #9ca3af; font-size: 14px;">Provided Username: <span style="color: #ffffff;"><?=$username?></span></div>
            <div style="color: #9ca3af; font-size: 14px; margin-top: 5px;">Provided Password: <span style="color: #ffffff;"><?=$password?></span></div>
        </div>
    <?php endif; ?>

</div>
   