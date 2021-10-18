<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/img/profile.svg'); ?>" type="image/svg">
    <title>SCUON`</title>
</head>

<body>
    <header class="mb-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
            <div class="container">
                <a class="navbar-brand display-6" href="#">SCUON<span class="text-success">`</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link 
                            <?php if ($menu_active == 'home') {
                                echo 'active';
                            } ?>" aria-current="page" href="<?= base_url('admin'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link 
                            <?php if ($menu_active == 'ajuan') {
                                echo 'active';
                            } ?>" href="<?= base_url('admin/ajuan'); ?>">Ajuan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link 
                            <?php if ($menu_active == 'daftar') {
                                echo 'active';
                            } ?>" href="<?= base_url('admin/daftar'); ?>">Daftar Pegawai</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Panduan</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?= base_url('assets/img/profile.svg'); ?>" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="userMenu">
                                <li><a class="dropdown-item" href="#"><?= session()->get('nama'); ?></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('user/logout'); ?>">Logout out</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
        <?php if (session()->getFlashData('alert')) {
            echo session()->getFlashData('alert');
        } ?>
    </header>

    <?= $this->renderSection('content'); ?>

    <!-- Modal -->
    <div class="modal fade" id="detailajuanModal" tabindex="-1" aria-labelledby="detailajuanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailajuanModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID Pegawai</label>
                        <input type="text" class="form-control" name="id" id="idPegawai" placeholder="ID Pegawai">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="namaPegawai" placeholder="Nama Lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" id="jabatanPegawai" placeholder="Jabatan">
                    </div>
                    <div class="mb-3">
                        <label for="waktu_cuti" class="form-label">Waktu Cuti</label>
                        <input type="text" class="form-control" name="waktu_cuti" id="waktuCutiPegawai" placeholder="Waktu Cuti">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keteranganPegawai" placeholder="Keterangan" required></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
</body>

</html>