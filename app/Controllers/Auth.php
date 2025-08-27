<?php
   namespace App\Controllers;

   use App\Models\UserModel;

   class Auth extends BaseController
   {
       public function login()
       {
           return view('login');
       }

       public function authenticate()
       {
           $model = new UserModel();
           $username = $this->request->getPost('username');
           $password = $this->request->getPost('password');

           $user = $model->where('correo', $username)->first();

           if ($user && password_verify($password, $user['contrasena'])) {
               session()->set('loggedIn', true);
               session()->set('user', $user);
               return redirect()->to('/dashboard');
           } else {
               return redirect()->back()->with('error', 'Credenciales incorrectas');
           }
       }

       public function logout()
       {
           session()->destroy();
           return redirect()->to('/login');
       }
   }
   