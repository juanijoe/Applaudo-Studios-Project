<?php

namespace App\Policies;

use App\Models\Position;
use App\Models\Recruiter;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecruiterPolicy
{
    use HandlesAuthorization;

    public function update(Recruiter $recruiter, Position $position)
    {
        return $recruiter->id === $position->recruiter_id
            ? Response::allow()
            : Response::deny('Position does been assigned to');
    }
}
