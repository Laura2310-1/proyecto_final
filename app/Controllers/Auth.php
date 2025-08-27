<?php
namespace App\Controllers;
use App\Models\UsuarioModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function authUser()
    {
        $usuarioModel = new UsuarioModel();
        $correo = $this->request->getPost('correo');
        $password = $this->request->getPost('password');

        $usuario = $usuarioModel->where('correo', $correo)->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            session()->set([
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'rol' => $usuario['rol'],
                'isLoggedIn' => true
            ]);


            if ($usuario['rol'] == 'admin') {
                return redirect()->to('/dashboard/admin');
            } elseif ($usuario['rol'] == 'trabajador') {
                return redirect()->to('/dashboard/trabajador');
            } else {
                return redirect()->to('/dashboard/cliente');
            }
        } else {
            return redirect()->back()->with('error', 'Usuario o contraseña incorrectos');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
