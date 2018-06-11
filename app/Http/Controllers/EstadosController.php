<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstadosController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'string|max:2|unique:estados|required',
        ]);
    }

    /**
     * INDEX - list estados
     *
     * @return view estados.index
     */
    public function index()
    {
        $estados = Estado::paginate();

        return view('estados.index', compact('estados'));
    }

    /**
     * CREATE - form estado
     *
     * @return view estados.form
     */
    public function create()
    {
        

        return view('estados.form');
    }

    /**
     * STORE - store estado
     *
     * @param  Request $request 
     * @return redirect estados.create
     */
    public function store(Request $request)
    {
        Estado::create($request->all());

        $request->session()->flash(
            'msgSuccess', 
            trans('laravel-crud::alert.stored', ['element' => 'Estado'])
        );

        return redirect('estados/create');
    }

    /**
     * EDIT - edit estado
     *
     * @param  integer $id estado->id
     * @return view estados.form
     */
    public function edit($id)
    {
        $estado = Estado::findOrFail($id);

        

        return view('estados.form', compact('estado'));
    }

    /**
     * UPDATE - update estado
     *
     * @param  integer $id      estado->id
     * @param  Request $request 
     * @return view             estados.form
     */
    public function update($id, Request $request)
    {
        $estado = Estado::findOrFail($id);

        $estado->update($request->all());

        $request->session()->flash(
            'msgSuccess', 
            trans('laravel-crud::alert.updated', ['element' => 'Estado'])
        );

        

        return view('estados.form', compact('estado'));
    }

    /**
     * SHOW - show estado
     *
     * @param  integer $id  estado->id
     * @return view         estados.show
     */
    public function show($id, Request $request)
    {
        $estado = Estado::find($id);

        if (!$estado) {            
            $request->session()->flash(
                'msgError', 
                trans('laravel-crud::alert.not-found', ['element' => 'Estado'])
            );

            return redirect('estados');
        }

        return view('estados.show', compact('estado'));
    }

    /**
     * DESTROY - delete estado
     *
     * @param  integer $id      estado->id
     * @return redirect         estados.index
     */
    public function destroy($id, Request $request)
    {
        $estado = Estado::find($id);

        if ($estado) {
            $estado->delete();

            $request->session()->flash(
                'msgSuccess', 
                trans('laravel-crud::alert.deleted', ['element' => 'Estado'])
            );
            
        } else {
            $request->session()->flash(
                'msgError', 
                trans('laravel-crud::alert.not-found', ['element' => 'Estado'])
            );
        }

        return redirect('estados');
    }
}
