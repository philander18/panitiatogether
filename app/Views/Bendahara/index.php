<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="konten-bendahara">
    <div class="bendahara-search">
        <label class="text-dark">Search :</label>
        <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keywordpanitia" name="keywordpanitia">
    </div>
    <div class="bendahara-tabel mt-2 tabelDataPanitia p-0">
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
                            <a href="" class="link-primary modalpanitia" data-bs-toggle="modal" data-bs-target="#formpanitia" data-id="<?= $row["id"]; ?>" name="nama" id="nama">
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
    </div>
</div>
<div class="modal fade" id="formpanitia" tabindex="-1" aria-labelledby="judulpanitia" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-primary" id="judulpanitia">Konfirmasi Pendaftaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding-top:2px;">
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="siapa" id="siapa" value="<?= user()->username == 'hadasa'; ?>">
                <div class="form-group">
                    <label class="text-dark fw-bold ms-2 mb-2" id="pic" name="pic">Belum dibayar</label>
                </div>
                <table class="table table-borderless" style="margin-bottom: 0px;">
                    <tr>
                        <div class="form-group">
                            <td style="width: 30%;">
                                <label for="modalnama" class="fw-bold">Nama</label>
                            </td>
                            <td style="width: 70%;">
                                <input class="form-control form-control-sm" type="text" id="modalnama" name="modalnama">
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <td style="width: 30%;">
                                <label for="hp" class="fw-bold">No HP</label>
                            </td>
                            <td style="width: 70%;">
                                <input class="form-control form-control-sm" type="text" id="hp" name="hp">
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group" style="margin-bottom: 0px;">
                            <td style="width: 30%;">
                                <label for="gender" class="fw-bold">Jenis Kelamin</label>
                            </td>
                            <td style="width: 70%;">
                                <select class="form-select" aria-label=".form-select-sm example" name="gender" id="gender">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group" style="margin-bottom: 0px;">
                            <td style="width: 30%;">
                                <label for="gereja" class="fw-bold">Gereja</label>
                            </td>
                            <td style="width: 70%;">
                                <select class="form-select" aria-label=".form-select-sm example" name="gereja" id="gereja">
                                    <?php foreach ($listgereja as $gereja) : ?>
                                        <option value="<?= $gereja['nama']; ?>"><?= $gereja['nama']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group" style="margin-bottom: 0px;">
                            <td style="width: 30%;">
                                <label for="bayar" class="fw-bold">Bayar</label>
                            </td>
                            <td style="width: 70%;">
                                <input class="form-control form-control-sm" type="text" id="bayar" name="bayar">
                            </td>
                        </div>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="updatepanitia" class="btn btn-primary updatedata" data-bs-dismiss="modal">Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="formhapus" tabindex="-1" aria-labelledby="judulhapus" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-primary" id="judulhapus">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding-top:2px;">
                <input type="hidden" name="idhapus" id="idhapus" value="">
                <div class="form-group">
                    <label class="text-dark fw-bold ms-2 mb-2" id="hapus" name="hapus">Yakin dihapus?</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TIDAK</button>
                <button type="button" id="confirmhapus" class="btn btn-primary hapus" data-bs-dismiss="modal">YA</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>