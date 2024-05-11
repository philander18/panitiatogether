<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="keuangan">
    <div class="input-keuangan <?= (user()->username <> 'hadasa') ? 'd-none' : '' ?>">
        <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#form-input-keuangan" id="tombol-tambah-keuangan">Input Data</a>
        <div class="flash-update mt-2 mb-0">
        </div>
    </div>
    <div class="debit">
        <h3>Masuk</h3>
        <div class="phil-tabel">
            <div class="search">
                <label class="text-dark">Search :</label>
                <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-debit">
            </div>
            <div class="tabel tabel-debit">
                <table class="table table-striped" style="width:100%">
                    <thead>
                        <tr class="table-dark">
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($debit as $row) : ?>
                            <tr>
                                <td class="text-center align-middle m-1 p-1 text-dark" style="width: 95px;"><?= date("d-m-Y", strtotime($row["tanggal"])); ?></td>
                                <td class="align-middle m-1 p-1 text-dark" style="width: auto;">
                                    <?php if (user()->username == 'hadasa') : ?>
                                        <?php if ($row["keterangan"] == 'Pendaftaran') : ?>
                                            <a href="<?= base_url(); ?>Bendahara" class="link-primary">
                                                <?= $row["keterangan"]; ?>
                                            </a>
                                        <?php else : ?>
                                            <a href="" class="link-primary modal-keuangan" data-bs-toggle="modal" data-bs-target="#form-input-keuangan" data-id="<?= $row["id"];; ?>">
                                                <?= $row["keterangan"]; ?>
                                            </a>
                                        <?php endif ?>
                                    <?php else : ?>
                                        <?= $row["keterangan"]; ?>
                                    <?php endif ?>
                                </td>
                                <td class="text-end align-middle m-1 p-1 text-dark" style="width: 100px;"><?= number_format($row["jumlah"], 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if ($debit) : ?>
                    <div aria-label="Page navigation">
                        <ul class="pagination mb-0">
                            <?php if ($pagination_debit['first']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-debit" aria-label="First" id="first" name="first" data-page="1">
                                        <span aria-hidden="false">First</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_debit['previous']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-debit" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                        <span aria-hidden=" true">Previous</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php foreach ($pagination_debit['number'] as $number) : ?>
                                <li class="page-item <?= $pagination_debit['page'] == $number ? 'active' : '' ?>">
                                    <button class="page-link text-dark link-debit" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                        <span aria-hidden="true"><?= $number; ?></span>
                                    </button>
                                </li>
                            <?php endforeach ?>
                            <?php if ($pagination_debit['next']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-debit" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                        <span aria-hidden=" true">Next</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_debit['last']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-debit" aria-label="<?= $last_debit; ?>" id="last" name="last" data-page="<?= $last_debit; ?>">
                                        <span aria-hidden="true"><?= $last_debit; ?></span>
                                    </button>
                                </li>
                            <?php endif ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="kredit">
        <h3>Keluar</h3>
        <div class="phil-tabel">
            <div class="search">
                <label class="text-dark">Search :</label>
                <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-kredit">
            </div>
            <div class="tabel tabel-kredit">
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
            </div>
        </div>
    </div>
    <div class="flow">
        <h3>Alur Keuangan Bendahara</h3>
        <a href="" class="btn btn-sm btn-primary <?= (user()->username <> 'hadasa') ? 'd-none' : '' ?>" data-bs-toggle="modal" data-bs-target="#form-input-flow" id="tombol-tambah-flow">Input Flow</a>
        <div class="phil-tabel">
            <div class="search">
                <label class="text-dark">Search :</label>
                <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-flow">
            </div>
            <div class=" tabel tabel-flow">
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
            </div>
        </div>
    </div>
    <div class="summary">
        <h3>Keuangan di Tangan</h3>
        <div class="phil-tabel">
            <div class="search">
                <label class="text-dark">Search :</label>
                <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-hand">
            </div>
            <div class=" tabel tabel-hand">
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
            </div>
            <div class="data-summary">
                <h6 class="text-black mb-2 mt-4" style="text-shadow: 2px 2px white;">Jumlah Uang Masuk : <?= 'Rp ' . number_format($jumlah_debit, 0, ',', '.'); ?></h6>
                <h6 class="text-black mb-2" style="text-shadow: 2px 2px white;">Jumlah Uang Keluar : <?= 'Rp ' . number_format($jumlah_kredit, 0, ',', '.'); ?></h6>
                <h5 class="text-black mb-2 fw-bold style=" text-shadow: 2px 2px white;">Saldo : <?= 'Rp ' . number_format(($jumlah_debit - $jumlah_kredit), 0, ',', '.'); ?></h5>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="form-input-keuangan" tabindex="-1" aria-labelledby="Form Input" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judul_tambah">Input Data Keuangan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id-keuangan" value="">
                <div class="form-modal">
                    <label for="tanggal-keuangan" class="form-label">Tanggal</label>
                    <input class="form-control" type="date" id="tanggal-keuangan" placeholder="Tanggal" aria-label="default input example" value="<?= date('Y-m-d'); ?>">
                </div>
                <div class="form-modal">
                    <label for="keterangan-keuangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan-keuangan" placeholder="Keterangan" id="keterangan-keuangan" rows="3"></textarea>
                </div>
                <div class="form-modal">
                    <label for="jenis-keuangan" class="form-label">Jenis</label>
                    <select class="form-select" aria-label=".form-select-sm example" id="jenis-keuangan" style="margin-left:10.4px;">
                        <option value="debit" selected>Debit</option>
                        <option value="kredit">Kredit</option>
                    </select>
                </div>
                <div class="form-modal">
                    <label for="jumlah-keuangan" class="form-label">Jumlah</label>
                    <input class="form-control" type="text" id="jumlah-keuangan" placeholder="Jumlah" aria-label="default input example">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="tambah-keuangan" data-bs-dismiss="modal">Tambah</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="hapus-keuangan" data-bs-toggle="modal" data-bs-target="#konfirmasi-keuangan">Hapus</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="form-input-flow" tabindex="-1" aria-labelledby="Form Input flow" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judul_tambah">Input Data Flow</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id-flow" value="">
                <div class="form-modal">
                    <label for="tanggal-flow" class="form-label">Tanggal</label>
                    <input class="form-control" type="date" id="tanggal-flow" placeholder="Tanggal" aria-label="default input example" value="<?= date('Y-m-d'); ?>">
                </div>
                <div class="form-modal">
                    <label for="pic-flow" class="form-label">Ke</label>
                    <select class="form-select" aria-label=".form-select-sm example" id="pic-flow" style="margin-left:10.4px;">
                        <?php foreach ($listpanitia as $panitia) : ?>
                            <option value="<?= $panitia['username']; ?>"><?= $panitia['username']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-modal">
                    <label for="jumlah-flow" class="form-label">Jumlah</label>
                    <input class="form-control" type="text" id="jumlah-flow" placeholder="jumlah" aria-label="default input example">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="tambah-flow" data-bs-dismiss="modal">Tambah</button>
                <button type="button" class="btn btn-primary" id="hapus-flow" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#konfirmasi-flow">Hapus</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="konfirmasi-keuangan" tabindex="-1" aria-labelledby="konfirmasi" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-primary">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding-top:2px;">
                <div class="form-group">
                    <label class="text-dark fw-bold ms-2 mb-2">Yakin dihapus?</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TIDAK</button>
                <button type="button" id="ya-hapus-keuangan" class="btn btn-primary" data-bs-dismiss="modal">YA</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="konfirmasi-flow" tabindex="-1" aria-labelledby="konfirmasi" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-primary">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding-top:2px;">
                <div class="form-group">
                    <label class="text-dark fw-bold ms-2 mb-2">Yakin dihapus?</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TIDAK</button>
                <button type="button" id="ya-hapus-flow" class="btn btn-primary" data-bs-dismiss="modal">YA</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>