<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="keuangan">
    <div class="input-keuangan">
        <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#form-input-keuangan" id="tombol-tambah-keuangan">Input Data</a>
    </div>
    <div class="debit">
        <h3>Masuk</h3>
        <div class="phil-tabel">
            <div class="search">
                <label class="text-dark">Search :</label>
                <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword">
            </div>
            <div class="tabel">
                <table id="tabelDataDebit" class="table table-striped" style="width:100%">
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
                                <td class="align-middle m-1 p-1 text-dark" style="width: auto;"><?= $row["keterangan"]; ?></td>
                                <td class="text-end align-middle m-1 p-1 text-dark" style="width: 100px;"><?= number_format($row["jumlah"], 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if ($debit) : ?>
                    <div aria-label="Page navigation">
                        <ul class="pagination">
                            <?php if ($pagination_debit['first']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark linkD" aria-label="First" id="first" name="first" data-page="1">
                                        <span aria-hidden="false">First</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_debit['previous']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark linkD" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                        <span aria-hidden=" true">Previous</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php foreach ($pagination_debit['number'] as $number) : ?>
                                <li class="page-item <?= $pagination_debit['page'] == $number ? 'active' : '' ?>">
                                    <button class="page-link text-dark linkD" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                        <span aria-hidden="true"><?= $number; ?></span>
                                    </button>
                                </li>
                            <?php endforeach ?>
                            <?php if ($pagination_debit['next']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark linkD" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                        <span aria-hidden=" true">Next</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_debit['last']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark linkD" aria-label="<?= $last_debit; ?>" id="last" name="last" data-page="<?= $last_debit; ?>">
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
                <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword">
            </div>
            <div class="tabel">
                <table id="tabelDataDebit" class="table table-striped" style="width:100%">
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
                                <td class="align-middle m-1 p-1 text-dark" style="width: auto;"><?= $row["keterangan"]; ?></td>
                                <td class="text-end align-middle m-1 p-1 text-dark" style="width: 100px;"><?= number_format($row["jumlah"], 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if ($kredit) : ?>
                    <div aria-label="Page navigation">
                        <ul class="pagination">
                            <?php if ($pagination_kredit['first']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark linkD" aria-label="First" id="first" name="first" data-page="1">
                                        <span aria-hidden="false">First</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_kredit['previous']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark linkD" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                        <span aria-hidden=" true">Previous</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php foreach ($pagination_kredit['number'] as $number) : ?>
                                <li class="page-item <?= $pagination_kredit['page'] == $number ? 'active' : '' ?>">
                                    <button class="page-link text-dark linkD" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                        <span aria-hidden="true"><?= $number; ?></span>
                                    </button>
                                </li>
                            <?php endforeach ?>
                            <?php if ($pagination_kredit['next']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark linkD" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                        <span aria-hidden=" true">Next</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_kredit['last']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark linkD" aria-label="<?= $last_kredit; ?>" id="last" name="last" data-page="<?= $last_kredit; ?>">
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
    <div class="summary-keuangan phil-tabel">
        <div class="search">
            <label class="text-dark">Search :</label>
            <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword">
        </div>
        <div class="tabel">
            <table id="tabelDataDebit" class="table table-striped mb-0" style="width:100%">
                <thead>
                    <tr class="table-dark">
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Judul</th>
                        <th class="text-center">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center align-middle m-1 p-1 text-dark" style="width: 95px;">20-05-2024</td>
                        <td class="align-middle m-1 p-1 text-dark" style="width: auto; text-align: justify;">Donasi Herry Totalis</td>
                        <td class="text-end align-middle m-1 p-1 text-dark" style="width: 100px;"><?= number_format(50000000, 0, ',', '.'); ?></td>
                    </tr>
                </tbody>
            </table>
            <h2>test</h2>
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
                <input type="hidden" name="id" id="id" value="">
                <div class="form-modal">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input class="form-control" type="date" id="tanggal" name="tanggal" placeholder="tanggal" aria-label="default input example" value="<?= date('Y-m-d'); ?>">
                </div>
                <div class="form-modal">
                    <label for="keterangan" class="form-label">keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" id="keterangan" rows="3"></textarea>
                </div>
                <div class="form-modal">
                    <label for="jenis" class="form-label">Jenis</label>
                    <select class="form-select" aria-label=".form-select-sm example" name="jenis" id="jenis" style="margin-left:10.4px;">
                        <option value="debit" selected>Debit</option>
                        <option value="kredit">Kredit</option>
                    </select>
                </div>
                <div class="form-modal">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input class="form-control" type="text" id="jumlah" name="jumlah" placeholder="jumlah" aria-label="default input example">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="tambah-keuangan" data-bs-dismiss="modal">Tambah</button>
                <button type="button" class="btn btn-primary" id="hapus-keuangan" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#konfirmasi">Hapus</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>