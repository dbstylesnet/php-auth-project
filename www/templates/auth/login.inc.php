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

<link rel="stylesheet" type="text/css" href="/static/auth/login.form.css">

<div id="main-wrapper"> 

    <h2><?= $pageTitle ?></h2>
    <div><?= $description ?></div>

    <div>Hello <?=$name?>, try to enrol</div>

    <?= $this->render('/auth/login.form.inc.php', [
        'errors' => []
    ]) ?>

</div>
   