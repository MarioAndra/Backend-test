<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Company,
    Inquiry,
    User
};
use App\Services\PhoneValidationService;

use App\Http\Requests\CreateInquiryReuest;
use Illuminate\Support\Facades\Auth;

class InquiriesController extends Controller
{
    public function __construct(protected PhoneValidationService $validator) {}

    public function create()
    {
        $companies = Company::all();
        return view('inquiries.create', compact('companies'));
    }


    public function store(CreateInquiryReuest $request)
    {
        $user = Auth::user();
        if (!$this->validator->validatePhoneNumber($user->phone)) {
            return view('Invalid.MeesageValid');
        }
        $user->inquiries()->create($request->all());
        return redirect()->back()->with('success', 'Inquiry sent successfully!');
    }
}
