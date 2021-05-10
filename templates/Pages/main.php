<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;
use Cake\Routing\Router;

$this->disableAutoLayout();

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!--link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet"-->

    <?= $this->Html->css(['cake', 'bootstrap.min', 'main']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<header>
    <div class="container text-center">
        <h1>
            Welcome to Work of Tasks (🍓)
        </h1>
    </div>
</header>
<?php
$templates = [
    'inputContainer' => '<div class="form-group">{{content}}</div>',
    'input' => '<input type="{{type}}" class="form-control" name="{{name}}" {{attrs}} />',
    'inputContainerError' => '<div class="form-group {{required}} error">{{content}}{{error}}</div>',
    'error' => '<div class="invalid-feedback">{{content}}</div>'
];
$this->Form->setTemplates($templates);
?>
<main class="main">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-6">
                    <h2>Login</h2>
                    <div>
                        <?= $this->Form->create(null, [
                            'url' => [
                                'controller' => 'Users', 'action' => 'login'
                            ],
                            'method'=>'post'
                        ]);
                        echo $this->Form->control('email', [
                            'class' => ($this->Form->isFieldError('email')) ? 'form-control is-invalid' : 'form-control'
                        ]);
                        echo $this->Form->control('password', [
                            'type' => 'password',
                            'class' => ($this->Form->isFieldError('password')) ? 'form-control is-invalid' : 'form-control'
                        ]);
                        echo $this->Form->button('Submit', ['class' => 'btn btn-success']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2>Register</h2>
                    <div>
                        <?= $this->Form->create(null, [
                            'url' => [
                                'controller' => 'Users', 'action' => 'register'
                            ],
                            'method'=>'post'
                        ]);
                        echo $this->Form->control('name', [
                            'class' => ($this->Form->isFieldError('name')) ? 'form-control is-invalid' : 'form-control'
                        ]);
                        echo $this->Form->control('email', [
                            'class' => ($this->Form->isFieldError('email')) ? 'form-control is-invalid' : 'form-control'
                        ]);
                        echo $this->Form->control('password', [
                            'type' => 'password',
                            'class' => ($this->Form->isFieldError('password')) ? 'form-control is-invalid' : 'form-control'
                        ]);
                        echo $this->Form->button('Submit', ['class' => 'btn btn-success']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
