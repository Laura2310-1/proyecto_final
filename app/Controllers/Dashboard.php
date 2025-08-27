<?php
namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        
        return $this->redirectToDashboard(session()->get('rol'));
    }
    
    public function admin()
    {
        if (!session()->get('isLoggedIn') || session()->get('rol') !== 'admin') {
            return redirect()->to('/login');
        }
        return view('dashboard/admin');
    }
    
    public function trabajador()
    {
        if (!session()->get('isLoggedIn') || session()->get('rol') !== 'trabajador') {
            return redirect()->to('/login');
        }
        return view('dashboard/trabajador');
    }
    
    public function cliente()
    {
        if (!session()->get('isLoggedIn') || session()->get('rol') !== 'cliente') {
            return redirect()->to('/login');
        }
        return view('dashboard/cliente');
    }
    
    private function redirectToDashboard($rol)
    {
        switch ($rol) {
            case 'admin':
                return redirect()->to('/dashboard/admin');
            case 'trabajador':
                return redirect()->to('/dashboard/trabajador');
            case 'cliente':
                return redirect()->to('/dashboard/cliente');
            default:
                session()->destroy();
                return redirect()->to('/login')->with('error', 'Rol no válido');
        }
    }
}