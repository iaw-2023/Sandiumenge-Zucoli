<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
//use OpenAI\OpenAI as OpenAIAPI;
use OpenAI\Laravel\Facades\OpenAI;

class ChatBotController extends Controller
{
    public function obtenerRespuestaChatGPT(Request $request)
    {
        $result = OpenAi::completions()->create([
            'max_tokens' => 75,
            'model' => 'gpt-3.5-turbo-instruct',
            'prompt' => $request->input('mensaje'),
        ]);
        //$respuesta = $result->choices[0]->text;
        //return response()->json(['respuesta' => $respuesta]);
        $response = array_reduce(
            $result->toArray()['choices'],
            fn(string $result,array $choice)=>$result.$choice['text'],""
        );
        return $response;
    }
}
