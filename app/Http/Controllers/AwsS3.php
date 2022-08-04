<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Category;

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
        $currentDirectory = $request->query('path') ?? auth()->user()->name;

        // extract first parent directory from current directory
        $parentDirectory = explode('/', $currentDirectory)[0];
        // if parent directory not is name of user not privilegies for access to other user directory
        if ($parentDirectory !== auth()->user()->name) {
            return redirect()->back()->with('error', 'You have no privileges for this directory');
        }

        // check if current directory exits in S3
        if (!Storage::disk('s3')->exists($currentDirectory)) {
            return redirect()->back()->with('error', 'Directory not found');
        }

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

        $users = User::where('id', '!=', auth()->user()->id)->get();
        $categories = Category::all();

        return view('dashboard.dashboardBase', ['directories' => $directories, 'files' => $files, 'currentDirectory' => $currentDirectory, 'users' => $users, 'categories' => $categories]);
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
                $fileName = $request->name ? $request->name . '.' . $file->getClientOriginalExtension() : $file->getClientOriginalName();

                // Set config for upload
                $config = [
                    'visibility' => $request->visibility
                ];
                if ($request->has('category')) {
                    $config['Tagging'] = 'category=' . $request->category;
                }

                // Upload file
                Storage::disk('s3')->put(
                    $request->currentDirectory . '/' . $fileName,
                    file_get_contents($file),
                    $config
                );

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
        if ($request->type == 'd') {
            // If delete directory is shared directory not allowed remove
            if ($request->path == auth()->user()->name . '/shared') {
                return redirect()->back()->with('error', 'You cant delete shared directory');
            }

            Storage::disk('s3')->deleteDirectory($request->path);
        } else {
            Storage::disk('s3')->delete($request->path);
        }

        return redirect()->back()->with('success', ($request->type == 'd' ? 'Directory' : 'File') . ' deleted successfully');
    }

    public function privacity(Request $request)
    {
        // dd($request->all());
        Storage::disk('s3')->setVisibility($request->path, $request->visibility);

        return redirect()->back()->with('success', 'Change privacity successfully');
    }

    public function move(Request $request)
    {
        // Check if request exists source and target
        if ($request->has('source') && $request->has('target')) {
            $nameFile = getLastChildFromPath($request->source);

            // Move file from one directory to another
            Storage::disk('s3')->move($request->source, $request->target . '/' . $nameFile);
            return redirect()->back()->with('success', 'File move success');
        } else {
            return redirect()->back()->with('error', 'Select source and target');
        }
    }

    public function shared(Request $request)
    {
        // Check if request exists source and target
        if ($request->has('source') && $request->has('user')) {
            $nameFile = getLastChildFromPath($request->source);

            // Copy file from one directory to another
            Storage::disk('s3')->copy($request->source, $request->user . '/shared/' . $nameFile);
            return redirect()->back()->with('success', 'File shared success with ' . $request->user);
        } else {
            return redirect()->back()->with('error', 'Select source and user');
        }
    }

    public function get(Request $request)
    {
        // Check if request exists source and target
        if ($request->has('path')) {
            $file = Storage::disk('s3')->get($request->path);
            return response($file)->header('Content-Type', 'application/octet-stream');
        } else {
            return redirect()->back()->with('error', 'Select file');
        }
    }
}
