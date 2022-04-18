@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Usuários do sistema</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Papél</th>
                    <th>Criado Em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            {{$user->role()->count() ? $user->role->name : 'Sem papél associado!'}}
                        </td>
                        <td>{{$user->created_at->format('d/m/Y H:i')}}</td>
                        <td style="width: 50px; white-space: nowrap;">
                            <div class="btn-group">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Nenhum usuário cadastrado!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$users->links()}}
        </div>
    </div>

@endsection
