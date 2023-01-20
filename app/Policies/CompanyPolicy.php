<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Position;
use Faker\Provider\zh_TW\Company;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function update(Company $company, Position $position)
    {
        return $company->id === $position->company_id
            ? Response::allow()
            : Response::deny('Position does not belong to the company');
    }
}
