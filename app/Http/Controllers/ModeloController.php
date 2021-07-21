<?php

namespace App\Http\Controllers;


use App\Models\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{   
    public function __construct(Modelo $modelo) {
        $this->modelo = $modelo;
    }
    public function index()
    {
        return response()->json($this->modelo->all(), 200);
        
    }

    public function store(Request $request)
    {
        $modelo = $this->modelo->create($request->all());
        return $modelo;      
    }
    /* 
    * @param Integer
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $modelo= $this->marca->findOrFail($id);
        return $modelo;
    }

    public function update(Request $request, $id)
    {
        $modelo = $this->modelos->find($id);
        $modelo->update($request->all());
        return $modelo;  
    }

    public function destroy($id)
    {   
        $modelo = $this->modelo->find($id);
        $modelo->delete();
        return ['msg' => 'Marca removida com sucesso!'];
    }
}
