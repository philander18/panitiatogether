<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

            <form action="<?= url_to('login') ?>" method="post">
                <?= csrf_field() ?>
                <?php if ($config->validFields === ['email']) : ?>
                    <input class="form-control my-2 <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" type="email" name="login" placeholder="Email" required>
                    <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                    </div>
                <?php else : ?>
                    <input class="form-control my-2 <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" type="text" name="login" placeholder="Username" required>
                    <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                    </div>
                <?php endif; ?>
                <div class="input_password">
                    <input class="form-control my-2 z-1 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" type="password" id="password-field" name="password" placeholder="Password" required>
                    <span class="toggle-password z-3 mata"><i toggle="#password-field" class="fas fa-eye" id="icon" style="cursor:pointer"></i></span>
                    <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                    </div>
                </div>
                <?php if ($config->allowRemembering) : ?>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                            <?= lang('Auth.rememberMe') ?>
                        </label>
                    </div>
                <?php endif; ?>
                <button type="submit" class="btn btn-primary text-dark fw-bold" style="width: 100%; font-size:1.5rem;">Login</button>
            </form>
            <?php if ($config->allowRegistration) : ?>
                <div class="text-start my-2" style="font-size: 1.4rem;">
                    <a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a>
                </div>
            <?php endif; ?>
            <?php if ($config->activeResetter) : ?>
                <div class="text-start" style="font-size: 1.4rem;">
                    <a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                </div>
            <?php endif; ?>
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