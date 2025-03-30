<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Traits\Responses;

class CountriesController extends Controller
{
    use Responses;

    public function index()
    {
        return $this->indexOrShowResponse('done successfully...!', Country::select('id','name')->get());
    }
}
