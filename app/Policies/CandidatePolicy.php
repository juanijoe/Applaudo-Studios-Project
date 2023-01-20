<?php

namespace App\Policies;

use App\Models\Candidate;
use App\Models\Postulation;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class CandidatePolicy
{
    use HandlesAuthorization;

    public function update(Candidate $candidate, Postulation $postulation)
    {
        return $candidate->id === $postulation->candidate_id
            ? Response::allow()
            : Response::deny('Postulation does not belong to');
    }
}
