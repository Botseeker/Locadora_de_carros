<?php

namespace App\Http\Controllers;


use App\Models\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{   
    public function __construct(Modelo $modelos) {
        $this->modelos = $modelos;
    }
    public function index()
    {
        $modelos = $this->modelos->all();
        return $modelos;
    }

    public function store(Request $request, Modelo $modelos)
    {
        $modelos = $this->modelos->all();
        return $modelos;      
    }
    /* 
    * @param Integer
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $modelos= $this->marca->findOrFail($id);
        return $modelos;
    }

    public function update(Request $request, $id)
    {
        $modelos = $this->modelos->find($id);
        $modelos->update($request->all());
        return $modelos;  
    }

    public function destroy($id)
    {   
        $modelos = $this->modelos->find($id);
        $modelos->delete();
        return ['msg' => 'Marca removida com sucesso!'];
    }
}
