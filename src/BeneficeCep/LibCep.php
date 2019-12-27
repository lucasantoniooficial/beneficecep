<?php


namespace BeneficeCep;

use Illuminate\Support\Facades\Cache;


class LibCep
{
    public $response = [];

    public function __construct($cep)
    {
        $cep = preg_replace('/[^0-9]*/', '', $cep);
        if(Cache::has('cep_'.$cep)) {
            $this->response = Cache::get('cep_'.$cep);
        }else {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://cep.beneficeweb.com.br/api/v1/cep/{$cep}");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt ( $curl , CURLOPT_SSL_VERIFYHOST , false );
            curl_setopt ( $curl , CURLOPT_SSL_VERIFYPEER , false );
            $dados = curl_exec($curl);
            $error = curl_error($curl);
            curl_close($curl);
            $this->response = json_decode($dados);
            $this->response->cep = preg_replace('/[^0-9]*/','', $this->response->cep);
            Cache::forever('cep_'.$cep, $this->response);
        }
    }

    public function __isset($name)
    {
        return isset($this->response[$name]);
    }

    public function __set($name, $value)
    {
        throw new \Exception('Você não pode setar/alterar nenhum dado');
    }

    public function __get($name)
    {
        return $this->response->{$name};
    }
}
