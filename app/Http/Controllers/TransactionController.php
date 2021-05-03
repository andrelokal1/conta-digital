<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatus;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $service;

    public function __construct(TransactionService $service)
    {
        $this->service = $service;
    }

    public function post(Request $request)
    {
        return response()->json($this->service->save($request->all()), HttpStatus::CREATED);
    }

}
