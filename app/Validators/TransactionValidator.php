<?php
namespace App\Validators;

use App\Traits\ValidatorTrait;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Validator;

class TransactionValidator
{
    use ValidatorTrait;

    public function validate(array &$data): bool
    {
        $rules = [
            'payer' => ['required', 'integer', Rule::exists('users', 'id')->where('type_user', 'PF')],
            'payee' => ['required', 'integer', Rule::exists('users', 'id')->whereNot('id', Arr::get($data, 'payer'))],
            'value' => 'required|numeric'
        ];
        $this->validator = Validator::make($data, $rules);
        return $this->isValid();
    }
}
