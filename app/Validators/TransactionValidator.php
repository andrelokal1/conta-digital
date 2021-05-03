<?php
namespace App\Validators;

use App\Traits\ValidatorTrait;
use Illuminate\Validation\Rule;
use Validator;

class TransactionValidator
{
    use ValidatorTrait;

    public function validate(array &$data): bool
    {
        $rules = [
            'payer' => ['required', 'integer', Rule::exists('users', 'id')],
            'payee' => 'required|integer|exists:users,id',
            'value' => 'required|numeric'
        ];
        $this->validator = Validator::make($data, $rules);
        return $this->isValid();
    }
}
