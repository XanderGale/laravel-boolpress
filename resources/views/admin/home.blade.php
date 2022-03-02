@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Benvenuto {{ $user->name }} !</h1>

        @if ($user->userInfo)
        <ul>
            <li>Telefono: {{ $user->userInfo->phone }}</li>
            <li>Indirizzo: {{ $user->userInfo->address }}</li>
        </ul>
        @endif

    </div>
@endsection