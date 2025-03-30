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
use App\Services\PhoneValidationService;
use Exception;

class CompaniesController extends Controller
{
    use Responses;

    public function __construct(protected PhoneValidationService $validator) {}

    public function index()
    {
        return $this->indexOrShowResponse('Done successfully...!', Company::select('id', 'name')->get());
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
        $company = Company::with(['user', 'country'])->FindOrFail($id);
        return $this->indexOrShowResponse('done successfully....!', $company);
    }




    public function update(UpdateCompanyRequest $request, string $id)
    {
        $company = Company::FindOrFail($id);
        $company->update($request->all());
        return $this->sudResponse('Company updated successfully...!');
    }


    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $company = Company::FindOrFail($id);
            $company->delete();
            DB::commit();
            return $this->sudResponse('company deleted successfully...!');
        } catch (Exception $e) {
            DB::rollBack();
            $this->sudResponse($e, 500);
        }
    }
}
