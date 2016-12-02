<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CampCare';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!--  Add Foundation  -->
    <?= $this->Html->css('foundation.css') ?>
    <?= $this->Html->css('icons/foundation-icons.css') ?>
    <?= $this->Html->css('custom.css') ?>
    <?= $this->Html->css('login.css') ?>
    
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

    <div class="top-bar-container" data-sticky-container>
      <div class="sticky" data-sticky data-options="anchor: page; marginTop: 0; stickyOn: small;">
        <div class="top-bar">
          <div class="top-bar-title">
            <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
              <button class="menu-icon dark" type="button" data-toggle></button>
            </span>
            <a href=""><?= $this->Html->image('long_logo.png', ['class'=>'topbar_logo', 'url' => '/']); ?></a>
          </div>
          <div id="responsive-menu">
            <div class="top-bar-left">
            </div>
            <div class="top-bar-right">
              <ul class="menu">
                <li><a href="#" class="profile_icon"><i class="fi-torso"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    
    <footer>
      <div class="row">
          <a href=""><?= $this->Html->image('long_logo_gris.svg', array('class'=>'footer_logo')); ?></a>
          <p class="links">
            <a href="https://twitter.com/dev_fsociety">Twitter</a>
            <a href="http://www.nuitdelinfo.com/">Nuit de l'Info</a>
            <a href="https://github.com/dev-fsociety/DFS-2016">GitHub</a>
            <a href="https://github.com/orgs/dev-fsociety/teams">About</a>
          </p>
          <p class="copywrite">Copywrite /DEV/FSOCIETY © 2016</p>
      </div>
    </footer>

    <!-- JS Calls -->
    <?= $this->Html->script('vendor/jquery') ?>
    <?= $this->Html->script('vendor/what-input') ?>
    <?= $this->Html->script('vendor/foundation') ?>
    <?= $this->Html->script('custom') ?>

    <script>$(document).foundation();</script>

</body>
</html>
