@extends('layouts.app')

@section('content')

 @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- You are logged in! -->

<div class="jumbotron">
        <div class="container">
          <h3><b>SEGUIMIENTO POSTULACIONES A FONDOS CONCURSABLES ENVIADAS</b></h3>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> -->
        </div>

        <hr>

        <div  class="container">
            
            <table id="registros" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>FOLIO</th>
                <th>NOMBRE PROYECTO</th>
                <th>FECHA DE ENVÍO</th>
                <th>ESTADO</th>
                <th>RESOLUCIÓN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>20987</td>
                <td>NOMBRE PROYECTO XXXX</td>
                <td>20/03/2024</td>
                <td>ENVIADO</td>
                <td>PENDIENTE</td>
            </tr>
             <tr>
                <td>20987</td>
                <td>NOMBRE PROYECTO XXXX</td>
                <td>20/03/2024</td>
                <td>ENVIADO</td>
                <td>PENDIENTE</td>
            </tr>
             <tr>
                <td>20987</td>
                <td>NOMBRE PROYECTO XXXX</td>
                <td>20/03/2024</td>
                <td>ENVIADO</td>
                <td><a href="#">VER</a></td>
            </tr>
        </tbody>
        <tfoot>
           <!--  <tr>
                <th>FOLIO</th>
                <th>NOMBRE PROYECTO</th>
                <th>FECHA DE ENVÍO</th>
                <th>ESTADO</th>
                <th>RESOUCIÓN</th>
            </tr> -->
        </tfoot>
    </table>

    </div>
</div>
     
<!-- Scripts -->
<script src="{{ asset('js/datatable.js') }}" defer></script>

@endsection
