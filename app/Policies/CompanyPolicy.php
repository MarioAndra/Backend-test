<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Company;
use Illuminate\Auth\Access\Response;

class CompanyPolicy
{
    public function viewAny(User $user): bool
    {

        return true;
    }

    public function view(User $user, Company $company): bool
    {

        return true;
    }

    public function create(User $user): bool
    {

        return true;
    }

    public function update(User $user, Company $company): bool
    {

        return $user->id === $company->user_id;
    }

    public function delete(User $user, Company $company): bool
    {

        return $user->id === $company->user_id;
    }
}
