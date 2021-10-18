<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>

<main class="container">
    <section>
        <div class="row">
            <div class="input-group mb-3">
                <input type="text" class="form-control cariPegawai" name="cari" placeholder="Cari Ajuan">
                <button class="btn btn-warning" type="button" id="btnCariDaftar">Search</button>
            </div>
        </div>

        <div class="row table-responsive">
            <table class="table text-center pegawaiTable">
                <thead>
                    <tr>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">ID Pegawai</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Jatah Cuti</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pegawai as $data) : ?>
                        <tr>
                            <td> <?= $data['nama']; ?> </td>
                            <td> <?= $data['userid']; ?> </td>
                            <td> <?= $data['jabatan']; ?> </td>
                            <td> <?= $data['jatah_cuti']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/deletepegawai/' . $data['userid']); ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin untuk menghapus ajuan ?')">D</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?= $this->endSection(''); ?>