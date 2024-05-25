@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <span>Tarefas</span>
                    </div>
                    <div>
                        <a class="mx-2" href="{{route('tarefa.create')}}">Nova tarefa</a>
                        <a href="{{route('tarefa.exportar')}}">PDF</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Tarefa</th>
                                <th scope="col">Data limite de conclusão</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tarefas as $i => $tarefa)
                            <tr>
                                <th scope="row">{{$tarefa->id}}</th>
                                <td>{{$tarefa->tarefa}}</td>
                                <td>{{date('d/m/Y', strtotime($tarefa->data_limite_conclusao))}}</td>
                                <td> <a href="{{route('tarefa.edit', $tarefa)}}">Editar</a> </td>
                                <td>
                                    <form action="{{route('tarefa.destroy', $tarefa)}}" id="form_{{$tarefa->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a href="#" onclick="document.getElementById('form_{{$tarefa->id}}').submit()" >Excluir</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav a>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link"
                                    href="{{$tarefas->previousPageUrl()}}">Previous</a></li>

                            @for($i = 1; $i <= $tarefas->lastPage(); $i++)
                                <li class="page-item {{$tarefas->currentPage() == $i ? 'active' : ''}}"><a
                                        class="page-link" href="{{$tarefas->url($i)}}">{{$i}}</a></li>
                                @endfor

                                <li class="page-item"><a class="page-link" href="{{$tarefas->nextPageUrl()}}">Next</a>
                                </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
