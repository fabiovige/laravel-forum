@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="h3">Editar</div>
            <form action="{{ route('kids.update', $kid->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-2">
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control" value="{{ $kid->name }}">
                </div>
                <div class="form-group mt-2">
                    <label for="birth_date">Data de nascimento</label>
                    <input type="text" name="birth_date" class="form-control" value="{{ $kid->birth_date }}">
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-sm btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-muted mt-2">
            Criando em: {{ $kid->created_at }} <br />
            Última atualização: {{ $kid->updated_at }}
        </div>
    </div>
@endsection

