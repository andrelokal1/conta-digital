<?php

namespace App\Resources;

use App\Exceptions\ValidatorException;
use GuzzleHttp\Client;

class AuthTransactionResource
{
    /**
     * @var Client
     */
    private $client;

    private $url;

    /**
     * AutologRest constructor.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->url = 'https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6';
    }

    public function verify()
    {
        try {

            $response = $this->client->get($this->url);

            if ($response->getStatusCode() !== 200) {
                return false;
            }

            return true;

        } catch (\Exception $exception) {
            throw new ValidatorException(['message' => 'Falha na autorização da transação.'], true);
        }
    }
}
