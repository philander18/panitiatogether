<h6 class="text-black mb-2 mt-4" style="text-shadow: 2px 2px white;">Jumlah Uang Masuk : <?= 'Rp ' . number_format($jumlah_debit, 0, ',', '.'); ?></h6>
<h6 class="text-black mb-2" style="text-shadow: 2px 2px white;">Jumlah Uang Keluar : <?= 'Rp ' . number_format($jumlah_kredit, 0, ',', '.'); ?></h6>
<h5 class="text-black mb-2 fw-bold style=" text-shadow: 2px 2px white;">Saldo : <?= 'Rp ' . number_format(($jumlah_debit - $jumlah_kredit), 0, ',', '.'); ?></h5>