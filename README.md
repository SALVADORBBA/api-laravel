<!-- Título do Projeto -->
<h1>Projeto-01: Busca de CEP em Laravel</h1>
<!-- Descrição -->
<p>Este é um projeto simples que demonstra como fazer uma busca de CEP em Laravel usando a API de busca de CEP do ViaCEP.</p>
<!-- Pré-requisitos -->
<h2>Pré-requisitos</h2>
<ul>
  <li>PHP 7.4 ou superior</li>
  <li>Composer</li>
  <li>GuzzleHttp</li>
</ul>
<!-- Instalação -->
<h2>Instalação</h2>
<ol>
  <li>Clone o repositório para sua máquina local.</li>
  <li>Instale as dependências com o comando <code>composer install</code>.</li>
  <li>Copie o arquivo <code>.env.example</code> para <code>.env</code> e configure as variáveis de ambiente.</li>
</ol>
<!-- Como usar -->
<h2>Como usar</h2>
<p>Crie uma rota para a busca de CEP em seu arquivo de rotas:</p>
<pre><code>Route::get('cep', [ControllerBuscaCep::class, 'buscaCep']);</code></pre>
<p>Crie o método <code>buscaCep</code> em seu controlador para fazer a busca de CEP:</p>
<pre><code>
public function buscaCep(Request $request)
{
    $client = new Client();
    $response = $client->request('GET', "https://viacep.com.br/ws/$request->cep/json/");

    $data = json_decode($response->getBody(), true);

    return response()->json($data);
}
</code></pre>
<!-- Contribuição -->
<h2>Contribuição</h2>
<p>Se você quiser contribuir com este projeto, sinta-se à vontade para enviar pull requests ou reportar problemas na página de issues do GitHub.</p>
<!-- Contato -->
<h2>Contato</h2>
<p>Se você tiver alguma dúvida ou sugestão, pode entrar em contato comigo por e-mail: salvadorbba@gmail.com.</p>
<!-- Licença -->
<h2>Licença</h2>
<p>Este projeto está licenciado sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.</p>



