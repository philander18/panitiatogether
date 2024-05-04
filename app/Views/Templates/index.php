<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
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
    <?= $this->renderSection('page-content'); ?>
    <script src="<?= base_url(); ?>public/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>public/fontawesome-free-6.5.2-web/js/all.min.js"></script>
    <script src="<?= base_url(); ?>public/js/jquery-3.7.1.min.js"></script>
    <script src="<?= base_url(); ?>public/js/all.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <?= $this->include('Templates/script'); ?>
    <?= $this->include('Home/script'); ?>
    <?= $this->include('Bendahara/script'); ?>
</body>

</html>