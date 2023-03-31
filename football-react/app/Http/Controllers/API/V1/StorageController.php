<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorageRequest;
use App\Models\StorageM;
use App\Http\Resources\StorageResource;
use http\Env\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    public function upload(StorageRequest $storageRequest)
    {
        $file = $storageRequest->file('file');
        $original_name = $file->getClientOriginalName();
        $hash=sha1($file->getClientOriginalName());
        $fileName = $hash . '.' . $file->getClientOriginalExtension();
        $path_to_storage = Storage::disk('public')->putFileAs('images',$storageRequest->file('file'),$fileName);
        $storage = StorageM::query()->insert(
            [
                'name'=>$original_name,
                'path'=>$path_to_storage,
                'hash'=>$hash,
                'size'=>$file->getSize(),
                'extension'=>$file->getClientOriginalExtension()
            ]
        );
        return response()->json([
            'data' => $storage
        ]);

    }
}
