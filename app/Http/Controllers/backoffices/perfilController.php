<?php
namespace App\Http\Controllers\backoffices;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class perfilController extends Controller
{
    public function perfil(){
        return view('backoffices.clientes.perfil');
    }
    public function store(User $user,Request $request){
        if($user->rol==1){
            $request->validate([
                'nombre' => 'required|min:20|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\\s]+$/u',
                'p_actual' => 'required|min:8|max:20',
                'password_confirmation' => 'required',
                'password' => 'required|confirmed|max:20|min:8|regex:/^[A-Za-z0-9]+$/u'
            ]);
            //Valido que la contraseña actual
            if(Hash::check( $request->p_actual,Auth::user()->password)){
                if(strcmp($request->p_actual,$request->password) === 0){
                    return redirect()->route('perfil')->with('error_password_igual','Error la contraseña no ha sufrido cambios!');
                }else{
                    $user->nombre = $request->nombre;
                    $user->password = bcrypt($request->password);
                    $user->save();
                    return redirect()->route('perfil')->with('status','Cambio con Exito!');
                }
            }else{
                return redirect()->route('perfil')->with('error_perfil','Error la contraseña actual es incorrecta!');
            } 

        }else{
            App::abort(404);
        }
    }
}
