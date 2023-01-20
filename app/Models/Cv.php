<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{

    protected $fillable = [
        'candidate_id',
        'candidate_name',
        'cvfile_name',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

}
