<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Regiones;
use App\Models\Comunas;

class FrmController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
     
     public function guardarFrm(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'tipo' => 'required',
            'localidad' => 'required',
            'region' => 'required',
            'comuna' => 'required',
            'direccion' => 'required',
            'asunto' => 'required',
            'descripcion' => 'required',
            'archivo' => 'required|file|mimes:pdf,zip,rar|max:20480', // Máximo de 20 MB y permitir solo PDF, ZIP y RAR
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        $archivo = $request->file('archivo');

        // Guardar el archivo en el directorio deseado
        $nombreArchivo = 'caso_' . auth()->id() . "_" . date('Ymd_His') . "." . $archivo->getClientOriginalExtension();
        $archivo->storeAs('archivos', $nombreArchivo);

        $insertedId = \DB::table('casos')->insertGetId([
            'idUser' => auth()->id(),
            'tipo' => $request->tipo,
            'localidad' => $request->localidad,
            'region' => 1,
            'comuna' => 1,
            'direccion' => $request->direccion,
            'asunto' => $request->asunto,
            'descripcion' => $request->descripcion,
            'archivo' => $nombreArchivo,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if ($insertedId) {
            // El insert fue exitoso
            return response()->json([
                'success' => true,
                'message' => '¡El formulario se ha enviado correctamente y el archivo se ha subido!'
            ]);
        } else {
            // El insert falló
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al guardar el formulario en la base de datos.'
            ], 500); // 500 es el código de estado para errores internos del servidor
        }
    }
    

    public function getComunas(Request $request)
    {
        $regionId = $request->input('region_id');

        // Aquí obtienes las comunas según el ID de la región
        $comunas = Comunas::where('region_id', $regionId)->get();

        return response()->json($comunas);
    }

    public function getRegiones(Request $request)
    {
        // Obtener las regiones desde la base de datos
        $regiones = Regiones::all();

        // Devolver las regiones como respuesta JSON
        return response()->json($regiones);
    }

}