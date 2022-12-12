<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'nama'          => 'required|min_length[3]|max_length[20]',
            'password'      => 'required|min_length[6]|max_length[20]',
            'telepon'       => 'required|min_length[3]|max_length[20]',
            'alamat'        => 'required|min_length[3]|max_length[100]',
            'email'         => 'required|min_length[6]|max_length[30]|valid_email|is_unique[users.user_email]',
            'confpassword'  => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'username'     => $this->request->getVar('nama'),
                'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'telepon'    => $this->request->getVar('telepon'),
                'alamat'    => $this->request->getVar('alamat'),
                'email'    => $this->request->getVar('email'),

            ];
            $model->save($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
    }
}
