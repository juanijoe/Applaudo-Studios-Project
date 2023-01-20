<?php

namespace App\Services;

use TheSeer\Tokenizer\Exception;

class CsvFile implements ParseFiler
{
    public function parseFile($file_stored)
    {
        $file_loaded = file_get_contents('..' . $file_stored->path, FALSE);
        $data_array = array_map('str_getcsv', explode(PHP_EOL, $file_loaded));
        $header = $data_array[0];
        $elements = count($data_array);

        unset($data_array[0], $data_array[$elements - 1]);

        if ($elements < 3) {
            return $header;
        }
        $i = 1;
        foreach ($data_array as $row) {
            $product[$i] = array_combine($header, $row);
            $i++;
        }
        $json = json_encode($product);

        return json_decode($json);
    }
}
