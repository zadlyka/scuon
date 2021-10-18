<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCUON`</title>

    <style>
        header {
            text-align: center;
            margin-bottom: 10px;
            border: 1px solid black;
        }

        main {
            border: 1px solid black;
            margin-bottom: 10px;
        }


        footer {
            text-align: center;
            border: 1px solid black;
        }

        table {
            margin: auto;
            padding: 10px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="main">
        <header>
            <h2>SCUON</h2>
            <h6>Bukti Pengajuan Cuti</h6>
        </header>

        <main>
            <div class="container">
                <div class="row">
                    <table class="table text-center ajuanTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tanggal Submit</th>
                                <th scope="col">Waktu Cuti</th>
                                <th scope="col">ID Pegawai</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Jabatan Pegawai</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Status Ajuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $ajuan['ajuanid']; ?></td>
                                <td><?= $ajuan['created_at']; ?></td>
                                <td><?= $ajuan['cuti_mulai'] . ' s.d. ' . $ajuan['cuti_akhir']; ?></td>
                                <td><?= $ajuan['userid']; ?></td>
                                <td><?= $ajuan['nama_pegawai']; ?></td>
                                <td><?= $ajuan['jabatan']; ?></td>
                                <td><?= $ajuan['keterangan']; ?></td>
                                <td><?= $ajuan['status']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <footer class="pt-3 mt-4 text-muted text-center border-top">
            &copy; 2021
        </footer>
</body>

</html>