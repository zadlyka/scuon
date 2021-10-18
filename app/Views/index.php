<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/img/profile.svg'); ?>" type="image/svg">
    <title>SCUON`</title>
</head>

<body>
    <div class="container">
        <header class="border-bottom py-3 m-3">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none display-6">SCUON<span class="text-success">`</span></a>
        </header>

        <?php if (session()->getFlashData('alert')) {
            echo session()->getFlashData('alert');
        } ?>

        <main>
            <div class="container bg-light rounded-3">
                <div class="row p-5">
                    <div class="col-lg-6 align-self-center mb-3">
                        <img src="<?= base_url('assets/img/working.svg'); ?>" id="homeIMG">
                    </div>
                    <div class="col-lg-6">
                        <h3 class="display-5">SCUON - Sistem Cuti Online</h3>
                        <p class="lead">Mempermudah Pengajuan Cuti Pegawai</p>
                        <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                        <a href="" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a>
                    </div>
                </div>
            </div>
        </main>

        <footer class="pt-3 mt-4 text-muted text-center border-top">
            &copy; 2021
        </footer>

        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('user/login'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="id" class="form-label">User ID / ID Pegawai</label>
                                <input type="text" class="form-control" name="id" placeholder="User ID">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Register Modal -->
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Register</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('user/register'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="id" class="form-label">User ID / ID Pegawai</label>
                                <input type="text" class="form-control" name="id" placeholder="User ID">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                            </div>
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" placeholder="Jabatan">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>