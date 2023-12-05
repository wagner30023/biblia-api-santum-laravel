<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Versiculo as ControllersVersiculo;
use Illuminate\Http\Request;

use App\Models\Versiculo;
use Illuminate\Support\Facades\Log;

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Versiculo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = Versiculo::create($request->all());
            return response()->json(['registro criado com sucesso', 'data' => $data], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function show($versiculo)
    {
        try {
            $versiculo =  Versiculo::find($versiculo);
            if ($versiculo) {
                $versiculo->livro; // relacionamento que quero trazer na resposta
                // dd($response);
                return $versiculo;
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $versiculo)
    {
        try {
            $data = Versiculo::findOrFail($versiculo);
            Log::error('Dados antes da atualização: ' . json_encode($data));
            $data->update($request->all());

            Log::error('error: ' . json_encode($data));
            // dd($data);
            return response()->json(['registro atualizado com sucesso', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($versiculo)
    {
        try {
            $data = Versiculo::destroy($versiculo);
            return response()->json(['registro atualizado com sucesso', 'data' => $data], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
