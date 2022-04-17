@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="h3">Cadastrar</div>
            <form action="{{ route('kids.store') }}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group mt-2">
                    <label for="birth_date">Data de nascimento</label>
                    <input type="text" name="birth_date" class="form-control" value="{{ old('birth_date') }}">
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
