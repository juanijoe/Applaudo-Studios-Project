<?php

namespace App\Services;

class JsonFile implements ParseFiler
{
    public function parseFile($file_stored)
    {
        return json_decode($file_stored);
    }
}
