<?php

namespace App\Http\Controllers;

use App\Models\Kid;
use Illuminate\Http\Request;

class KidController extends Controller
{
    public function index()
    {
        $kids = Kid::orderBy('created_at', 'DESC')->paginate(15);
        return view('kids.index', [
            'kids' => $kids
        ]);
    }

    public function create()
    {
        return view('kids.create');
    }

    public function store(Request $request)
    {
        try {
            Kid::create($request->all());
            dd('Cadastrado com sucesso!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function show(Kid $kid)
    {
        return view('kids.show', [ 'kid' => $kid ]);
    }

    public function edit(Kid $kid)
    {
        $this->authorize('update', $kid);

        return view('kids.edit', [ 'kid' => $kid ]);
    }

    public function update(Request $request, Kid $kid)
    {
        try {
            $kid->update($request->all());
            dd('Atualizado com sucesso!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function destroy(Kid $kid)
    {
        try {
            $kid->delete();
            dd('Removido com sucesso!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
