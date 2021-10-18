<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>

<main class="container">
    <section>
        <div class="row">
            <div class="input-group mb-3">
                <input type="text" class="form-control cariAjuan" name="cari" placeholder="Cari Ajuan">
                <button class="btn btn-warning" type="button" id="btnCariAjuanAdmin">Search</button>
            </div>
        </div>

        <div class="row table-responsive">
            <table class="table text-center ajuanTable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tanggal Submit</th>
                        <th scope="col">Waktu Cuti</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">Status Ajuan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ajuan as $data) : ?>
                        <tr>
                            <td><?= $data['ajuanid']; ?></td>
                            <td><?= $data['created_at']; ?></td>
                            <td><?= $data['cuti_mulai'] . ' s.d. ' . $data['cuti_akhir']; ?> </td>
                            <td><?= $data['nama_pegawai']; ?></td>
                            <td><?= $data['status']; ?></td>
                            <td>
                                <a href="" class="btn btn-outline-dark" data-id="<?= $data['userid']; ?>" data-nama="<?= $data['nama_pegawai']; ?>" data-jabatan="<?= $data['jabatan']; ?>" data-waktu="<?= $data['cuti_mulai'] . ' s.d. ' . $data['cuti_akhir']; ?>" data-keterangan="<?= $data['keterangan']; ?>" data-bs-toggle="modal" data-bs-target="#detailajuanModal" id="btnDetailAjuan">D</a>
                                <a href="<?= base_url('admin/delete/' . $data['ajuanid']) ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin untuk menghapus ajuan ?')">D</a>
                                <a href="<?= base_url('admin/confirm/' . $data['ajuanid']) . '/Disetujui' ?>" class="btn btn-outline-warning" onclick="return confirm('Apakah anda yakin untuk menyetujui ajuan ?')">Y</a>
                                <a href="<?= base_url('admin/confirm/' . $data['ajuanid']) . '/Ditolak' ?>" class="btn btn-outline-success" onclick="return confirm('Apakah anda yakin untuk menolak ajuan ?')">X</a>
                                <a href="<?= base_url('admin/cetak/' . $data['ajuanid']) ?>" class="btn btn-outline-primary">C</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?= $this->endSection(''); ?>