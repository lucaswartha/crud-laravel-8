<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCarros;
use App\Http\Requests\StoreUpdateMotos;
use App\Models\Carros;
use App\Models\Motos;
use Illuminate\Http\Request;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['carros', 'motos']);

    }

    public function storeMotos(Request $request)
    {

        Motos::create($request->all());
        return redirect()
        ->route('motos')
        ->with('message', 'Moto cadastrada com sucesso!');
    }

    public function storeCarros(Request $request)
    {        

        Carros::create($request->all());
        return redirect()
            ->route('carros')
            ->with('message', 'Carro cadastrado com sucesso!');

    }


    public function destroyCarros($id)
    {
        if (!$carro = Carros::find($id)) {
            return redirect()->route('carros');
        }

        $carro->delete();
        return redirect()
            ->route('carros')
            ->with('message', 'Carro deletado com sucesso!');
    }

    public function destroyMotos($id)
    {
        if (!$moto = Motos::find($id)) {
            return redirect()->route('motos');
        }

        $moto->delete();
        return redirect()
            ->route('motos')
            ->with('message', 'Moto deletada com sucesso!');
    }

    public function updateCarros(StoreUpdateCarros $request, $id)
    {
        if (!$carro = Carros::find($id)) {
            return redirect()->route('carros');
        }

        $carro->update($request->all());
        return redirect()->route('carros')
            ->with('message', 'Carro editado com sucesso!');
    }
    public function updateMotos(StoreUpdateMotos $request, $id)
    {
        if (!$moto = Motos::find($id)) {
            return redirect()->route('motos');
        }

        $moto->update($request->all());
        return redirect()->route('motos')
            ->with('message', 'Moto editada com sucesso!');
    }

    public function carros(Request $request) {

        $carros = Carros::latest()->simplePaginate(10);
        return view('admin.carros', compact('carros'));
    }


    public function motos(Request $request)
    {

        $motos = Motos::latest()->simplePaginate(10);
        return view('admin.motos', compact('motos'));
    }

}
