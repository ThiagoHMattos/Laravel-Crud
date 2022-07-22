<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{

    public function __construct(Funcionario $funcionario)
    {
        $this->model = $funcionario;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response($this->model->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->model->create($request->all());
            return response('Funcionário criado com sucesso!!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = $this->model->find($id);
        if(!$funcionario)
        {
            return response ('Funcionário não localizado.');
        }
        return response ($funcionario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $funcionario = $this->model->find($id);
        if(!$funcionario)
        {
            return response ('Funcionário não encontrado.');

        }
        try {
            $dados = $request->all();
            $funcionario->fill($dados)->save();
            return response ('Funcionário Atualizado com sucesso!');
        } catch (\Throwable $th){
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = $this->model->find($id);
        if (!$funcionario) {
            return response('Funcionário não encontrado');
        }
        try {
            $funcionario->delete();
            return response('Funcionário excluído com êxito!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
