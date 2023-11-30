<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livro;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return Livro::all();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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

            $data = $request->all();
            if ($data) {
                $create = Livro::create($data);
                return response()->json([
                    'message' => 'Livro cadastrado com sucesso.',
                    'create' => $create
                ], 201);
            }

            return response()->json([
                'message' => 'Erro ao cadastrar o livro',
            ], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function show($livro)
    {
        try {
            $data = Livro::find($livro);

            if ($data) {
                return $data;
            }

            return response()->json([
                'message' => 'Erro ao pesquisar o livro não encontrados'
            ], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $livro)
    {
        try {
            $livro = Livro::find($livro);

            if ($livro) {
                $livro->update($request->all());
                return $livro;
            }

            return response()->json(['Erro ao tentado atualizar.', 404]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy($livro)
    {
        try {
            $data = Livro::destroy($livro);
            if($data){
                return response()->json(['dado excluído com sucesso', 'data' => $data], 201);
            }

            return response()->json(['Erro ao tentar deletar o livro.', 404]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
