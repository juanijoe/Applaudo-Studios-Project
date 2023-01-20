<?php

namespace App\Services;

use App\Services\ParseFiler;

class ParseService implements ParseFiler
{
    public function __construct(protected CsvFile $csvFile, protected JsonFile $jsonFile)
    {
    }
    public function parseFile($file_stored)
    {
        if ($file_stored->extension == 'csv') {
            return $this->csvFile->parseFile($file_stored);
        }
        return $this->jsonFile->parseFile($file_stored);
    }
}
