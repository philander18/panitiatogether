<script>
    function clear_form_panitia() {
        $('#modalnama').val('');
        $('#hp').val('');
        $('#gender').val('');
        $('#gereja').val('');
        $('#bayar').val('');
    }

    function refresh_debit(keyword, page) {
        $.ajax({
            url: method_url('Bendahara', 'refresh_tabel_debit'),
            data: {
                keyword: keyword,
                page: page,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-debit').html(data);
            }
        });
    }

    function refresh_kredit(keyword, page) {
        $.ajax({
            url: method_url('Bendahara', 'refresh_tabel_kredit'),
            data: {
                keyword: keyword,
                page: page,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-kredit').html(data);
            }
        });
    }

    function refresh_flow(keyword, page) {
        $.ajax({
            url: method_url('Bendahara', 'refresh_tabel_flow'),
            data: {
                keyword: keyword,
                page: page,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-flow').html(data);
            }
        });
    }

    function refresh_hand(keyword, page) {
        $.ajax({
            url: method_url('Bendahara', 'refresh_tabel_hand'),
            data: {
                keyword: keyword,
                page: page,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-hand').html(data);
            }
        });
    }

    function tampil_flash() {
        $.ajax({
            url: method_url('Home', 'flash'),
            data: {},
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.flash-update').html(data);
            }
        });
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

        // Menangani tambah data keuangan
        $('#tombol-tambah-keuangan').on('click', function() {
            $('#tanggal-keuangan').val('<?= date('Y-m-d'); ?>');
            $('#keterangan-keuangan').val('');
            $('#jenis-keuangan').val('debit');
            $('#jumlah-keuangan').val('');
            $('#id-keuangan').val('');
            $('#hapus-keuangan').prop('hidden', true);
            $('#tambah-keuangan').html('Tambah');
        });
        $('#tambah-keuangan').on('click', function() {
            const tanggal = $('#tanggal-keuangan').val(),
                keterangan = $('#keterangan-keuangan').val(),
                jenis = $('#jenis-keuangan').val(),
                id = $('#id-keuangan').val(),
                jumlah = $('#jumlah-keuangan').val();
            $.ajax({
                url: method_url('Bendahara', 'input_keuangan'),
                data: {
                    id: id,
                    tanggal: tanggal,
                    keterangan: keterangan,
                    jenis: jenis,
                    jumlah: jumlah,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    tampil_flash();
                    refresh_debit("", 1);
                    refresh_kredit("", 1);
                    refresh_flow("", 1);
                    refresh_hand("", 1);
                }
            });
        });
        $('#ya-hapus-keuangan').on('click', function() {
            const id = $('#id-keuangan').val();
            $.ajax({
                url: method_url('Bendahara', 'delete_keuangan'),
                data: {
                    id: id,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    tampil_flash();
                    refresh_debit("", 1);
                    refresh_kredit("", 1);
                    refresh_flow("", 1);
                    refresh_hand("", 1);
                }
            });
        });
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
                    $('#jenis-keuangan').val(data.jenis);
                    $('#jumlah-keuangan').val(data.jumlah);
                    $('#id-keuangan').val(data.id);
                }
            });
        });
        $('#keyword-debit').on('keyup', function() {
            refresh_debit($(this).val(), 1);
        });
        $(".link-debit").on('click', function() {
            refresh_debit($('#keyword-debit').val(), $(this).data('page'));
        });
        $('#keyword-kredit').on('keyup', function() {
            refresh_kredit($(this).val(), 1);
        });
        $(".link-kredit").on('click', function() {
            refresh_kredit($('#keyword-kredit').val(), $(this).data('page'));
        });

        // Menangani tambah data flow
        $('#tombol-tambah-flow').on('click', function() {
            $('#tanggal-flow').val('<?= date('Y-m-d'); ?>');
            $('#pic-flow').val('');
            $('#jumlah-flow').val('');
            $('#id-flow').val('');
            $('#tambah-flow').html('Tambah');
            $('#hapus-flow').prop('hidden', true);
        });
        $('#tambah-flow').on('click', function() {
            const tanggal = $('#tanggal-flow').val(),
                pic = $('#pic-flow').val(),
                id = $('#id-flow').val(),
                jumlah = $('#jumlah-flow').val();
            $.ajax({
                url: method_url('Bendahara', 'input_flow'),
                data: {
                    id: id,
                    tanggal: tanggal,
                    pic: pic,
                    jumlah: jumlah,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    tampil_flash();
                    refresh_flow("", 1);
                    refresh_hand("", 1);
                }
            });
        });
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
        $('#keyword-flow').on('keyup', function() {
            refresh_flow($(this).val(), 1);
        });
        $(".link-flow").on('click', function() {
            refresh_flow($('#keyword-flow').val(), $(this).data('page'));
        });
        $('#ya-hapus-flow').on('click', function() {
            const id = $('#id-flow').val();
            $.ajax({
                url: method_url('Bendahara', 'delete_keuangan'),
                data: {
                    id: id,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    tampil_flash();
                    refresh_debit("", 1);
                    refresh_kredit("", 1);
                    refresh_flow("", 1);
                    refresh_hand("", 1);
                }
            });
        });

        // Menangani tabel hand
        $('#keyword-hand').on('keyup', function() {
            refresh_hand($(this).val(), 1);
        });
        $(".link-hand").on('click', function() {
            refresh_hand($('#keyword-hand').val(), $(this).data('page'));
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