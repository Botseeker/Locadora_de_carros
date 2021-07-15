<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{

    public function index()
    {   
        $marca = Marca::all();
        return $marca;
    }

    public function store(Request $request, Marca $marca)
    {   
        $marca = Marca::create($request->all());
        return $marca;
    }

    public function show($id)
    {
        $marca = Marca::findOrFail($id);
        return $marca;
    }

    public function update(Request $request, Marca $marca)
    {
        /* print_r($request->all()); //Dado atualizado
        echo '<hr>';
        print_r($marca->getAttributes()); //Dado antigo
         */
        $marca->update($request->all());
        return $marca;
    }

    public function destroy(Marca $marca)
    {       
        $marca->delete();
        return ['msg' => 'Marca removida com sucesso!'];
    }
}
