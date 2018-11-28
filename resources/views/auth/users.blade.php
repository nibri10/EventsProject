@extends('events.layout.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        @if($users->count()==0)
            <div class="alert alert-info" role="alert">
                Não possui nenhum evento cadastrado!
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
            @if($users->count()>0)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ra</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($users as $user)


                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->ra}}</td>
                    <td>{{$user->email}}</td>
                    @if($user->level==0)
                    <td>Usúario</td>
                    @endif
                    @if($user->level==1)
                        <td>Administrador</td>
                    @endif
                    <td>
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Apagar</button>
                    </form>
                    </td>
                </tr>

                @endforeach
                    </tbody>
                </table>
            @endif

    </div>
@endsection

