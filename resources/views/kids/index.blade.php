@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h3>Crianças</h3>
        </div>
        <div class="col-12">
            @forelse($kids as $kid)
                <div class="list-group py-1">
                    <a href="{{ route('kids.show', $kid->id) }}" class="list-group-item list-group-item-action">
                        <h4>{{ $kid->name }}</h4>
                        <small>Nascido em: {{ $kid->birth_date }}</small>
                    </a>
                </div>
            @empty
                <div class="alert alert-warning">
                    Nenhum registro encontrado!
                </div>
            @endforelse
        </div>
        <div class="col-12 py-1">
            {{ $kids->links() }}
        </div>
    </div>
@endsection
