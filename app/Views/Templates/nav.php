<nav>
    <div class="logo">
        <img src="<?= base_url(); ?>public/images/together.png" alt="Logo Together" width="100px" class="d-inline">
    </div>
    <ul>
        <li><a href="<?= base_url(); ?>">Home</a></li>
        <li><a href="<?= base_url() . $judul; ?>" class="<?= ($method == 'tugas') ? "aktif" : ""; ?>">Tugas</a></li>
        <?php if (($halaman == "pengurus") || ($halaman == "ketua") || ($halaman == "sekretaris") || ($halaman == "bendahara")) : ?>
            <li><a href="" class="<?= ($method == 'approval') ? "aktif" : ""; ?>">Approval</a></li>
        <?php endif ?>
        <?php if ($halaman == "bendahara") : ?>
            <li><a href="<?= base_url(); ?>Bendahara" class="<?= ($method == 'pendaftaran') ? "aktif" : ""; ?>">Pendaftaran</a></li>
            <li><a href="<?= base_url(); ?>Bendahara/keuangan" class="<?= ($method == 'keuangan') ? "aktif" : ""; ?>">Keuangan</a></li>
        <?php endif ?>
        <li style="background-color: white;"><a><?= strtoupper(user()->username); ?></a></li>
    </ul>
    <div class="menu-toggles">
        <input type="checkbox">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>