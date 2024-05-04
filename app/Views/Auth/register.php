<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="<?= base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>public/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>public/fontawesome-free-6.5.2-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>public/css/styles.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="<?= base_url(); ?>public/images/icon.png">
</head>

<body>
    <div class="container">
        <div class="form-login">
            <h1>Panitia Ibadah Padang<br>
                GPdI Wilayah 1</h1>
            <?= view('Myth\Auth\Views\_message_block') ?>

            <form action="<?= url_to('register') ?>" method="post">
                <?= csrf_field() ?>
                <div class="my-2">
                    <input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" type="email" name="email" placeholder="Email" aria-describedby="emailHelp" value="<?= old('email') ?>">
                    <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                </div>
                <input class="form-control mb-2<?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" type="text" name="username" placeholder="Username" value="<?= old('username') ?>">
                <div class="input_password">
                    <input class="form-control my-2 z-1 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" type="password" id="password-field" name="password" autocomplete="off">
                    <span class="toggle-password z-3 mata"><i toggle="#password-field" class="fas fa-eye" id="icon" style="cursor:pointer"></i></span>
                </div>
                <div class="input_password">
                    <input class="form-control my-2 z-1 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" type="password" id="password-1" name="pass_confirm" autocomplete="off">
                    <span class="toggle-password1 z-3 mata"><i toggle="#password-1" class="fas fa-eye" id="icon1" style="cursor:pointer"></i></span>
                </div>
                <button type="submit" class="btn btn-primary text-dark fw-bold" style="width: 100%; font-size:1.5rem;">Register</button>
            </form>
            <div class="text-start my-2" style="font-size: 1.4rem;">
                <?= lang('Auth.alreadyRegistered') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a>
            </div>
            <img src="<?= base_url(); ?>public/images/together.png" alt="Logo Together" width="80%">
        </div>
    </div>
    <script src="<?= base_url(); ?>public/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>public/fontawesome-free-6.5.2-web/js/all.min.js"></script>
    <script src="<?= base_url(); ?>public/js/jquery-3.7.1.min.js"></script>
    <script src="<?= base_url(); ?>public/js/all.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <?= $this->include('Auth/script'); ?>
</body>

</html>