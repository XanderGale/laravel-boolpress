@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Benvenuto {{ $user->name }} !</h1>

        <div class="list-group">
        @if ($user->userInfo)
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Telefono</h5>
                </div>
                <p class="mb-1">{{ $user->userInfo->phone }}</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Indirizzo</h5>
                </div>
                <p class="mb-1">{{ $user->userInfo->address }}</p>
            </a>
        @else
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">No Informations</h5>
                </div>
                <p class="mb-1">No infos</p>
            </a>
        @endif
        </div>

    </div>
@endsection