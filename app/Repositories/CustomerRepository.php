<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;

class CustomerRepository
{
    public function search(): Builder
    {
        return Customer::query()->orderByDesc('id');
    }
}
