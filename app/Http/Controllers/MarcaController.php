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

        $imagem = $request->file('imagem');
        $imagem_urn = $imagem->store('imagens','public');

        $marca = $this->marca->create([
            'nome' => $request->nome,
            'imagem' => $imagem_urn
        ]);
        return response()->json($marca, 201);
    }
        
    // $marca->nome = $request->nome; //(outro metodo de recuperar os dados)
    // $marca->imagem = $imagem_urn;
    // $marca->save();
        
    
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
        if($request->method() === 'PATCH') {
            

            $regrasDinamicas = array();

            //percorrer todas as regras definidas no model
            foreach($marca->rules() as $input => $regra) {
                //Coletar apenas as regras daplicáveis aos parametros parciais da requisição PATCH
                if(array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
                
            }
            
            $request->validate($regrasDinamicas, $marca->feedback());

            } else {
            $request->validate($marca->rules(), $marca->feedback());
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
