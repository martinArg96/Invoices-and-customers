<?php
namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class CustomerFilter extends ApiFilter{
    protected $safeParameters = [
        'name' => ['eq'],
        'email' => ['eq'],
        'type' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postalCode' => ['eq','gt','lt'],
    ];
    protected $columnMap = [
        'postalCode' => 'postal_code',
        'updated_at' => 'updated_at',
    ];
    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<='

    ];
}

