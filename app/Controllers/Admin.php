<?php

namespace App\Controllers;

use App\Models\AjuanModel;
use App\Models\UserModel;
use Dompdf\Dompdf;

class Admin extends BaseController
{
    protected $ajuanmodel, $usermodel;
    public function __construct()
    {
        $this->ajuanmodel = new AjuanModel();
        $this->usermodel = new UserModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            session()->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> Silahkan login terlebih dahulu.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            return redirect('/');
        }
        $data = [
            'menu_active' => 'home',
            'disetujui' => $this->ajuanmodel->where('status', 'Disetujui')->findAll(),
            'ditolak' => $this->ajuanmodel->where('status', 'Ditolak')->findAll(),
            'proses' => $this->ajuanmodel->where('status', 'Proses')->findAll()
        ];

        return view('content/admin/index', $data);
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

        $data = [
            'menu_active' => 'ajuan',
            'ajuan' => $this->ajuanmodel->findAll()
        ];

        return view('content/admin/ajuan', $data);
    }

    public function daftar()
    {
        if (!session()->get('logged_in')) {
            session()->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> Silahkan login terlebih dahulu.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            return redirect('/');
        }
        $data = [
            'menu_active' => 'daftar',
            'pegawai' => $this->usermodel->where('role', 'Pegawai')->findAll()
        ];

        return view('content/admin/daftar', $data);
    }

    public function delete($id)
    {
        session()->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Deleted!</strong> Ajuan telah dihapus.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');

        $this->ajuanmodel->delete($id);
        return redirect()->to('/admin/ajuan/');
    }

    public function confirm($id, $confirm)
    {
        $this->ajuanmodel->save(
            [
                'ajuanid' => $id,
                'status' => $confirm
            ]
        );
        return redirect()->to('/admin/ajuan/');
    }

    public function deletepegawai($id)
    {
        session()->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Deleted!</strong> User telah dihapus.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');

        $this->usermodel->delete($id);
        return redirect()->to('/admin/daftar/');
    }

    public function cetak($id)
    {
        $ajuan = $this->ajuanmodel->find($id);
        $data = [
            'ajuan' => $ajuan
        ];

        $filename = $ajuan['ajuanid'] . '-scuon';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('layout/cetak', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);

        return redirect()->to('/pegawai/ajuan/');
    }
}
