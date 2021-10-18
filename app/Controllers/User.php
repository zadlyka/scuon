<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $usermodel, $session;
    public function __construct()
    {
        $this->usermodel = new UserModel();
    }

    public function index()
    {
        return view('index');
    }

    public function login()
    {
        $userid = $this->request->getPost('id');
        $password = $this->request->getPost('password');
        $user = $this->usermodel->find($userid);

        if ($user) {
            if ($user['password'] == md5($password)) {
                session()->set([
                    'id' => $user['userid'],
                    'nama' => $user['nama'],
                    'jabatan' => $user['jabatan'],
                    'jatah_cuti' => $user['jatah_cuti'],
                    'logged_in' => true
                ]);

                if ($user['role'] === 'Admin') {
                    return redirect()->to('/admin');
                }

                return redirect()->to('/pegawai');
            } else {
                session()->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> Password salah.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> ID Tidak ditemukan.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            return redirect()->to('/');
        }
    }

    public function register()
    {
        $userid = $this->request->getPost('id');

        if (!$this->usermodel->find($userid)) {

            $this->usermodel->save([
                'userid' => $userid,
                'nama' => $this->request->getPost('nama'),
                'jabatan' => $this->request->getPost('jabatan'),
                'role' => 'Pegawai',
                'password' => md5($this->request->getPost('password')),
            ]);

            session()->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Registered!</strong> Akun telah dibuat.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } else {
            session()->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> ID telah digunakan.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        }

        return redirect()->to('/');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
