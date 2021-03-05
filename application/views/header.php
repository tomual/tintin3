<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo get_title() ? get_title() . ' | ' : '' ?>Tintin3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
    <meta http-equiv="cleartype" content="on">
    <link href="<?php echo base_url('css/bootstrap/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/style.css') ?>" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <b><a href="<?php echo base_url() ?>" class="text-reset text-decoration-none">Tintin3</a></b>
                <?php if ($this->user) : ?>
                    <p>Hello, <?php echo $this->user->username ?> <a href="<?php echo base_url('user/logout') ?>">Log Out</a></p>
                    <ul>
                        <li><a href="<?php echo base_url() ?>">Home</a></li>
                        <li><a href="<?php echo base_url('ticket/create') ?>">New Ticket</a></li>
                        <li><a href="<?php echo base_url('ticket/list') ?>">Tickets</a></li>
                        <li><a href="<?php echo base_url('project/list') ?>">Projects</a></li>
                    </ul>
                <?php else : ?>
                        <p><a href="<?php echo base_url('user/login') ?>">Log In</a></p>
                <?php endif ?>
                <hr>
            </div>
        </div>
    </div>
