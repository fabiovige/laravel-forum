@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('users.index') }}">Usuários</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Editar</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('users.update', $user->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group mt-3">
                    <label>Nome completo</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           placeholder="Ex.: Listar Tópicos" value="{{$user->name}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label>E-mail</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label>Papél</label>
                    <select name="role" class="form-control">
                        <option value="">Selecionar o papél</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" @if($user->role()->count() && $user->role->id == $role->id) selected @endif>
                                {{$role->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <button class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
