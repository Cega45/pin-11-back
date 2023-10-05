<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::get();

        $data = $clientes->map(function ($cliente) {
            return[
                'id' => $cliente-id,
                'nombre' => $clienre->nombre,
            ];
        });

        return response()->json([
            'mensaje' => 'Listado de clientes que enviaron consultas',
            'data' =>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }    

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'phone' => 'required|max:255',
            'message' => 'required|max:255',
        ]);

        if($validateData) {
            $cliente = Cliente::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message
            ]);
        }

        //Send emails
        $details = [
            'name' => $request->name
        ];

        Mail::to('celeste_cga@hotmail.com')->send(new \App\Mail\nameEmail($details));


        return response()->json([
            'mensaje' => 'La consulta se registro correctamente',
            'data' => [
                'nombre' => $cliente->name
            ]
        ]);
    }
 
    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
