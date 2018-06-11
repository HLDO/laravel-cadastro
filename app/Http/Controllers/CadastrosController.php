<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CadastrosController extends Controller
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
            'name' => 'string|max:255|required',
            'email' => 'string|max:255|email|unique:cadastros|required',
            'phone' => 'string|max:15|required',
            'address' => 'string|max:255|required',
            'address_nro' => 'integer|required',
            'city' => 'string|max:255|required',
            'state' => 'string|max:2|required',
            'estado_id' => 'integer|required',
            'pobox' => 'string|max:9|required',
            'deleted' => 'tinyint|required',
        ]);
    }

    /**
     * INDEX - list cadastros
     *
     * @return view cadastros.index
     */
    public function index()
    {
        $cadastros = Cadastro::active()->paginate();
        //dd($cadastros);

        return view('cadastros.index', compact('cadastros'));
    }

    /**
     * CREATE - form cadastro
     *
     * @return view cadastros.form
     */
    public function create()
    {
        $estados = Estado::pluck('name', 'id');

        return view('cadastros.form', compact('estados'));
    }

    /**
     * STORE - store cadastro
     *
     *
     * @param  Request $request
     * @return redirect cadastros.create
     */
    public function store(Request $request)
    {
        //Cadastro::create($request->all());
        $cadastro = new Cadastro;
        $cadastro->name = $request->name;
        $cadastro->email = $request->email;
        $cadastro->phone = $this->limpaChars($request->phone);
        $cadastro->address = $request->address;
        $cadastro->address_nro = $request->address_nro;
        $cadastro->city = $request->city;
        $cadastro->state = $request->state;
        $cadastro->estado_id = $request->estado_id;
        $cadastro->pobox = $this->limpaChars($request->pobox);
        $cadastro->save();

        $request->session()->flash(
            'msgSuccess',
            trans('laravel-crud::alert.stored', ['element' => 'Cadastro'])
        );

        return redirect('cadastros/create');
    }

    /**
     * EDIT - edit cadastro
     *
     * @param  integer $id cadastro->id
     * @return view cadastros.form
     */
    public function edit($id)
    {
        $cadastro = Cadastro::findOrFail($id);
        $estados = Estado::pluck('name', 'id');

        return view('cadastros.form', compact('cadastro', 'estados'));
    }

    /**
     * UPDATE - update cadastro
     *
     * @param  integer $id      cadastro->id
     * @param  Request $request
     * @return view             cadastros.form
     */
    public function update($id, Request $request)
    {
        $cadastro = Cadastro::findOrFail($id);
        //$cadastro->update($request->all());
        $estados = Estado::pluck('name', 'id');

        $cadastro->name = $request->name;
        $cadastro->email = $request->email;
        $cadastro->phone = $this->limpaChars($request->phone);
        $cadastro->address = $request->address;
        $cadastro->address_nro = $request->address_nro;
        $cadastro->city = $request->city;
        $cadastro->state = $request->state;
        $cadastro->estado_id = (int)$request->estado_id;
        $cadastro->pobox = $this->limpaChars($request->pobox);
        $cadastro->save();

        $request->session()->flash(
            'msgSuccess',
            trans('laravel-crud::alert.updated', ['element' => 'Cadastro'])
        );

        return view('cadastros.form', compact('cadastro', 'estados'));
    }

    /**
     * SHOW - show cadastro
     *
     * @param  integer $id  cadastro->id
     * @return view         cadastros.show
     */
    public function show($id, Request $request)
    {
        $cadastro = Cadastro::find($id);
        $estados = Estado::pluck('name', 'id');

        if (!$cadastro) {
            $request->session()->flash(
                'msgError',
                trans('laravel-crud::alert.not-found', ['element' => 'Cadastro'])
            );

            return redirect('cadastros');
        }

        return view('cadastros.show', compact('cadastro', 'estados'));
    }

    /**
     * DESTROY - delete cadastro
     *
     * @param  integer $id      cadastro->id
     * @return redirect         cadastros.index
     */
    public function destroy($id, Request $request)
    {
        $cadastro = Cadastro::find($id);

        if ($cadastro)
        {
            //$cadastro->delete();
            $cadastro->deleted = true;
            $cadastro->save();

            $request->session()->flash(
                'msgSuccess',
                trans('laravel-crud::alert.deleted', ['element' => 'Cadastro'])
            );

        } else {
            $request->session()->flash(
                'msgError',
                trans('laravel-crud::alert.not-found', ['element' => 'Cadastro'])
            );
        }

        return redirect('cadastros');
    }

    public static function cpf($cpf)
    {
        if (! $cpf)
        {
            return '';
        }

        if (strlen($cpf) == 11)
        {
            return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9);
        }

        return $cpf;
    }

    public static function cnpj($cnpj)
    {
        if (! $cnpj)
        {
            return '';
        }

        if (strlen($cnpj) == 14)
        {
            return substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12, 2);
        }

        return $cnpj;
    }

    public static function fone($fone)
    {
        if (! $fone)
        {
            return '';
        }

        if (strlen($fone) == 10)
        {
            return '(' . substr($fone, 0, 2) . ') ' . substr($fone, 2, 4) . '-' . substr($fone, 6);
        }

        if (strlen($fone) == 11)
        {
            return '(' . substr($fone, 0, 2) . ') ' . substr($fone, 2, 5) . '-' . substr($fone, 7);
        }

        return $fone;
    }

    public static function cep($cep)
    {
        if (! $cep)
        {
            return '';
        }

        if (strlen($cep) == 8)
        {
            return substr($cep, 0, 5) . '-' . substr($cep, 5, 8);
        }

        return $cep;
    }

    function limpaChars($valor)
    {
        $valor = trim($valor);
        $valor = str_replace("(", "", $valor);
        $valor = str_replace(")", "", $valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", "", $valor);
        $valor = str_replace("-", "", $valor);
        $valor = str_replace("/", "", $valor);
        $valor = str_replace(" ", "", $valor);
        return $valor;
    }
}
