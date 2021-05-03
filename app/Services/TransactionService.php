<?php
namespace App\Services;

use App\Exceptions\ValidatorException;
use App\Repositories\TransactionRepository;
use App\Resources\AuthTransactionResource;
use App\Validators\TransactionValidator;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    private $validator;
    private $repository;

    public function __construct(TransactionValidator $validator, TransactionRepository $repository)
    {
        $this->validator = $validator;
        $this->repository = $repository;
    }

    public function save(array $data)
    {
        if (!$this->validator->validate($data)) {
            throw new ValidatorException($this->validator->getErrors());
        }

        $authTransaction = app(AuthTransactionResource::class);

        if (!$authTransaction->verify()) {
            throw new ValidatorException($this->validator->getErrors());
        }

        try {
            DB::beginTransaction();
            $transaction = $this->repository->create($data);
            DB::commit();
            return $transaction;
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }


}
