@extends('events.layout.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Arquivos <a href="{{ route('files.create') }}" class="btn btn-info">Adicionar Arquivos</a> </div>

                    <div class="card-body">
                        @if($files->count())
                            <table class="table">
                                <th>Nome</th>
                                <th>Tamanho</th>
                                <th>Imagem</th>
                                @foreach($files as $file)
                                    <tr>
                                        <td>{{ $file->filename }}</td>
                                        <td>{{ $file->size }} Bytes</td>
                                        <td><img style="width: 100px; height: 100px;" src='{{asset('uploads/'.$file->path.'/'.$file->filename)}}'/></td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            Você não tem nenhum arquivo!
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
