<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{   
    public function __construct(Marca $marca) {
        $this->marca = $marca;
    }

    public function index()
    {   
        $marca = $this->marca->all();
        return $marca;
    }
    /* 
    @param \Illuminate\Http\Request $request
    @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {   
        $request->validate($this->marca->rules(), $this->marca->feedback());

        $marca = $this->marca->create($request->all());
        return response()->json($marca, 201);
        
    }
    /* 
    *
    * @param Integer
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $marca = $this->marca->find($id);

        if ($marca === null) {
            return response()->json(['erro' => 'Recurso pequisado não existe.'], 404);
        }
            return response()->json($marca, 302);
    }
    /*
    *
    * @param Integer
    * 
    */      
    public function update(Request $request, $id)
    {   
        $marca = $this->marca->find($id);

        if($marca === null) {
            return response()->json(['erro' => 'Impossivel realizar a atualização. Recurso solicitado não existe'], 404);
        }

        $marca->update($request->all());
            return response()->json($marca, 200);
    }

    /* 
    * @param Integer
    */
    public function destroy($id)
    {       
        $marca = $this->marca->find($id);

        if($marca === null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. Recurso solicitado não existe'], 404);
        }

        $marca->delete();
            return response()->json(['Deletada' => 'Marca removida com sucesso!'], 200);
        
    }
}
