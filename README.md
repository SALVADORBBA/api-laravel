 
 <hr>
 Projeto-01:
<b>Busca de CEP em Laravel</b>
Este é um projeto simples que demonstra como fazer uma busca de CEP em Laravel usando a API de busca de CEP do ViaCEP.

Pré-requisitos
PHP 7.4 ou superior
Composer
GuzzleHttp


Para criar um código de busca de CEP em Laravel, você pode seguir os seguintes passos:

Instalar a biblioteca GuzzleHttp:
Para fazer uma requisição HTTP para a API de busca de CEP, você precisará instalar a biblioteca GuzzleHttp. Para instalar, execute o seguinte comando no terminal do seu  composer require guzzlehttp/guzzle

Criar a rota para a busca de CEP:
Em seu arquivo de rotas, defina uma rota para a busca de CEP. Por exemplo:
Route::get('cep', [ControllerBuscaCep::class, 'buscaCep']);

Criar o método de busca de CEP no controlador:
No controlador, crie o método buscaCep que receberá o CEP como parâmetro e fará a requisição HTTP para a API de busca de CEP. Você pode usar a biblioteca GuzzleHttp para fazer a requisição.

 public function buscaCep(Request $request)
    {
        $client = new Client();
        $response = $client->request('GET', "https://viacep.com.br/ws/$request->cep/json/");

        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }
 <hr>
 
Contribuindo
Se você quiser contribuir com este projeto, sinta-se à vontade para enviar pull requests ou reportar problemas na página de issues do GitHub.

Contato
Se você tiver alguma dúvida ou sugestão, pode entrar em contato comigo por e-mail: salvadorbba@gmail.com.

Licença
Este projeto está licenciado sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.
