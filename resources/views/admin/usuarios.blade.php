@extends('layouts.admin')
@section("title","Usuarios")

@section("conteudo")

<h2>Usuarios <span class="badge bg-secondary">NEWs</span></h2>
<hr><br>
    @if(session("usuariosDesbloqueado"))
        <div class="alert alert-info">
            {{session('usuariosDesbloqueado')}}
        </div>
    @endif
    @if(session("usuariosBloquedo"))
        <div class="alert alert-info">
            {{session('usuariosBloquedo')}}
        </div>
    @endif
    @if(session("success_deleteUsuarios"))
        <div class="alert alert-success">
            {{session('success_deleteUsuarios')}}
        </div>
    @endif
    @if(session("error_deleteUsuarios"))
        <div class="alert alert-danger">
            {{session('error_deleteUsuarios')}}
        </div>
    @endif
    @if(session("success_update"))
        <div class="alert alert-success">
            {{session('success_update')}}
        </div>
    @endif
    @if(session("error_update"))
        <div class="alert alert-danger">
            {{session('error_update')}}
        </div>
    @endif
<table class="table table-hover">

    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nome do Usuario</th>
        <th scope="col">Email</th>
        <th scope="col">Cargo</th>
        <th scope="col">Data de Cadastro</th>
    </tr>
    </thead>
    
    @foreach ($usuarios as $usuario)
    
    <tbody>
    <tr>
        <th scope="row">{{$loop->index + 1}}</th>
        <td>{{$usuario->name}}</td>
        <td>{{$usuario->email}}</td>
        <td>{{$usuario->cargo}}</td>
        <td>{{$usuario->created_at->format("d-m-Y")}}</td>
        <td>
            <form action={{ route('destroy', ['id'=>$usuario->id]) }} method="POST">
                @csrf
                @method("DELETE")
                <a href={{ route('edit', ['id'=>$usuario->id]) }} class="btn btn-info">Editar</a>
                <button type="submit" class="btn btn-danger">Apagar</button>
            </form>
        </td> 
    </tbody>

    @endforeach

  </table>
    
@endsection