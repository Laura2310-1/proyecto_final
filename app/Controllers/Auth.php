<?php
namespace App\Controllers;
use App\Models\UsuarioModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return $this->redirectToDashboard(session()->get('rol'));
        }
        return view('auth/login');
    }

    public function authenticate()  
    {
        $usuarioModel = new UsuarioModel();
        $correo = $this->request->getPost('correo');
        $password = $this->request->getPost('password');

        $usuario = $usuarioModel->where('correo', $correo)->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            session()->set([
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'correo' => $usuario['correo'], // Agregar correo a la sesión
                'rol' => $usuario['rol'],
                'isLoggedIn' => true
            ]);

            return $this->redirectToDashboard($usuario['rol']);
        } else {
            return redirect()->back()->with('error', 'Usuario o contraseña incorrectos');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    private function redirectToDashboard($rol)
    {
        switch ($rol) {
            case 'admin':
                return redirect()->to('/dashboard/admin');
            case 'trabajador':
                return redirect()->to('/dashboard/trabajador');
            default:
                return redirect()->to('/dashboard/cliente');
        }
    }
}