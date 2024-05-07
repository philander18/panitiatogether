<script>
    function clear_form_panitia() {
        $('#modalnama').val('');
        $('#hp').val('');
        $('#gender').val('');
        $('#gereja').val('');
        $('#bayar').val('');
    }

    $(document).ready(function() {
        $('#keywordpanitia').on('keyup', function() {
            var keyword = $(this).val(),
                filter = $('#status_bayar').val(),
                page = 1;
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

        $('#status_bayar').on('change', function() {
            var keyword = $('#keywordpanitia').val(),
                filter = $(this).val(),
                page = 1;
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

        $('.diterima').on('click', function() {
            $('#id').val($(this).data('id'))
        });

        $('.dihapus').on('click', function() {
            $('#idhapus').val($(this).data('id'))
        });

        $('.updatedata').on('click', function() {
            var id = $('#id').val(),
                nama = $('#modalnama').val(),
                hp = $('#hp').val(),
                gender = $('#gender').val(),
                gereja = $('#gereja').val(),
                wa = $('#wa').val(),
                bayar = $('#bayar').val(),
                keyword = $('#keywordpanitia').val(),
                filter = $('#status_bayar').val(),
                page = 1;
            $.ajax({
                url: method_url('Bendahara', 'updatedata'),
                data: {
                    id: id,
                    nama: nama,
                    hp: hp,
                    gender: gender,
                    gereja: gereja,
                    wa: wa,
                    bayar: bayar,
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

        $('.setor').on('click', function() {
            var jumlah = $('#jumlahSetor').val(),
                baseurl = $('#baseurl').val();
            $.ajax({
                url: method_url(baseurl, 'Home', 'setor'),
                data: {
                    jumlah: jumlah,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataPendaftaran').html(data);
                }
            });
        });

        $('.terima').on('click', function() {
            var id = $('#id').val(),
                baseurl = $('#baseurl').val();
            $.ajax({
                url: method_url(baseurl, 'Home', 'updatesetor'),
                data: {
                    id: id,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataSetoran').html(data);
                }
            });
        });

        $('.hapus').on('click', function() {
            var id = $('#idhapus').val();
            $.ajax({
                url: method_url('Bendahara', 'deletepeserta'),
                data: {
                    id: id,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataPanitia').html(data);
                    $('#keywordpanitia').val('');
                    $('#status_bayar').val(1);
                }
            });
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