<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Services\RegisterFile;
use App\Services\ParseService;
use App\Services\StoreService;

class FileUploadController extends Controller
{
    public function __construct(protected StoreService $storeService, protected ParseService $parseService)
    {
    }
    public function index()
    {
        return view('file-upload');
    }

    public function show(Request $request, RegisterFile $registerFile)
    {
        if ($request->validate(File::$rules)) {

            //load file and parse

            $file = $request->file;

            $file_stored = $registerFile->persist($file);

            //dd(var_dump($file_stored->extension));

            $file_parsed = $this->parseService->parseFile($file_stored);

            //dd($file_parsed);

            $this->storeService->save($file_parsed);

            //return file types and register database

            $elements = count($file_parsed);

            //if($user == null || $isAdmin->verify($user) !='Admin'){
            //    return response([
            //        'only admin user can import products'
            //    ],401);
            //}
            //return response([
            //   'products' => $json
            //],200)

            return back()
                ->with('success', 'File has been uploaded.')
                ->with('name', $file_stored->fileName)
                ->with('ext', $file_stored->fileExt)
                ->with('size', $file_stored->fileSize)
                ->with('path', $file_stored->realPath)
                ->with('products', $file_parsed)
                ->with('items', $elements);
        }
        return back()
            ->with('fail', 'No such a file');
    }
}
