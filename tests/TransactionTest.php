<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\User;

class TransactionTest extends TestCase
{

    private $userPF;
    private $userPJ;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userPF = factory(User::class)->create(['type_user'=>'PF']);
        $this->userPJ = factory(User::class)->create(['type_user'=>'PJ']);
    }

    public function testTransactionPftoPj()
    {
        $params = [
            'value' => '100',
            'payer' => $this->userPF->id,
            'payee' => $this->userPJ->id
        ];

        $response = $this->call('POST', '/transaction', $params);
        $json = json_decode($response->getContent());
        $this->assertResponseStatus(201);

    }

    public function testTransactionPjtoPf()
    {
        $params = [
            'value' => '100',
            'payer' => $this->userPJ->id,
            'payee' => $this->userPF->id
        ];

        $response = $this->call('POST', '/transaction', $params);
        $json = json_decode($response->getContent());
        $this->assertResponseStatus(422);

    }

    public function testTransactionSameUser()
    {
        $params = [
            'value' => '100',
            'payer' => $this->userPF->id,
            'payee' => $this->userPF->id
        ];

        $response = $this->call('POST', '/transaction', $params);
        $json = json_decode($response->getContent());
        $this->assertResponseStatus(422);

    }

}
