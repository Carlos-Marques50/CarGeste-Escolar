@extends('layouts.admin')
@section("title","Administração do Sistema")

@section('conteudo')

<h2>Licenças <span class="badge bg-secondary">Actualizadas</span></h2>
<hr><br>

<table class="table table-hover">

    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">PARCEIROS</th>
        <th scope="col">MAQUINAS</th>
        <th scope="col">STATUS</th>
    </tr>
    </thead>

    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>
            <a class="btn btn-info">Editar</a>
            <a class="btn btn-danger">Apagar</a>
        </td>
    </tr> 
    <tr>
        <th scope="row">2</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>
            <a href="#" class="btn btn-info">Editar</a>
            <a href="#" class="btn btn-danger">Apagar</a>
        </td>
    </tr> 
    </tbody>

  </table>
    
@endsection