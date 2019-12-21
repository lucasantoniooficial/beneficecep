# BénéficeCep
Uma library para Laravel trabalhando com API BénéficeCEP, todo acesso a API ainda é beta.

# Instalação
Digite o comando `composer require benefice/cep`

Abra o arquivo config/app.php e adicione: `BeneficeCep\CepServiceprovider::class,`

# Primeiros Passos

Abra seu controller que irá usar a library e faça os seguintes passo a passo

`use BeneficeCep\LibCep`

    public function cep($cep)
	{
    		$dados = new LibCep($cep);
    		return response()->json($dados->response,200);
    }
