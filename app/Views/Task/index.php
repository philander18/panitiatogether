<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="konten-plan">
    <div class="search-task">
        <label class="text-dark">Search :</label>
        <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keywordtask" name="keywordtask">
        <a class="btn btn-sm btn-primary fw-bold" href="" role="button">Tambah</a>
    </div>
    <div class="konten-task">
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

<?= $this->endSection(); ?>