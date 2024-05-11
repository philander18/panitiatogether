<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark">
            <th class="text-center">Tanggal</th>
            <th class="text-center">Judul</th>
            <th class="text-center">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kredit as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1 text-dark" style="width: 95px;"><?= date("d-m-Y", strtotime($row["tanggal"])); ?></td>
                <td class="align-middle m-1 p-1 text-dark" style="width: auto;">
                    <?php if (user()->username == 'hadasa' and $row['pic'] == 'hadasa') : ?>
                        <a href="" class="link-primary modal-keuangan" data-bs-toggle="modal" data-bs-target="#form-input-keuangan" data-id="<?= $row["id"];; ?>">
                            <?= $row["keterangan"]; ?>
                        </a>
                    <?php else : ?>
                        <?= $row["keterangan"]; ?>
                    <?php endif ?>
                </td>
                <td class="text-end align-middle m-1 p-1 text-dark" style="width: 100px;"><?= number_format($row["jumlah"], 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if ($kredit) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination mb-0">
            <?php if ($pagination_kredit['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-kredit" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_kredit['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-kredit" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination_kredit['number'] as $number) : ?>
                <li class="page-item <?= $pagination_kredit['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark link-kredit" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination_kredit['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-kredit" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_kredit['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-kredit" aria-label="<?= $last_kredit; ?>" id="last" name="last" data-page="<?= $last_kredit; ?>">
                        <span aria-hidden="true"><?= $last_kredit; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<script>
    $('.modal-keuangan').on('click', function() {
        const id = $(this).data('id');
        $('#tambah-keuangan').prop('hidden', false);
        $('#tambah-keuangan').html('Update');
        $('#hapus-keuangan').prop('hidden', false);
        $.ajax({
            url: method_url('Bendahara', 'get_data_keuangan'),
            data: {
                id: id,
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#tanggal-keuangan').val(data.tanggal);
                $('#keterangan-keuangan').val(data.keterangan);
                $('#keterangan-keuangan').val(data.keterangan);
                $('#jenis-keuangan').val(data.jenis);
                $('#jumlah-keuangan').val(data.jumlah);
                $('#id-keuangan').val(data.id);
            }
        });
    });
    $(".link-kredit").on('click', function() {
        refresh_kredit($('#keyword-kredit').val(), $(this).data('page'));
    });
</script>