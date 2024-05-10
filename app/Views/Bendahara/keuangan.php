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
                                <td class="align-middle m-1 p-1 text-dark" style="width: auto;"><?= $row["keterangan"]; ?></td>
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
            <h6 class="text-black m-2" style="text-shadow: 2px 2px white;">Jumlah Uang Masuk : <?= 'Rp ' . number_format($jumlah_debit, 0, ',', '.'); ?></h6>
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
                                <td class="align-middle m-1 p-1 text-dark" style="width: auto;"><?= $row["keterangan"]; ?></td>
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
            <h6 class="text-black m-2" style="text-shadow: 2px 2px white;">Jumlah Uang Keluar : <?= 'Rp ' . number_format($jumlah_kredit, 0, ',', '.'); ?></h6>
        </div>
    </div>
    <div class="hand">
        <h3>Flow Cash Bendahara</h3>
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
                        <tr>
                            <td class="text-center align-middle m-1 p-1 text-dark"><?= date("d-m-Y", strtotime('2024-05-10')); ?></td>
                            <td class="align-middle m-1 p-1 text-dark" style="width: auto;">Acara</td>
                            <td class="align-middle m-1 p-1 text-dark">herry</td>
                            <td class="text-end align-middle m-1 p-1 text-dark"><?= number_format(500000, 0, ',', '.'); ?></td>
                        </tr>
                        <?php foreach ($flow as $row) : ?>
                            <tr>
                                <td class="text-center align-middle m-1 p-1 text-dark"><?= date("d-m-Y", strtotime($row["tanggal"])); ?></td>
                                <td class="align-middle m-1 p-1 text-dark" style="width: auto;"><?= $row["keterangan"]; ?></td>
                                <td class="align-middle m-1 p-1 text-dark"><?= $row["pic"]; ?></td>
                                <td class="text-end align-middle m-1 p-1 text-dark"><?= number_format($row["jumlah"], 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if ($flow) : ?>
                    <div aria-label="Page navigation">
                        <ul class="pagination mb-0">
                            <?php if ($pagination_flow['first']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark linkD" aria-label="First" id="first" name="first" data-page="1">
                                        <span aria-hidden="false">First</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_flow['previous']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark linkD" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                        <span aria-hidden=" true">Previous</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php foreach ($pagination_flow['number'] as $number) : ?>
                                <li class="page-item <?= $pagination_flow['page'] == $number ? 'active' : '' ?>">
                                    <button class="page-link text-dark linkD" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                        <span aria-hidden="true"><?= $number; ?></span>
                                    </button>
                                </li>
                            <?php endforeach ?>
                            <?php if ($pagination_flow['next']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark linkD" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                        <span aria-hidden=" true">Next</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_flow['last']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark linkD" aria-label="<?= $last_flow; ?>" id="last" name="last" data-page="<?= $last_flow; ?>">
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