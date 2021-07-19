<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
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

    public function update(Request $request, Cliente $clientes)
    {
        $clientes->update($request->all());
        return $clientes;
    }

    public function destroy($id)
    {
        $clientes = Cliente::find($id);
        $clientes->delete();
    }
}
