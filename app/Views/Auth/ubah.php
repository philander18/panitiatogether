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
            <h1>Ubah Password<br>
                Panitia Ibadah Padang<br>
                GPdI Wilayah 1</h1>
            <form autocomplete="off" action="<?= base_url(); ?>UbahPassword/done" method="POST">
                <input type="hidden" name="token" id="token" value="<?= $token; ?>">
                <input type="hidden" name="email" id="email" value="<?= user()->email; ?>">
                <div class="input_password">
                    <input class="form-control my-2 z-1 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" type="password" id="password-field" name="password" placeholder="New Password" autocomplete="off" required>
                    <span class="toggle-password z-3 mata"><i toggle="#password-field" class="fas fa-eye" id="icon" style="cursor:pointer"></i></span>
                </div>
                <div class="input_password">
                    <input class="form-control my-2 z-1 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" type="password" id="password-1" name="pass_confirm" placeholder="Confirm Password" autocomplete="off" required>
                    <span class="toggle-password1 z-3 mata"><i toggle="#password-1" class="fas fa-eye" id="icon1" style="cursor:pointer"></i></span>
                </div>
                <button type="submit" class="btn btn-primary text-dark fw-bold mb-2" style="width: 100%; font-size:1.5rem;" id="ubahpassword">Ubah</button>
                <a class="btn btn-primary text-dark fw-bold" href="<?= base_url(); ?>" role="button" style="width: 100%; font-size:1.5rem;">Home</a>
            </form>
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