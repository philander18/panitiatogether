<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="text-center mt-2">
    <a class="btn btn-sm btn-primary fw-bold mb-0" href="" role="button" data-bs-toggle="modal" data-bs-target="#form-input-rencana" id="tombol-input-rencana">Tambah Rencana</a>
</div>
<div class="konten-tugas">
    <div class="rencana">
        <h4>Rencana</h4>
        <div class="phil-kotak">
            <div class="search-kotak">
                <label class="text-dark">Search :</label>
                <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword">
            </div>
            <div class="konten-kotak2">
                <div class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body konten-detail-task">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, commodi? Ipsam unde nostrum velit officia soluta voluptates molestias inventore accusantium excepturi enim hic,</p>
                        <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body konten-detail-task">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, commodi? Ipsam unde nostrum velit officia soluta voluptates molestias inventore accusantium excepturi enim hic,</p>
                        <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body konten-detail-task">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, commodi? Ipsam unde nostrum velit officia soluta voluptates molestias inventore accusantium excepturi enim hic,</p>
                        <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body konten-detail-task">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, commodi? Ipsam unde nostrum velit officia soluta voluptates molestias inventore accusantium excepturi enim hic,</p>
                        <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hasil">
        <h4>Hasil</h4>
        <div class="phil-kotak">
            <div class="search-kotak">
                <label class="text-dark">Search :</label>
                <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword">
            </div>
            <div class="konten-kotak1">
                <div class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body konten-detail-task">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, commodi? Ipsam unde nostrum velit officia soluta voluptates molestias inventore accusantium excepturi enim hic,</p>
                        <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body konten-detail-task">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, commodi? Ipsam unde nostrum velit officia soluta voluptates molestias inventore accusantium excepturi enim hic,</p>
                        <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body konten-detail-task">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, commodi? Ipsam unde nostrum velit officia soluta voluptates molestias inventore accusantium excepturi enim hic,</p>
                        <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body konten-detail-task">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, commodi? Ipsam unde nostrum velit officia soluta voluptates molestias inventore accusantium excepturi enim hic,</p>
                        <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="form-input-rencana" tabindex="-1" aria-labelledby="Form Input rencana" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judul_tambah">Input Data rencana</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id-rencana" value="">
                <div class="form-modal">
                    <label for="deadline-rencana" class="form-label">Deadline</label>
                    <input class="form-control" type="date" id="deadline-rencana" placeholder="deadline" aria-label="default input example" value="<?= date('Y-m-d'); ?>">
                </div>
                <div class="form-modal">
                    <label for="topik-rencana" class="form-label">Topik</label>
                    <input class="form-control" type="text" id="topik-rencana" placeholder="topik" aria-label="default input example">
                </div>
                <div class="form-modal">
                    <label for="isi-rencana" class="form-label">Detail</label>
                    <textarea class="form-control" id="isi-rencana" placeholder="isi" id="isi-rencana" rows="3"></textarea>
                </div>
                <div class="form-modal">
                    <label for="jumlah-rencana" class="form-label">Jumlah</label>
                    <input class="form-control" type="text" id="jumlah-rencana" placeholder="jumlah" aria-label="default input example">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="tambah-rencana" data-bs-dismiss="modal">Tambah</button>
                <button type="button" class="btn btn-primary" id="hapus-rencana" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#konfirmasi-rencana">Hapus</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>