<?php

namespace App\Http\Services;

use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerService
{
    protected  $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function customersFiltered(Request $request)
    {
        $customers = $this->customerRepository->search()->get();
        if ($request->filled('country_code')) {
            $customers = $customers->filter(function($phone) use ($request) {
                return $phone->country_code === $request->get('country_code');
            });
        }
        if ($request->filled('state')) {
            $customers = $customers->filter(function($phone) use ($request) {
                return $phone->state === $request->get('state');
            });
        }

        return $customers;

    }
}
