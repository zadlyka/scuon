<?php

namespace App\Controllers;

use App\Models\AjuanModel;
use App\Models\UserModel;
use Dompdf\Dompdf;

class Pegawai extends BaseController
{
    protected $ajuanmodel, $usermodel;
    public function __construct()
    {
        helper('text');
        $this->ajuanmodel = new AjuanModel();
        $this->usermodel = new UserModel();
    }

    public function index()
    {
        if (date('d') == '01') {
            $this->usermodel->save([
                'userid' => session()->get('id'),
                'jatah_cuti' => '3'
            ]);
        }

        if (!session()->get('logged_in')) {
            session()->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> Silahkan login terlebih dahulu.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            return redirect('/');
        }

        $user = $this->usermodel->find(session()->get('id'));
        $jatah_cuti = (int) $user['jatah_cuti'];

        $data = [
            'menu_active' => 'home',
            'disetujui' => $this->ajuanmodel->where('userid', session()->get('id'))->where('status', 'Disetujui')->findAll(),
            'ditolak' => $this->ajuanmodel->where('userid', session()->get('id'))->where('status', 'Ditolak')->findAll(),
            'proses' => $this->ajuanmodel->where('userid', session()->get('id'))->where('status', 'Proses')->findAll(),
            'jatah_cuti' => $jatah_cuti
        ];

        return view('content/pegawai/index', $data);
    }

    public function ajuan()
    {
        if (!session()->get('logged_in')) {
            session()->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> Silahkan login terlebih dahulu.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            return redirect('/');
        }

        $user = $this->usermodel->find(session()->get('id'));
        $jatah_cuti = (int) $user['jatah_cuti'];

        $data = [
            'menu_active' => 'ajuan',
            'ajuan' => $this->ajuanmodel->where('userid', session()->get('id'))->findAll(),
            'jatah_cuti' => $jatah_cuti
        ];

        return view('content/pegawai/ajuan', $data);
    }

    public function submit()
    {
        $user = $this->usermodel->find(session()->get('id'));
        $jatah_cuti = (int) $user['jatah_cuti'];

        if ($jatah_cuti <= 0) {
            session()->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> Jatah Cuti Telah Habis.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } else {
            do {
                $ajuanid = random_string('numeric', 10);
            } while ($this->ajuanmodel->find($ajuanid));

            $this->ajuanmodel->save(
                [
                    'ajuanid' => $ajuanid,
                    'cuti_mulai' => $this->request->getPost('mulai'),
                    'cuti_akhir' => $this->request->getPost('akhir'),
                    'userid' => session()->get("id"),
                    'nama_pegawai' => session()->get("nama"),
                    'jabatan' => session()->get("jabatan"),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'status' => 'Proses'
                ]
            );

            $jatah_cuti = $jatah_cuti - 1;
            $this->usermodel->save(
                [
                    'userid' => $user['userid'],
                    'jatah_cuti' => $jatah_cuti
                ]
            );

            session()->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Submited!</strong> Ajuan telah submit.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        }

        return redirect()->to('/pegawai/ajuan/');
    }

    public function delete($id)
    {
        session()->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Deleted!</strong> Ajuan telah dihapus.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');

        $this->ajuanmodel->delete($id);
        return redirect()->to('/pegawai/ajuan/');
    }

    public function cetak($id)
    {
        $ajuan = $this->ajuanmodel->find($id);
        $data = [
            'ajuan' => $ajuan
        ];

        $filename = $ajuan['ajuanid'] . '-scuon';
        $dompdf = new Dompdf();
        $dompdf->set_base_path(base_url('assets/bootstrap/css/bootstrap.min.css'));
        $dompdf->loadHtml(view('layout/cetak', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);

        return redirect()->to('/pegawai/ajuan/');
    }
}
