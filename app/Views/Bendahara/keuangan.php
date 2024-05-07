<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="keuangan">
    <div class="input-keuangan">
        <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#form-input-keuangan">Input Data</a>
    </div>
    <div class="debit">
        <h3>Masuk</h3>
        <div class="keuangan-search">
            <label class="text-dark">Search :</label>
            <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyworddebit" name="keyworddebit">
        </div>
    </div>
    <div class="kredit">
        <h3>Keluar</h3>
        <div class="keuangan-search">
            <label class="text-dark">Search :</label>
            <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keywordkredit" name="keywordkredit">
        </div>
    </div>
    <div class="summary-keuangan">
        <h1>summary</h1>
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
                    <label for="judul" class="form-label">Judul</label>
                    <input class="form-control" type="text" id="judul" name="judul" placeholder="judul" aria-label="default input example">
                </div>
                <div class="form-modal">
                    <label for="keterangan" class="form-label">keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" id="keterangan" rows="2"></textarea>
                </div>
                <div class="form-modal">
                    <label for="jenis" class="form-label">Jenis</label>
                    <select class="form-select" aria-label=".form-select-sm example" name="jenis" id="jenis">
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
                <button type="button" class="btn btn-primary" id="submit_tambah" data-bs-dismiss="modal">Tambah</button>
                <button type="button" class="btn btn-primary" id="hapus_kamus" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#konfirmasi">Hapus</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>