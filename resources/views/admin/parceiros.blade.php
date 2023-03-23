@extends('layouts.admin')
@section("title","Parceiros")

@section("conteudo")

<h2>Parceiros <span class="badge bg-secondary">Actualizados</span></h2>
<hr><br>
    @if(session("parceiroDesbloqueado"))
        <div class="alert alert-info">
            {{session('parceiroDesbloqueado')}}
        </div>
    @endif
    @if(session("parceiroBloquedo"))
        <div class="alert alert-info">
            {{session('parceiroBloquedo')}}
        </div>
    @endif
<table class="table table-hover">

    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nome do Usuario</th>
        <th scope="col">Código do Parceiro</th>
        <th scope="col">Email</th>
        <th scope="col">Data de Cadastro</th>
        <th scope="col">STATUS</th>
    </tr>
    </thead>
    
    @foreach ($parceiros as $parceiro)
    <tbody>
    <tr>
        <th scope="row">{{$loop->index+1}}</th>
        <td>{{$parceiro->username}}</td>
        <td>{{$parceiro->code_parceiro}}</td>
        <td>{{$parceiro->email}}</td>
        <td>{{$parceiro->created_at}}</td>
        <td>{{$parceiro->state}}</td>
        <td>
            <form action={{route('changeState',[$parceiro->id] )}} method="post">
            @csrf
            @method("PUT")
                <a class="btn btn-info">Editar</a>
                @if($parceiro->state=="Active")
                    <button type="submit" class="btn btn-danger">Bloquear</button>
                @else
                    <button type="submit" class="btn btn-success">Desbloquear</button>
                @endif

            </form>
        </td>
    </tr> 
    </tbody>
    @endforeach

  </table>
    
@endsection