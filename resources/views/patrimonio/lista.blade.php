@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Patrimonios
                        <a class="pull-right" href="{{ url ('patrimonios/novo')}}">Novo patrimonio</a>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert-success">{{Session::get('mensagem_sucesso')}}</div>
                        @endif

                        <table class="table">
                            <th>Nome</th>
                            <th>numero</th>
                            <th>Ações</th>
                            <tbody>
                            @foreach($patrimonios as $patrimonio)
                                <tr>
                                    <td>{{$patrimonio->nome}}</td>
                                    <td>{{$patrimonio->numero}}</td>

                                    <td>
                                        <a href="patrimonio/{{$patrimonio->id}}/editar" class="btn btn-default btn-sm">Editar</a>
                                        {!! Form::open(['style' => 'display: inline', 'method' => 'DELETE', 'url' => '/patrimonios/'.$patrimonio->id]) !!}
                                        <button type="submit" class="btn btn-default btn-sm">Excluir</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection