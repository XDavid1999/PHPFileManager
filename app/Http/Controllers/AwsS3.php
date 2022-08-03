<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class AwsS3 extends Controller
{
    private function getNameFromPath($path)
    {
        $path = explode('/', $path);
        return end($path);
    }

    public function index(Request $request)
    {
        $currentDirectory = $request->query('path') ?? 'test';

        $files = Storage::disk('s3')->files($currentDirectory);
        $directories = Storage::disk('s3')->directories($currentDirectory);

        $files = array_map(function ($file) {
            return [
                'name' => $this->getNameFromPath($file),
                'path' => $file,
                'visibility' => Storage::disk('s3')->getVisibility($file)
            ];
        }, $files);

        $directories = array_map(function ($directory) {
            return [
                'name' => $this->getNameFromPath($directory),
                'path' => $directory,
            ];
        }, $directories);

        return view('dashboard.dashboardBase', ['directories' => $directories, 'files' => $files, 'currentDirectory' => $currentDirectory]);
    }

    public function upload(Request $request)
    {
        // If in request exists type
        if ($request->has('type')) {
            // If type is directory
            if ($request->type == 'd') {
                // Create directory
                Storage::disk('s3')->makeDirectory($request->currentDirectory . '/' . $request->name);
                // Return to index
                return redirect()->back()->with('success', 'Directory created');
            } else {
                $file = $request->file('file');
                if ($file == null) {
                    // check if file is null
                    return redirect()->back()->with('error', 'No file selected');
                }
                // Get original name
                $fileName = $file->getClientOriginalName();
                // Upload file
                Storage::disk('s3')->put($request->currentDirectory . '/' . $fileName, file_get_contents($file));

                return redirect()->back()->with('success', 'File uploaded successfully');
            }
        } else {
            // If in request not exists type
            // Return to index
            return redirect()->route('index');
        }
    }

    public function destroy(Request $request)
    {
        $request->type == 'd' ?  Storage::disk('s3')->deleteDirectory($request->path) : Storage::disk('s3')->delete($request->path);

        return redirect()->back()->with('success', ($request->type == 'd' ? 'Directory' : 'File') . ' deleted successfully');
    }

    public function privacity(Request $request)
    {
        Storage::disk('s3')->setVisibility($request->path, $request->visibility);

        return redirect()->back()->with('success', 'Change privacity successfully');
    }
}
