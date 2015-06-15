<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return \View::make('pages.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
             'name' => 'required|min:3',
             'mail' => 'required|email'
        ];

        $messages = [
            'name.required'        => 'O nome é obrigatório',
            'name.min'               => 'O nome precisa ter mais de 3 caracteres',
            'email.required'        => 'O email é obrigatório',
            'email.email'              => 'E-mail inválido',
            'password.required' => 'A senha é obrigatória'
        ];

        $data = \Request::all();

        $validator = \Validator::make($data, $rules, $messages);

        if($validator->fails()){
            return redirect('usuario#toregister')->withErrors($validator->errors());
        }else{
            return redirect('usuario')->with('message', 'sucesso');    
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
