@extends('events.layout.app')
@section('content')
<div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    
    @if(empty($userRegistration))
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Nome do Usuario:</th>
                <th scope="col">Evento:</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($userRegistration as $userRegistrations)
                <tr>
                    <td>{{ $userRegistrations->username}}</td>
                    <td>{{ $userRegistrations->eventname}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endif
    @if (!empty($userRegistration))
                <div class="alert alert-primary" role="alert">
                   Não possui usuarios registrados em eventos
                </div>
    @endif
</div>
@endsection
