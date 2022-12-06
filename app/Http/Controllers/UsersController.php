<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UsersController extends Controller
{
    public function obtenerAllUsuarios(){

        //$usuarios = Users::with('citas')->get();
        $usuarios = Users::all();
        return $usuarios;


    }

    public function crearUsuarios(Request $request){
        $data = $this->validateRequestCrear($request);

        $usuarios = Users::create($data);
            return response([
                'message'=>'se creo con exito el usuario',
                'id'=> $usuarios['id']
            ], 201);
        }

    public function modificarUsuarios(Request $request, $id){
        $usuarios = Users::find($id);
        if(!$usuarios){
            return response([
                'message'=>'usuario no encontrado'
            ],404);
        }

        $data = $this->validateRequestModificar($request);

        $usuarios->update($data);

        return response([
            'message'=>'Se modifico el usuario'
        ]);
    }

    public function eliminarUsuarios($id){
        $usuarios = Users::find($id);
        if(!$usuarios){
            return response([
                'message'=>'No encontrado'
            ],404);
        };

        $usuarios->delete();

        return response([
            'message'=>'Usuario Eliminado'
        ]);
    }

    public function validateRequestCrear(Request $request){
        return $request->validate([
            'role' => 'required|string',
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:3',
            'image' => 'required|string'
        ]);
        }

    public function validateRequestModificar(Request $request){
        return $request->validate([
            'role' => 'required|string',
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:3',
            'image' => 'required|string'
        ]);
        }
}
