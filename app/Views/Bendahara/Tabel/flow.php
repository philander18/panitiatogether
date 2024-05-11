<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark">
            <th class="text-center" style="width: 90px;">Tanggal</th>
            <th class="text-center" style="width: auto;">Ke</th>
            <th class="text-center" style="width: 90px;">Nama</th>
            <th class="text-center" style="width: 90px;">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($flow as $row) : ?>
            <tr class="">
                <td class="text-center align-middle m-1 p-1"><?= date("d-m-Y", strtotime($row["tanggal"])); ?></td>
                <td class="text-center align-middle m-1 p-1" style="width: auto;">
                    <?php if (user()->username == 'hadasa' and $row["jenis"] == 'transit') : ?>
                        <a href="" class="link-primary modal-flow" data-bs-toggle="modal" data-bs-target="#form-input-flow" data-id="<?= $row["id"];; ?>">
                            <?= $row["keterangan"]; ?>
                        </a>
                    <?php else : ?>
                        <?= $row["keterangan"]; ?>
                    <?php endif ?>
                </td>
                <td class="text-center align-middle m-1 p-1 <?= ($row["jenis"] == 'transit') ? 'text-primary' : 'text-danger'; ?>"><?= $row["pic"]; ?></td>
                <td class="text-end align-middle m-1 p-1"><?= number_format($row["jumlah"], 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if ($flow) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination mb-0">
            <?php if ($pagination_flow['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-flow" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_flow['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-flow" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination_flow['number'] as $number) : ?>
                <li class="page-item <?= $pagination_flow['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark link-flow" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination_flow['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-flow" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_flow['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-flow" aria-label="<?= $last_flow; ?>" id="last" name="last" data-page="<?= $last_flow; ?>">
                        <span aria-hidden="true"><?= $last_flow; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<script>
    $('.modal-flow').on('click', function() {
        const id = $(this).data('id');
        $('#tambah-flow').prop('hidden', false);
        $('#tambah-flow').html('Update');
        $('#hapus-flow').prop('hidden', false);
        $.ajax({
            url: method_url('Bendahara', 'get_data_keuangan'),
            data: {
                id: id,
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id-flow').val(data.id);
                $('#tanggal-flow').val(data.tanggal);
                $('#pic-flow').val(data.pic);
                $('#jumlah-flow').val(data.jumlah);
            }
        });
    });
    $(".link-flow").on('click', function() {
        refresh_flow($('#keyword-flow').val(), $(this).data('page'));
    });
</script>