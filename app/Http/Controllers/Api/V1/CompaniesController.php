<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\{
    CreateCompanyRequest,
    UpdateCompanyRequest
};
use App\Traits\Responses;
use Illuminate\Support\Facades\Auth;
use App\Services\PhoneValidationService;


class CompaniesController extends Controller
{
    use Responses;

    public function __construct(protected PhoneValidationService $validator) {}

    public function index()
    {
        return $this->indexOrShowResponse('Done successfully...!',Company::select('id', 'name')->get());
    }



    public function store(CreateCompanyRequest $request)
    {
        $user = Auth::user();
        if (!$this->validator->validatePhoneNumber($user->phone)) {
            return $this->sudResponse('Invalid phone number', 422);
        }
        $company = $user->companies()->create($request->all());
        return $this->sudResponse('company created successfully...!');
    }




    public function show(string $id)
    {
        $company = Company::with(['user', 'country', 'inquiries'])->FindOrFail($id);
        return $this->indexOrShowResponse($company, 'done successfully....!');
    }




    public function update(UpdateCompanyRequest $request, string $id)
    {
        $company = Company::FindOrFail($id);
        $company->update($request->all());
        return $this->sudResponse('Company updated successfully...!');
    }


    public function destroy(string $id)
    {
        $company = Company::FindOrFail($id);
        $company->delete();
        return $this->sudResponse('company deleted successfully...!');
    }
}
