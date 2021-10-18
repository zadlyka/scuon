<?= $this->extend('layout/pegawai'); ?>
<?= $this->section('content'); ?>

<main class="container">
    <section class="mb-3">
        <div class="container bg-light rounded-3">
            <div class="row p-5">
                <div class="col-lg-6 align-self-center mb-3">
                    <img src="<?= base_url('assets/img/working.svg'); ?>" id="homeIMG">
                </div>
                <div class="col-lg-6">
                    <h3 class="display-5">SCUON - Sistem Cuti Online</h3>
                    <p class="lead">Mempermudah Pengajuan Cuti Pegawai</p>
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ajuanModal">Buat Ajuan</a>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-3">
        <div class="row">
            <div class="col-sm-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Ajuan yang Disetujui</h5>
                        <p class="card-text"><?= count($disetujui); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Ajuan yang Diproses</h5>
                        <p class="card-text"><?= count($proses); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Ajuan yang Ditolak</h5>
                        <p class="card-text"><?= count($ditolak); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Jatah Cuti yang Tersisa Bulan Ini</h5>
                        <p class="card-text"><?= $jatah_cuti; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="container pt-3 mt-4 text-muted text-center border-top">
    &copy; 2021
</footer>

<?= $this->endSection(''); ?>