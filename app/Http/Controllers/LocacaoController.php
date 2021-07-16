<?php

namespace App\Http\Controllers;

use App\Models\Locacao;
use Illuminate\Http\Request;

class LocacaoController extends Controller
{   
    public function __construct(Locacao $locacao) {
        $this->locacao = $locacao;
    }
    public function index()
    {
        $locacao = $this->locacao->all();
        return $locacao;
    }

    public function store(Request $request, Locacao $locacao)
    {
        $locacao = $this->locacao->create($request->all());
        return $locacao;        
    }
    /* 
    *
    * @param Integer
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $locacao = $this->locacao->find($id);
        return $locacao;
    }
    /*
    *
    * @param Integer
    * 
    */ 
    public function update(Request $request, $id)
    {
        $locacao = $this->locacao->find($id);
        $locacao->update($request->all());
        return $locacao;  
    }
    /* 
    * @param Integer
    */
    public function destroy($id)
    {
        $locacao = $this->locacao->find($id);
        $locacao->delete();
        return ['Marca removida com sucesso!'];
    }
}
