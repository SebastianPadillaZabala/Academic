<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Alumno;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Validator;

class RegisterController extends BaseController
{
    public function register(Request $request)
    {
        $atributos = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        //creando usuario
        $user = User::create([
            'success' => true,
            'name' => $atributos['name'],
            'apellido' => "",
            'celular' => "",
            'email' => $atributos['email'],
            'tipo' => 'Alumno',
            'password' => bcrypt($atributos['password'])
        ]);

        $alumno = new Alumno();
        $alumno->cantidad_cursos = 0;
        $alumno->suscripcion = 'ninguna';
        $alumno->id_user = $user->id;
        $alumno->save();

        $response = [
            //'success' => true,
            'token' => $user->createToken('MyApp')->accessToken,
            'id' => $user->id,
            'name' => $user->name,
            'user' => $user,
        ];

        return response()->json($response, 200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
             /** @var \App\Models\MyUserModel $user **/
            $user = Auth::user();
            if($user->tipo == 'Alumno'){
                $response = [
                    'success' => true,
                    'token' => $user->createToken('MyApp')->accessToken,
                    'id' => $user->id,
                    'name' => $user->name,
                    'user' => $user,
                ];
                return response()->json($response, 200);
            }else {
                return $this->sendError('No autorizado', ['error' => 'Credenciales invalidas: solo estudiantes']);
            }
        } else {
            return $this->sendError('No autorizado ', ['error' => 'Credenciales invalidas']);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->token();
        $token->revoke();
        $response = ["message" => "Has cerrado sesion"];

        return response($response, 200);

    }

    public function user() {
        $response = [
            'user' => auth()->user(),
        ];
        return response($response, 200);
    }

}
