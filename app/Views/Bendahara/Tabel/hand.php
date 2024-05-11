<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark">
            <th class="text-center" style="width: 120px;">Nama</th>
            <th class="text-center" style="width: auto;">Panitia</th>
            <th class="text-center" style="width: 100px;">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hand as $row) : ?>
            <tr class="">
                <td class="text-center align-middle m-1 p-1"><?= $row['pic']; ?></td>
                <td class="text-center align-middle m-1 p-1"><?= $row["panitia"]; ?></td>
                <td class="text-end align-middle m-1 p-1"><?= number_format($row["jumlah"], 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if ($hand) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination mb-0">
            <?php if ($pagination_hand['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-hand" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_hand['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-hand" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination_hand['number'] as $number) : ?>
                <li class="page-item <?= $pagination_hand['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark link-hand" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination_hand['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-hand" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_hand['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-hand" aria-label="<?= $last_hand; ?>" id="last" name="last" data-page="<?= $last_hand; ?>">
                        <span aria-hidden="true"><?= $last_hand; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<script>
    $(".link-hand").on('click', function() {
        refresh_hand($('#keyword-hand').val(), $(this).data('page'));
    });
</script>