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

    public function store(Request $request, Marca $marca)
    {   
        $marca = $this->marca->create($request->all());
        return $marca;
    }
    /* 
    *
    * @param Integer
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $marca = $this->marca->find($id);
        return $marca;
    }
    /*
    *
    * @param Integer
    * 
    */      
    public function update(Request $request, $id)
    {   
        $marca = $this->marca->find($id);
        $marca->update($request->all());
        return $marca;
    }

    /* 
    * @param Integer
    */
    public function destroy($id)
    {       
        $marca = $this->marca->find($id);
        $marca->delete();
        return ['Marca removida com sucesso!'];
    }
}
