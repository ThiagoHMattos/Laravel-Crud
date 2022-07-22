<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    protected $model;
    public function __construct(Empresa $empresa)
    {
        $this->model = $empresa;

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
            return response('Empresa criada com sucesso no index!');
        } catch (\Throwable $th){
            throw $th;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = $this->model->find($id);
        if(!$empresa)
        {
            return response('Empresa não localizada.');
        }
        return response($empresa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empresa = $this->model->find($id);
        if(!$empresa)
        {
            return response('Empresa não encontrada!');
        }
        try {
            $dados = $request->all();
            $empresa->fill($dados)->save();
            return response('Cliente Atualizado!');
        } catch (\Throwable $th) {
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
        $empresa = $this->model->find($id);
        if (!$empresa)
        {
            return response('Empresa não encontrada');
        }
        try {
            $empresa->delete();
            return response('Empresa excluída com êxito!');
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
