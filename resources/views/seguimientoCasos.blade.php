@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <div class="container-fluid headpage">
        <div class="row justify-content-center headinner">
            <h1>Seguimiento de casos, sugerencias u otros</h1>
        </div>
    </div>

        <div  class="container">
            
            <table id="registros" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>N° CASO</th>
                <th>NOMBRE PROYECTO</th>
                <th>NOMBRE</th>
                <th>FECHA DE ENVÍO</th>
                <th>ESTADO</th>
                <th>RESPUESTA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>20987</td>
                <td>NOMBRE CASO XXXX</td>
                <td>JUAN PERÉZ</td>
                <td>20/03/2024</td>
                <td>ABIERTO</td>
                <td><a href="">RESPONDER</a></td>
            </tr>
            <tr>
                <td>20985</td>
                <td>NOMBRE CASO XXXX</td>
                <td>SEBASTÍAN VALENZUELA</td>
                <td>20/03/2024</td>
                <td>CERRADA</td>
                <td><a href="">VER RESPUESTA</a></td>
            </tr>
            <tr>
                <td>20987</td>
                <td>NOMBRE CASO XXXX</td>
                <td>JUAN PERÉZ</td>
                <td>20/03/2024</td>
                <td>ABIERTO</td>
                <td><a href="">RESPONDER</a></td>
            </tr>
            <tr>
                <td>20987</td>
                <td>NOMBRE CASO XXXX</td>
                <td>JUAN PERÉZ</td>
                <td>20/03/2024</td>
                <td>ABIERTO</td>
                <td><a href="">RESPONDER</a></td>
            </tr>
            <tr>
                <td>20985</td>
                <td>NOMBRE CASO XXXX</td>
                <td>SEBASTÍAN VALENZUELA</td>
                <td>20/03/2024</td>
                <td>CERRADA</td>
                <td><a href="">VER RESPUESTA</a></td>
            </tr>
        </tbody>
        <tfoot>
        </tfoot>
    </table>

    </div>
</div>
@endsection
