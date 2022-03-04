<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 * @var $username
 */

$cakeDescription = 'Embajadores';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php echo $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js'); ?>
    <?php echo $this->Html->script('https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js'); ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Embajadores </span>Claro</a>
        </div>
        <div class="top-nav-links">
                <?= $this->Html->link("Descargar APP", ['controller'=>'tUsuarios','action'=>'download']) ?>
            <?php if ($username) : ?>
                <?= $this->Html->link("Inicio", ['controller'=>'Pages','action'=>'home']) ?>
                <?= $this->Html->link("Cuenta", ['controller'=>'tUsuarios','action'=>'view', $username["id_usuario"]]) ?>
                <?= $this->Html->link("Cerrar sesión", ['controller'=>'tUsuarios','action'=>'logout']) ?>
            <?php else : ?>
                <?= $this->Html->link("Login", ['controller'=>'tUsuarios','action'=>'login']) ?>
                <?= $this->Html->link("Registro", ['controller'=>'tUsuarios','action' => 'register']) ?>
            <?php endif; ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
