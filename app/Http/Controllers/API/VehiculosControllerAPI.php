<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculo;

/**
 * Class VehiculosControllerAPI.
 *
 * @author  AI-Avengers-IAW 
 */
class VehiculosControllerAPI extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/vehiulos",
     *     summary="Obtener lista de vehiculos",
     *     description="Retorna una lista de todas los vehiculos en la base de datos",
     *     tags={"Vehiculos"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de vehiculos encontrada",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="id", type="integer", example="1"),
     *                 @OA\Property(property="id_marca", type="integer", example="99"),
     *                 @OA\Property(property="modelo", type="integer", example="2010"),
     *                 @OA\Property(property="precio", type="integer", example="1"),
     *                 @OA\Property(property="disponible", type="boolean", example=true)
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return response()->json($vehiculos);
    }

    /**
     * @OA\Get(
     *     path="/api/vehiculos/show/{id}",
     *     summary="Obtener un vehiculo por id",
     *     description="Renorna los detalles de un vehiculo",
     *     tags={"Vehiculos"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del vehiculo",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detalles del vehiculo con id seleccionado",
     *         @OA\JsonContent(
     *                 @OA\Property(property="id", type="integer", example="1"),
     *                 @OA\Property(property="id_marca", type="integer", example="99"),
     *                 @OA\Property(property="modelo", type="integer", example="2010"),
     *                 @OA\Property(property="precio", type="integer", example="1"),
     *                 @OA\Property(property="disponible", type="boolean", example=true)
     *              )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Vehiculo no encontrado",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string")
     *         )
     *     )
     * )
     */
    public function show(string $id)
    {
        $vehiculo = Vehiculo::find($id);
        if (!$vehiculo) {
            return response()->json(['error' => 'No existe el Vehiculo'], 404);
        }
        return response()->json($vehiculo);  
    }

    /**
     * @OA\Get(
     *     path="/api/vehiculos/vehiculo/{id_marca}",
     *     summary="Buscar vehiculo por id de una marca",
     *     description="Retorna un vehiculo",
     *     tags={"Vehiculos"},
     *     @OA\Parameter(
     *         name="idMarca",
     *         in="path",
     *         description="id de la marca relacionada al vehiculo a buscar",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Marca encontrada",
     *          @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="vehiculo", type="string", maxLength=50, nullable=true, example="id de una Marca")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="No se encontro la marca del vehiculo",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string")
     *         )
     *     )
     * )
     */
    public function buscarVehiculoPorMarca(int $idMarca)
    {
        $vehiculo = Turno::where('id_marca', $idMarca)->get();
        if(!$vehiculo){
            return response()->json(['error' => 'No existe la Marca'], 404);
        }
        return response()->json($vehiculo);
    }

    /**
     * @OA\Get(
     *     path="/api/vehiculos/vehiculo/{modelo}",
     *     summary="Buscar vehiculo por modelo",
     *     description="Retorna un vehiculo",
     *     tags={"Vehiculos"},
     *     @OA\Parameter(
     *         name="modelo",
     *         in="path",
     *         description="Modelo del vehiculo a buscar",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Modelo encontrado",
     *          @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="modelo", type="string", maxLength=50, nullable=true, example="Modelo de un vehiculo")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="No se encontro el modelo",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string")
     *         )
     *     )
     * )
     */
    public function buscarVehiculoPorModelo(string $modelo)
    {
        $modelo = Vehiculo::where('modelo', $modelo)->get();
        if (!$modelo) {
            return response()->json(['error' => 'No se encuentra el Vehiculo por Modelo'], 404);
        }
        return response()->json($modelo);
    }
}

?>