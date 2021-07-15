<?php

namespace App\Http\Controllers;

use App\Models\Locacao;
use Illuminate\Http\Request;

class LocacaoController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return $clientes;
    }

    public function store(Request $request)
    {
        $clientes = Cliente::create($request->all());
        return $clientes;          
    }

    public function show($id)
    {
        $clientes = Cliente::findOrFail($id);
        return $clientes;
    }

    public function update(Request $request, $id)
    {
        $user = $request->input();
        Cliente::findOrFail($id)->update($user);
        return Cliente::findOrFail($id);   
    }

    public function destroy($id)
    {
        $clientes = Cliente::find($id);
        $clientes->delete();
    }
}
