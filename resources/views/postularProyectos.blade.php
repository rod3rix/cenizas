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
          <h3><b>POSTULACIÓN APOYO PROYECTO</b></h3>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        </div>

        <hr>

    <div class="container">
          <button type="button" class="btn btn-info btn-arrow-right btn-lg">ANTECEDENTES GENERALES</button>
          <button type="button" class="btn btn-info btn-arrow-right btn-lg">DATOS ORGANIZACIÓN</button>
          <button type="button" class="btn btn-info btn-arrow-right btn-lg">TIPO PROYECTO</button>
          <button type="button" class="btn btn-info btn-arrow-right btn-lg">RELACIONES JURÍDICAS</button>
    </div>

    <div class="container">
        @include('frm.post_proy_etapa_1')
        @include('frm.post_proy_etapa_2')
        @include('frm.post_proy_etapa_3')
        @include('frm.post_proy_etapa_4')
    </div>

</div>

<script>
    $(document).ready(function(){
        // $("#mostrar").on( "click", function() {
        //     $('#target').show(); //muestro mediante id
        //     $('.target').show(); //muestro mediante clase
        //  });
        // $("#ocultar").on( "click", function() {
        //     $('#target').hide(); //oculto mediante id
        //     $('.target').hide(); //muestro mediante clase
        // });

        var op=1;

        if(op==1){
            $('#etapa_1').show();
        }
        if(op==2){
            $('#etapa_2').show();
        }
        if(op==3){
            $('#etapa_3').show();
        }
        if(op==4){
            $('#etapa_4').show();
        }

        //alert(op);
        // switch(op) { 
        //     case '1':
        //         $('#etapa_1').show();
        //     break;
        //     case '2':
        //         $('#etapa_2').show();
        //     break;
        //     case '3':
        //         alert(op);
        //         $('#etapa_3').show();
        //     break;
        //     case '4':
        //         $('#etapa_4').show();
        //     break; 
        // }

    });
</script>    

      
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
