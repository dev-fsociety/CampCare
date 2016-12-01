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

<!--     <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?> -->

    <!--  Add Foundation  -->
    <?= $this->Html->css('foundation.css') ?>
    <?= $this->Html->css('icons/foundation-icons.css') ?>
    <?= $this->Html->css('custom.css') ?>

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
            <a href=""><?= $this->Html->image('long_logo.png', array('class'=>'topbar_logo')); ?></a>
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

    <span class="copyright">Copyright NDI - Team /dev/fsociety</span>

    </footer>

    <!-- JS Calls -->
    <?= $this->Html->script('vendor/jquery') ?>
    <?= $this->Html->script('vendor/what-input.min') ?>
    <?= $this->Html->script('vendor/foundation') ?>
    

    <script>$(document).foundation();</script>
    

</body>
</html>
