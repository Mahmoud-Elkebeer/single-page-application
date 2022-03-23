<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\CollectionHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Http\Services\CustomerService;

class CustomerController extends Controller
{
    private $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(Request $request)
    {
        $customers = $this->customerService->customersFiltered($request);
        $customersPaginated = CollectionHelper::paginate($customers, env('PAGINATION', 10));

        return CustomerResource::collection($customersPaginated);
    }
}
