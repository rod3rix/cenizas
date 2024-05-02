<div id="etapa_4" style="display:none">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header"><b><u>{{ __('  TIPO PROYECTO') }}</b></u></div>
            <div class="card-body">
               <form method="POST" action="{{ route('register') }}">
                  @csrf
                 <div class="form-group row">
                      <label for="telefono" class="col-md-12 col-form-label text-md-left">1. Mis organizaciones jurídicas asociadas*</label>  
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
      <table id="registros" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>RUT</th>
                <th>RAZÓN SOCIAL</th>
                <th>RELACIÓN</th>
                <th>ESTADO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>12.897.654-k</td>
                <td>XXXXXX XXXXXXXX</td>
                <td>XXXXXXXXXX XXXXXXX</td>
                <td>Activo</td>
            </tr>
            <tr>
                <td>12.897.654-k</td>
                <td>XXXXXX XXXXXXXX</td>
                <td>XXXXXXXXXX XXXXXXX</td>
                <td>Activo</td>
            </tr>
            <tr>
                <td>12.897.654-k</td>
                <td>XXXXXX XXXXXXXX</td>
                <td>XXXXXXXXXX XXXXXXX</td>
                <td>Activo</td>
            </tr>
            <tr>
                <td>12.897.654-k</td>
                <td>XXXXXX XXXXXXXX</td>
                <td>XXXXXXXXXX XXXXXXX</td>
                <td>Activo</td>
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

                  <div class="form-group row">
                     <div class="col-md-12">
                        <button type="button" class="btn btn-primary btn-block">{{ __('Agregar otro') }}</button>
                     </div>
                  </div>
             
                  <div class="form-group row">
                     <div class="col-md-12  text-md-right">
                        <button type="submit" class="btn btn-primary">
                        {{ __('Anterior') }}
                        </button>

                         <button type="submit" class="btn btn-primary">
                        {{ __('Siguiente') }}
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/datatable.js') }}" defer></script>