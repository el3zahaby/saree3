<?php

namespace  App\Http\Controllers\Traits;
use Image;
use Illuminate\Http\Request;
trait HelpersTrait{

    protected function createLog($action , $status , $messages = ''){

    }

    public function saveFiles(Request $request, $path, $name)
    {
        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), 0777);
            mkdir(public_path($path.'/thumb'), 0777);
        }
        $array = [];
        if ($request->files){
            foreach ($request->files as $key => $file) {
                $filename = time() . $name . '-' . $file->getClientOriginalName();
                Image::make($file)->resize(50, 50)->save(public_path($path.'/thumb') . '/' . $filename);
                $file->move(public_path($path), $filename);
                $array[$key] = $filename;
            }
        }
        if (isset($array)) {
            $request = new Request(array_merge($request->all(), $array));
        }
        return $request;
    }

}