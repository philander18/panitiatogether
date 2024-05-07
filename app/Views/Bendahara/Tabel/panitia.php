<div class="flash">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert" style="padding: 6px 12px; margin-bottom: 8px;">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
</div>
<table id="tabelDataPanitia" class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark">
            <th class="text-center">Nama</th>
            <th class="text-center">Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($peserta as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1 text-dark" style="width: 70%;">
                    <a href="" class="link-primary modalpanitia <?= is_null($row["bayar"]) ? "text-danger" : (($row["wa"] == 1) ? 'text-success' : 'text-primary'); ?>" data-bs-toggle="modal" data-bs-target="#formpanitia" data-id="<?= $row["id"]; ?>" name="nama" id="nama">
                        <?= $row["nama"]; ?>
                    </a>
                </td>
                <td class="text-center align-middle m-1 p-1" style="width: 30%;">
                    <?php if (is_null($row['bayar'])) : ?>
                        <i class="fa-solid fa-circle-xmark" id="status"></i>
                        <?php if (user()->username == 'hadasa') : ?>
                            <button type="button" id="status" class="btn btn-danger btn-sm dihapus text-dark ms-2 fw-bold" data-bs-toggle="modal" data-bs-target="#formhapus" data-id="<?= $row["id"]; ?>">Delete</button>
                        <?php endif; ?>
                    <?php else : ?>
                        <?= number_format($row["bayar"], 0, ',', '.'); ?>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if ($peserta) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination">
            <?php if ($pagination['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark linkD" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark linkD" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination['number'] as $number) : ?>
                <li class="page-item <?= $pagination['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark linkD" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark linkD" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark linkD" aria-label="<?= $last; ?>" id="last" name="last" data-page="<?= $last; ?>">
                        <span aria-hidden="true"><?= $last; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<h5 class="text-black text-start" style="text-shadow: 2px 2px white;">Jumlah Data : <?= $jumlah; ?></h5>
<script>
    $(document).ready(function() {
        $('.modalpanitia').on('click', function() {
            const id = $(this).data('id');
            clear_form_panitia();
            $.ajax({
                url: method_url('Bendahara', 'getdata'),
                data: {
                    id: id,
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#modalnama').val(data.nama);
                    $('#hp').val(data.hp);
                    $('#gender').val(data.gender);
                    $('#gereja').val(data.gereja);
                    $('#wa').val(data.wa);
                    $('#bayar').val(data.bayar);
                    $('#id').val(data.id);
                    if (data.pic === null) {
                        $('#pic').html('Belum Dibayar');
                    } else {
                        $('#pic').html('Penerima : ' + data.pic);
                    }
                    $('#modalnama').prop('disabled', true);
                    $('#hp').prop('disabled', true);
                    $('#gender').prop('disabled', true);
                    $('#gereja').prop('disabled', true);
                    if ("<?= has_permission('bendahara'); ?>") {
                        $('#updatepanitia').prop('hidden', false);
                    } else {
                        $('#updatepanitia').prop('hidden', true);
                    }
                    if ("<?= user()->username == 'elisabeth'; ?>") {
                        if (data.bayar == null) {
                            $('#wa').prop('disabled', true);
                            $('#updatepanitia').prop('hidden', true);
                        } else {
                            $('#wa').prop('disabled', false);
                        }
                        $('#bayar').prop('disabled', true);
                    } else if ("<?= user()->username == 'hadasa'; ?>") {
                        $('#hp').prop('disabled', false);
                        $('#gender').prop('disabled', false);
                        $('#gereja').prop('disabled', false);
                        $('#wa').prop('disabled', true);
                        $('#bayar').prop('disabled', false);
                    } else {
                        $('#wa').prop('disabled', true);
                        $('#bayar').prop('disabled', true);
                    }
                }
            });
        });
        $('.dihapus').on('click', function() {
            $('#idhapus').val($(this).data('id'))
        });
        $(".linkD").on('click', function() {
            var page = $(this).data('page'),
                filter = $('#status_bayar').val(),
                keyword = $('#keywordpanitia').val();
            $.ajax({
                url: method_url('Bendahara', 'searchDataPanitia'),
                data: {
                    keyword: keyword,
                    filter: filter,
                    page: page,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataPanitia').html(data);
                }
            });
        });
    });
</script>