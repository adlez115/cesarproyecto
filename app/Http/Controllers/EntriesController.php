<?php

namespace App\Http\Controllers;

use App\Models\Entries;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EntriesController extends Controller
{
    public function obtenerAllEntries(){

        //$usuarios = Users::with('citas')->get();
        $entries = Entries::all();
        return $entries;
    }

    public function crearEntries(Request $request){
        $data = $this->validateRequestCrear($request);

        $entries = Entries::create($data);
            return response([
                'message'=>'se creo con exito el Entry',
                'id'=> $entries['id']
            ], 201);
        }

    public function modificarEntries(Request $request, $id){
        $entries = Entries::find($id);
        if(!$entries){
            return response([
                'message'=>'Entry no encontrado'
            ],404);
        }

        $data = $this->validateRequestModificar($request);

        $entries->update($data);

        return response([
            'message'=>'Se modifico el entry'
        ]);
    }

    public function eliminarEntries($id){
        $entries = Entries::find($id);
        if(!$entries){
            return response([
                'message'=>'No encontrado'
            ],404);
        };

        $entries->delete();

        return response([
            'message'=>'Entry Eliminado'
        ]);
    }

    public function validateRequestCrear(Request $request){
        return $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|string',
            'image' => 'required|string'
        ]);
        }

    public function validateRequestModificar(Request $request){
        return $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|string',
            'image' => 'required|string'
        ]);
        }
}
