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


<h1>Projeto-02: Geração de XML com Sped-NFe em PHP</h1>
<p>Este é um projeto simples que demonstra como gerar um XML da Nota Fiscal Eletrônica (NFe) usando a biblioteca Sped-NFe em PHP.</p>
<h3>Pré-requisitos</h3>
<ul>
  <li>PHP 7.2 ou superior</li>
  <li>Biblioteca Sped-NFe</li>
</ul>
<h3>Como usar</h3>
<h2>Instalação</h2>
    <ol>
      <li>Clone o repositório em sua máquina local: <code>git clone https://github.com/seu-usuario/projeto-sped-nfe.git</code></li>
      <li>Na raiz do projeto, execute o comando <code>composer install</code> para instalar as dependências.</li>
      <li>Crie uma pasta chamada <code>xml</code> na raiz do projeto, onde os arquivos XML gerados serão salvos.</li>
      <li>Copie o arquivo <code>config.example.php</code> para <code>config.php</code> e edite as informações de configuração do Sped-NFe (certificado digital, senha, etc.)</li>
    </ol>
    
    <h2>Uso</h2>
    <p>Para gerar um arquivo XML de NF-e, basta criar um novo arquivo PHP na pasta <code>xml</code> e utilizar a classe <code>SpedNFe</code>:</p>
    
    <pre><code>&lt;?php
    require_once '../vendor/autoload.php';

    use NFePHP\NFe\Make;
    use NFePHP\Common\Certificate;
    use NFePHP\Common\Soap\SoapCurl;

    $config = include('../config.php');

    $make = new Make();
    $make->taginfNFe(['versao' => '4.00', 'Id' => 'NFe12345678901234567890123456789012345678901']);

    // Adicione aqui as tags da sua NF-e

    $certificate = Certificate::readPfx($config['certificado']['caminho'], $config['certificado']['senha']);
    $soap = new SoapCurl($config['nfe']['homologacao']);
    $soap->setCertificate($certificate);
    $make->monta();
    $xml = $make->getXML();

    file_put_contents('nfe.xml', $xml);</code></pre>

<p>Para gerar um XML da NFe, basta chamar a classe <code>Make</code> da biblioteca Sped-NFe e utilizar seus métodos para adicionar as tags necessárias. Por exemplo:</p>
<pre><code>use NFePHP\NFe\Make;

$xml = new Make();

$xml->taginfNFe([
    'versao' => '4.00',
    'Id' => 'NFe12345678901234567890123456789012345678901234'
]);

$xml->tagide([
    'cUF' => '41',
    'cNF' => '12345678',
    'natOp' => 'Venda de produzido do estabelecimento',
    'mod' => '55',
    'serie' => '1',
    'dhEmi' => '2021-04-01T10:00:00-03:00',
    'dhSaiEnt' => '2021-04-01T10:00:00-03:00',
    'tpNF' => '1',
    'idDest' => '1',
    'cMunFG' => '4115200',
    'tpImp' => '1',
    'tpEmis' => '1',
    'cDV' => '9',
    'tpAmb' => '2',
    'finNFe' => '1',
    'indFinal' => '1',
    'indPres' => '1',
    'procEmi' => '0',
    'verProc' => '1.0'
]);

// E assim por diante...

$xmlString = $xml->getXML();
</code></pre>
<p>Para mais informações sobre como utilizar a biblioteca Sped-NFe, consulte a documentação oficial em: <a href="https://github.com/nfephp-org/sped-nfe">https://github.com/nfephp-org/sped-nfe</a></p>


<!-- Contribuição -->
<h2>Contribuição</h2>
<p>Se você quiser contribuir com este projeto, sinta-se à vontade para enviar pull requests ou reportar problemas na página de issues do GitHub.</p>
<!-- Contato -->
<h2>Contato</h2>
<p>Se você tiver alguma dúvida ou sugestão, pode entrar em contato comigo por e-mail: salvadorbba@gmail.com.</p>
<!-- Licença -->
<h2>Licença</h2>
<p>Este projeto está licenciado sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.</p>



