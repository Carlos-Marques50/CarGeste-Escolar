@extends('layouts.admin')
@section("title","Parceiros")

@section("conteudo")

<h2>Parceiros <span class="badge bg-secondary">Actualizados</span></h2>
<hr><br>

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

    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>
            <a class="btn btn-info">Editar</a>
            <a class="btn btn-danger">Bloquear</a>
        </td>
    </tr> 
    <tr>
        <th scope="row">2</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>
            <a href="#" class="btn btn-info">Editar</a>
            <a href="#" class="btn btn-danger">Bloquear</a>
        </td>
    </tr> 
    </tbody>

  </table>
    
@endsection