@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <small> Criado por: {{ $kid->user->name }}, {{ $kid->created_at->diffForHumans() }} </small>
                </div>
                <div class="card-body">
                    <strong>Nome:</strong> {{ $kid->name }} <br />
                    <strong>Data de nascimento:</strong> {{ $kid->birth_date }} <br />
                </div>
                <div class="card-footer">

                    <a href="{{ route('kids.edit', $kid->id) }}" class="btn btn-sm btn-primary">Editar</a>

                    <a href="#" class="btn btn-sm btn-danger"
                       onclick="event.preventDefault();
                       document.getElementById('remove-kid').submit();">Remover</a>

                    <form id="remove-kid" action="{{ route('kids.destroy', $kid->id) }}" method="post" style="display: none">
                        @csrf
                        @method('DELETE')
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

