<nav>
    <div class="logo">
        <img src="<?= base_url(); ?>public/images/together.png" alt="Logo Together" width="100px">
    </div>
    <ul>
        <li><a href="<?= base_url(); ?>">Home</a></li>
        <li><a href="" class="<?= ($method == 'rencana') ? "aktif" : ""; ?>">Rencana</a></li>
        <li><a href="" class="<?= ($method == 'hasil') ? "aktif" : ""; ?>">Hasil</a></li>
        <?php if ($halaman == "bendahara") : ?>
            <li><a href="" class="<?= ($method == 'pendaftaran') ? "aktif" : ""; ?>">Pendaftaran</a></li>
            <li><a href="" class="<?= ($method == 'keuangan') ? "aktif" : ""; ?>">Keuangan</a></li>
        <?php endif ?>
    </ul>
    <div class="menu-toggles">
        <input type="checkbox">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>