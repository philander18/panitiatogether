<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="konten-menu">
    <img src="<?= base_url(); ?>public/images/together.png" alt="Logo Together" width="60%">
    <div class="menu">
        <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>" role="button" style="width: 80%;">Pengurus</a>
        <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>" role="button" style="width: 80%;">Ketua</a>
        <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>" role="button" style="width: 80%; ">Sekretaris</a>
        <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>bendahara" role="button" style="width: 80%; ">Bendahara</a>
        <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>" role="button" style="width: 80%; ">Acara</a>
        <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>" role="button" style="width: 80%; ">Konsumsi</a>
        <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>" role="button" style="width: 80%; ">Perlengkapan</a>
        <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>" role="button" style="width: 80%; ">Kesehatan</a>
        <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>UbahPassword" role="button" style="width: 80%; ">Ubah Password</a>
        <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>logout" role="button" style="width: 80%; ">Logout</a>
    </div>
</div>
<?= $this->endSection(); ?>