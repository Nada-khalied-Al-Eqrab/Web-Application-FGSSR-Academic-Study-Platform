<?php
/*
========================================
File: FileController.php

Description:
Controller responsible for managing uploaded files
inside the system (CRUD operations + validation + upload handling).

Purpose:
- Handles file upload, update, delete, and listing
- Manages file storage in public/assets/FSSR_files
- Provides file preview and download views
- Validates uploaded documents (PDF, DOCX, PPTX, ZIP)

Main Functions:

- index():
  Retrieves all uploaded files and displays them in a table view

- create():
  Returns the file upload form view

- store(Request $request):
  Validates input and uploads file to storage then saves record in database

- show($id):
  Displays a specific file inside an iframe preview page

- edit($id):
  Returns the edit form for a specific file

- update(Request $request, $id):
  Updates file metadata and replaces file if a new one is uploaded

- destroy($id):
  Deletes a specific file record from database

- destroyAll():
  Deletes all file records from database

- showindex():
  Displays files on main index page

Validation Rules:
- name: required string
- description: required string
- file_link: required file (pdf, docx, pptx, zip), max 20MB

Storage Path:
- assets/FSSR_files

Trait Used:
- Common (for file upload handling and shared utilities)

Author:
Christin Mokbel

Notes:
- Files are stored physically on server and referenced in DB
- Upload is handled via custom uploadFile() method from Common trait
========================================
*/
namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Traits\Common;


class FileController extends Controller
{
    use Common;

    public function index()
    {
        $files = File::get();
        return view('table-file', compact('files'));
    }

    public function create()
    {
        return view('form-file');
    }

    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name' => 'required|string|',
            'description' => 'required|string',
            'file_link' => 'required|file|mimes:pdf,docx,pptx,zip|max:20480'
        ], $messages);
        $fileName = $this->uploadFile($request->file_link, 'assets/FSSR_files');
        $data['file_link'] = $fileName;
        File::create($data);
        return redirect('file/files');
    }

    public function show(string $id)
    {
        $file = File::findOrFail($id);
        return view('iframe-show-file', compact('file'));
    }

    public function edit(string $id)
    {
        $file = File::findOrFail($id);
        return view('form-file', compact('file'));
    }

    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'file_link' => 'sometimes',
        ], $messages);
        if ($request->hasFile('file_link')) {
            $fileName = $this->uploadFile($request->file_link, 'assets/FSSR_files');
            $data['file_link'] = $fileName;
        }
        File::where('id', $id)->update($data);
        return redirect('file/files');
    }

    public function destroy(string $id)
    {
        File::where('id', $id)->delete();
        return redirect('file/files');
    }

    public function destroyAll()
    {
        File::truncate();
        return redirect('file/files');
    }

    public function showindex()
    {
        $files = File::get();
        return view('index', compact('files'));
    }

    public function messages()
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'name.string' => 'يجب ان يكون نص ',
            'description.required' => 'هذا الحقل مطلوب',
            'description.string' => 'يجب ان يكون نص',
            'file_link.required' => 'هذا الحقل مطلوب',
        ];
    }
}
