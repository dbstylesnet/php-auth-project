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

    <h2 class="page-title"><?= $pageTitle ?></h2>
    <div>Hello <?=$name?></div>
    <div><?= $description ?></div>



    <?= $this->render('/auth/login.form.inc.php', [
        'error' => $error,
        'username' => $username
    ]) ?>


    <?php if(!(empty($username) && empty($username))): ?>
        <div>Provided <?=$username?></div><br>
        <div>Privided <?=$password?></div>
    <?php endif; ?>

</div>
   