<?= $this->extend('layout/pegawai'); ?>
<?= $this->section('content'); ?>
<main class="container">
    <section>
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

        <div class="row">
            <div class="col-lg-2 mb-3">
                <button class="btn btn-success" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajuanModal">Buat Ajuan</button>
            </div>
            <div class="col-lg-10">
                <div class="input-group mb-3">
                    <input type="text" class="form-control cariAjuan" name="cari" placeholder="Cari Ajuan">
                    <button class="btn btn-warning" type="button" id="btnCariAjuanPegawai">Search</button>
                </div>
            </div>
        </div>

        <div class="row table-responsive">
            <table class="table text-center ajuanTable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tanggal Submit</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Waktu Cuti</th>
                        <th scope="col">Status Ajuan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ajuan as $data) : ?>
                        <tr>
                            <td><?= $data['ajuanid']; ?></td>
                            <td><?= $data['created_at']; ?></td>
                            <td><?= $data['keterangan']; ?></td>
                            <td><?= $data['cuti_mulai'] . ' s.d. ' . $data['cuti_akhir']; ?> </td>
                            <td><?= $data['status']; ?></td>
                            <td>
                                <a href="<?= base_url('pegawai/delete/' . $data['ajuanid']) ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin untuk menghapus ajuan ?')">Hapus</a>
                                <a href="<?= base_url('pegawai/cetak/' . $data['ajuanid']) ?>" class="btn btn-outline-primary">Cetak Bukti</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
<?= $this->endSection(''); ?>