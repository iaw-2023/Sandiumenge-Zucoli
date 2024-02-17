<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;

class LogosControllerAPI extends Controller
{
    /**
     * Display the logos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/logos",
     *     summary="Get all logos",
     *     tags={"Logos"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Logo")
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function index(Request $request)
    {
        $logos = Logo::all();
        return response()->json($logos);
    }

    /**
     * Show a logo for use in JS.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/logos/{id}",
     *     summary="Get a specific logo",
     *     tags={"Logos"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Logo ID",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Logo")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Logo not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function show(String $id)
    {
        $logo = Logo::find($id);
        if (!$logo) {
            return response()->json(['error' => 'No existe el Logo'], 404);
        }
        return response()->json($logo);
    }
}