<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="konten-task">
    <div class="rencana">
        <div class="input-tugas <?= ($halaman <> $posisi) ? 'd-none' : '' ?>">
            <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#form-input-tugas" id="tombol-tambah-tugas">Input Data</a>
            <div class="flash-update mt-2 mb-0">
            </div>
        </div>
        <div class="search-tugas">
            <label class="text-dark">Search :</label>
            <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-tugas">
        </div>
        <div class="konten-tugas">
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
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body konten-detail-task">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium praesentium perspiciatis quo optio cupiditate quasi illo sequi labore, harum, vero, aperiam soluta qui dolores autem cumque asperiores eaque delectus odio? With supporting text below as a natural lead-in to additional content.</p>
                    <div class="tombol-task">
                        <a href="#" class="btn btn-sm btn-primary">Ubah</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body konten-detail-task">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <div class="tombol-task">
                        <a href="#" class="btn btn-sm btn-primary">Ubah</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hasil">

    </div>
</div>

<?= $this->endSection(); ?>