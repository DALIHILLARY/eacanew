<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
 
class FileUploadController extends Controller
{
    public function process(Request $request): string
    {
        // We don't know the name of the file input, so we need to grab
        // all the files from the request and grab the first file.
        /** @var UploadedFile[] $files */
        $files = $request->allFiles();
 
        if (empty($files)) {
            abort(422, 'No files were uploaded.');
        }
 
        if (count($files) > 1) {
            abort(422, 'Only 1 file can be uploaded at a time.');
        }
 
        // Now that we know there's only one key, we can grab it to get
        // the file from the request.
        $requestKey = array_key_first($files);
 
    
        // Store either array or single image

        if(is_array($request->input($requestKey))) {

            $paths =  Arr::map($request->file($requestKey), function($file) {
                return $file->store(
                    path: 'tmp/'.now()->timestamp.'-'.Str::random(20)
                );
            });

            return $paths;
            
        }else {
            $file = $request->file($requestKey);
            $path = $file->store(
                path: 'tmp/'.now()->timestamp.'-'.Str::random(20)
            );
            error_log($path);

            return $path;
        }

    }
}