<?php

namespace App\Http\Controllers\API;

use App\Constants\Countries;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function index()
    {
       return Countries::getList();
    }
}
