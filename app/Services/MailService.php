<?php

namespace App\Services;

use App\Mail\PostulationUpdate;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function send($email)
    {
        return Mail::to($email->email)->send(new PostulationUpdate($email));
    }
}
