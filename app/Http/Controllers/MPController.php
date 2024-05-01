<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\MercadoPagoConfig;

class MPController extends Controller
{
    public function recibirPago(Request $request){
        \MercadoPago\SDK::setAccessToken("TEST-8053378594437720-031311-587f4ecb82f0b74c12e4cb9b5c2161c9-414446673");
        $contents = $request;
        $payment = new \MercadoPago\Payment();
        $payment->transaction_amount = $contents['transaction_amount'];
        $payment->token = $contents['token'];
        $payment->installments = $contents['installments'];
        $payment->payment_method_id = $contents['payment_method_id'];
        $payment->issuer_id = $contents['issuer_id'];
        $payer = new \MercadoPago\Payer();
        $payer->email = $contents['payer']['email'];
        $payer->identification = array(
            "type" => $contents['payer']['identification']['type'],
            "number" => $contents['payer']['identification']['number']
        );
        $payment->payer = $payer;
        $payment->save();
        $response = array(
            'status' => $payment->status,
            'status_detail' => $payment->status_detail,
            'id' => $payment->id
        );
        echo implode($payment);
        return response()->json($response);
    }
}