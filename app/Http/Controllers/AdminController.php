<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Configuracion;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(){
        $total_configuraciones = Configuracion::count();
         $total_roles = Role::count();
         $total_usuarios = User::count();
          $total_clientes = Cliente::count();
        return view('admin.index', compact('total_configuraciones', 'total_roles', 'total_usuarios', 'total_clientes'));
    }
}
