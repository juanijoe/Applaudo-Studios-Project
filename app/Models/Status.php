<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    public function postulation()
    {
        return $this->hasMany(Postulation::class);
    }
    public function report()
    {
        return $this->hasMany(Report::class);
    }
}
