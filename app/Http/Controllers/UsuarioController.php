<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(5);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('usuarios.crear', compact('roles'));
    }

    public function store(Request $request){
    
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['estado'] = 0;
        $input['intentoSesion'] = 0;
        

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('usuarios.editar', compact('user', 'roles', 'userRole'));
    
    }

    public function update(Request $request, $id){
    
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        if (!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index');
    
    }
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index');
    }
    public function bloqueado(){
        return view('usuarios.bloqueado');
    }

    public function showResetpassword(){
        $id = auth()->id();
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('usuarios.resetcontraseña', compact('user', 'roles', 'userRole'));
        
    }

    public function resetpassword(Request $request){
        
        $request->validate([
            'passwordac' => 'required|regex:/^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[$@$!%?&#.$($)$-$_])[A-Za-z\d$@$!%?&#.$($)$-$_]{8,15}$/',
            'confirmpassword' => 'required|regex:/^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[$@$!%?&#.$($)$-$_])[A-Za-z\d$@$!%?&#.$($)$-$_]{8,15}$/|confirmed',
        ],
        [
            'passwordac.required' => 'El campo Contraseña Actual es obligatorio.',
            'passwordac.regex' => 'La Contraseña Actual no coincide.',

            'confirmpassword.required' => 'El campo Contraseña Nueva es obligatorio.',
            'confirmpassword.regex' => 'La Contraseña Nueva debe tener entre 8 y 15 caracteres, al menos un número, al menos una minúscula, al menos una mayúscula y al menos un caracter especial.',
            'confirmpassword.confirmed' => 'Las contraseñas nuevas deben de coincidir.',
        ]);
 
        $user = Auth::user();

        if (!Hash::check($request->passwordac, $user->password)) {
            return redirect()->back()->withErrors(['contrasenia_actual' => 'La contraseña actual no coincide.']);
        }

        $user->password = Hash::make($request->confirmpassword);
        $user->save();

        return redirect()->back()->with('success_cambio_contrasenia', '¡Contraseña cambiada exitosamente!');
    }
        

    public function updatePassword(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8|confirmed',
            'roles' => 'required|array'
        ]);
    
        $input = $request->all();
    
        // Manejo de Contraseña
        if (!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }
    
        // Actualización del Usuario
        $user = User::find($id);
        $user->update($input);
    
        // Eliminar roles existentes
        DB::table('model_has_roles')->where('model_id', $id)->delete();
    
        // Asignar nuevos roles
        $user->assignRole($request->input('roles'));
    
        // Cerrar sesión
        Auth::logout();
    
        // Redirigir a la página de inicio de sesión u otra página
        return redirect()->route('login')->with('success', 'Contraseña y perfil actualizados exitosamente. Por favor, vuelve a iniciar sesión.');
    }
    
}

