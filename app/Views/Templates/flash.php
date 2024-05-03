<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-primary cabin-600" role="alert" style="padding: 6px 12px; margin-bottom: 8px;">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>