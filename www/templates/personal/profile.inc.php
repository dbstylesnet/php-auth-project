<?php
/**
 * @var $user \App\Authentication\UserInterface
 * @var $pageTitle string
 */

?>

<? $this->includeCSS('/static/personal/profile.wrapper.css'); ?>
<? $this->includeCSS('/static/personal/profile.css'); ?>

<div id="main-wrapper"> 

    <?php if(!empty($pageTitle)): ?>
        <h2 class="page-title"><?= $pageTitle ?></h2>
    <?php endif; ?>
    
    <div class="profile-container animate">
        <div class="imgcontainer">
            <img src="/static/auth/avatar.jpg" alt="Avatar" class="avatar">
        </div>
        
        <h2>Welcome, <?= htmlspecialchars($user->getLogin()) ?>!</h2>
        <p class="subtitle">You are successfully logged in</p>
        
        <div class="profile-info">
            <div class="info-item">
                <span class="info-label">Username:</span>
                <span class="info-value"><?= htmlspecialchars($user->getLogin()) ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">User ID:</span>
                <span class="info-value">#<?= $user->getId() ?></span>
            </div>
        </div>
        
        <div class="profile-actions">
            <a href="/auth" class="logout-btn">Log Out</a>
        </div>
    </div>

</div>

