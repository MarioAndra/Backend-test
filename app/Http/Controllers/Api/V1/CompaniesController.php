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
use Illuminate\Support\Facades\{
    Auth,
    DB
};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Services\PhoneValidationService;
use Exception;

class CompaniesController extends Controller
{
    use Responses, AuthorizesRequests;



    public function __construct(protected PhoneValidationService $validator)
    {
        $this->authorizeResource(Company::class, 'company');
    }



    public function index()
    {
        return $this->indexOrShowResponse('Done successfully...!', Company::paginate(5));
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




    public function show(Company $company)
    {

        return $this->indexOrShowResponse('done successfully....!', $company->load(['user', 'country', 'industry']));
    }




    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->all());
        return $this->sudResponse('Company updated successfully...!');
    }


    public function destroy(Company $company)
    {
        DB::beginTransaction();
        try {
            $company->delete();
            DB::commit();
            return $this->sudResponse('company deleted successfully...!');
        } catch (Exception $e) {
            DB::rollBack();
            $this->sudResponse($e->getMessage(), 500);
        }
    }
}
