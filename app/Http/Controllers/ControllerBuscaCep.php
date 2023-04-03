<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ControllerBuscaCep extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * instalação
     * 1º Crie um controller: php artisan make:controller ControllerBuscaCep  --resource
     * 2º Instalar a biblioteca GuzzleHttp: comando-> composer require guzzlehttp/guzzle
     * 3º Criar a rota para a busca de CEP : Route::get('cep', [ControllerBuscaCep::class, 'buscaCep']);
     * 4º Inicie o servidor: php artisan serve
     */
    public function buscaCep(Request $request)
    {
        $client = new Client();
        $response = $client->request('GET', "https://viacep.com.br/ws/$request->cep/json/");

        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }
}