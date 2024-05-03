<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="form-login">
        <h1>Panitia Ibadah Padang<br>
            GPdI Wilayah 1</h1>
        <input class="form-control my-2" type="text" id="username" name="username" placeholder="Username" required>
        <div>
            <input class="form-control my-2 z-1" type="password" id="password-field" name="password" placeholder="Password" required>
            <span class="toggle-password z-3"><i toggle="#password-field" class="fas fa-eye" id="icon" style="cursor:pointer"></i></span>
        </div>
        <button type="submit" class="btn btn-primary text-dark fw-bold" style="width: 100%; font-size:1.5rem;">Login</button>
        <img src="<?= base_url(); ?>public/images/together.png" alt="Logo Together" width="80%">
    </div>
</div>
<?= $this->endSection(); ?>