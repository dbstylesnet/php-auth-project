<?php
/**
 * @var $name string
 * @var $pageTitle string
 * @var $description string
 * @var $status string
 * @var $success string
 * @var $denied string
 */

?>

<!-- <link rel="stylesheet" type="text/css" href="/static/auth/login.form.css"> -->
<? $this->includeCSS('/static/auth/login.wrapper.form.css'); ?>

<div id="main-wrapper"> 

    <h2 class="page-title"><?= $pageTitle ?></h2>
    <div><?= $description ?></div>

    <div>Hello <?=$name?>, try to enrol</div>

    <?= $this->render('/auth/login.form.inc.php', [
        'errors' => ['404' => 'not found']
    ]) ?>

</div>
   