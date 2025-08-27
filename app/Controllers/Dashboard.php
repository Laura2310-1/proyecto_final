<?php
   namespace App\Controllers;

   class Dashboard extends BaseController
   {
       public function index()
       {
           if (!session()->get('loggedIn')) {
               return redirect()->to('/login');
           }
           return view('dashboard');
       }
   }
   