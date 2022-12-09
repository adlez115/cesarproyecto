<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoriesController extends Controller
{
    public function obtenerAllCategories(){
        //$usuarios = Users::with('citas')->get();
        $categories = Categories::all();
        return $categories;
    }

    public function crearCategories(Request $request){
        $data = $this->validateRequestCrear($request);

        $categories = Categories::create($data);
            return response([
                'message'=>'se creo con exito la Category',
                'id'=> $categories['id']
            ], 201);
        }

    public function modificarCategories(Request $request, $id){
        $categories = Categories::find($id);
        if(!$categories){
            return response([
                'message'=>'Category no encontrado'
            ],404);
        }

        $data = $this->validateRequestModificar($request);

        $categories->update($data);

        return response([
            'message'=>'Se modifico la Category'
        ]);
    }

    public function eliminar($id){
        $categories = Categories::find($id);
        if(!$categories){
            return response([
                'message'=>'No encontrado'
            ],404);
        };

        $categories->delete();

        return response([
            'message'=>'Category Eliminada'
        ]);
    }

    public function validateRequestCrear(Request $request){
        return $request->validate([
            'name' => 'required|string',
            'description' => 'required|string'
        ]);
        }

    public function validateRequestModificar(Request $request){
        return $request->validate([
            'name' => 'required|string',
            'description' => 'required|string'
        ]);
        }
}
