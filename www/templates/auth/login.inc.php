<?php

/**
 * Login form template
 */
// CONST HEADER = TEMPLATE_DIR . "/auth/header.inc.php";
CONST LOGIN_FORM = TEMPLATE_DIR . "/auth/login.form.php";
// CONST FOOTER = TEMPLATE_DIR . "/auth/footer.inc.php";
// $loginForm = SELF::LOGIN_FORM;

$header = TEMPLATE_DIR . "/auth/header.inc.php";
$loginForm = TEMPLATE_DIR . "/auth/login.form.inc.php";
$footer = TEMPLATE_DIR . "/auth/footer.inc.php";

/**
 * @var $name string
 */

 /**
 * @var $pageTitle string
 */

 /**
 * @var $description string
 */

 /**
 * @var $status string
 */

  /**
 * @var $success string
 */

 /**
 * @var $denied string
 */


?>

<html>
    <?= include $header ?>
    <body>
        <div id="main-wrapper"> 

            <h2><?= $pageTitle ?></h2>
            <div><?= $description ?></div>

            <!-- // include SELF::LOGIN_FORM  -->

            <?= include $loginForm ?>

        </div>
        <?= include $footer ?>
    </body>
</html>