@extends('events.layout.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">

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
            <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <label for="name"> Nome:</label>
                        <input type="text" class="form-control" placeholder="Nome" name="name" required>
                    </div>
                    <div class="col">
                        <label for="descricao"> Email:</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="ra"> Ra:</label>
                        <input type="text" class="form-control" placeholder="Ra" name="ra" required>
                    </div>
                    <br>
                    <div class="col">
                        <label for="level"> Level:</label>
                        <select class="custom-select" name="level" id="level">
                            <option selected>escolha</option>
                            <option value="0">Usúario</option>
                            <option value="1">Admistrator</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="password"> Senha:</label>
                        <input type="password" class="form-control" placeholder="Senha" name="password" required>
                    </div>
                    <br>

                </div>
                <br>
                <button type="submit" class="btn  btn-dark">Criar usuario</button>


            </form>
    </div>

@endsection

