@extends('layouts.app')
@section('content')
<div class="jumbotron">
        <div class="container">
          <h3><b>SEGUIMIENTO DE CASOS, SUGERENCIA U OTROS</b></h3>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        </div>

        <hr>

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
