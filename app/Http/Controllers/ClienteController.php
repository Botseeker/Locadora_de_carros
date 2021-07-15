<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $cliente = Cliente::get();
    }

    public function store(Request $request)
    {
        {
            $data = $request->input();
            $data['name'];
            $cliente = Cliente::create(
                $data 
            );
            return 'Crecudo Criado';
        }
    }

    public function show(Cliente $cliente)
    {
        //
    }

    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    public function destroy(Cliente $cliente)
    {
        //
    }
}
