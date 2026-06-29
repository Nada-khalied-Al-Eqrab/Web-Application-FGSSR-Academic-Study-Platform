<?php
/*
========================================
File: DiplomaController.php

Description:
Controller responsible for managing diplomas
within the system.

Purpose:
- Handles CRUD operations for diplomas
- Manages diploma images upload and deletion
- Displays list of all diplomas
- Provides editing and updating functionality
- Ensures proper cleanup of stored images

Main Functions:

- index():
  Retrieves all diplomas and displays them
  in a table view.

- create():
  Returns the form used to add a new diploma.

- store(Request $request):
  Creates a new diploma and uploads its image
  to storage.

- edit($id):
  Loads a specific diploma for editing.

- update(Request $request, $id):
  Updates diploma data and handles:
  - Updating image if changed
  - Deleting old image from storage

- destroy($id):
  Deletes a diploma and removes its image from storage.

- deleteAll():
  Deletes all diplomas and cleans all stored images.

Important Notes:
- Images are stored in storage/app/public/diplomas
- Old images are safely removed when replaced or deleted
- Uses Eloquent ORM for database operations

Author:
Nada Khaled

========================================
*/
namespace App\Http\Controllers;

use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DiplomaController extends Controller
{

    public function index()
    {
        $diplomas = Diploma::all();
        return view('table-diploma', compact('diplomas'));
    }

    public function create()
    {
        return view('form-add-diploma');
    }

    public function store(Request $request)
    {
        $path = $request->file('img')->store('diplomas', 'public');
        Diploma::create([
            'img' =>  $path,
            'code' => $request->code,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'description' => $request->description,
        ]);
        return redirect()->route('diplomas.index');
    }

    public function edit($id)
    {
        $diploma = Diploma::find($id);
        return view('form-edit-diploma', compact('diploma'));
    }

    public function update(Request $request, $id)
    {
        $diploma = Diploma::findorfail($id);
        $data = $request->only(['code', 'name_ar', 'name_en', 'description']);
        if ($request->hasFile('img')) {
            $oldImage = ltrim($diploma->img, '/');
            if (
                $oldImage &&
                !str_starts_with($oldImage, 'assets/') &&
                !str_starts_with($oldImage, 'public/assets/') &&
                !str_starts_with($oldImage, '/assets/') &&
                !str_starts_with($oldImage, 'http') // لو مسار خارجي
            ) {
                if (Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            $data['img'] = $request->file('img')->store('diplomas', 'public');
        }
        $diploma->update($data);
        return redirect()->route('diplomas.index');
    }

    public function destroy($id)
    {
        $diploma =  Diploma::findOrFail($id);
        if ($diploma->img) {
            if (
                !str_starts_with($diploma->img, 'assets/') &&
                !str_starts_with($diploma->img, 'public/assets/') &&
                !str_starts_with($diploma->img, '/assets/') &&
                !str_starts_with($diploma->img, 'http')
            ) {
                if (Storage::disk('public')->exists($diploma->img)) {
                    Storage::disk('public')->delete($diploma->img);
                }
            }
        }
        $diploma->delete();
        return redirect()->route('diplomas.index');
    }

    public function deleteAll()
    {
        $diplomas = Diploma::all();
        foreach ($diplomas as $diploma) {
            if ($diploma->img) {
                if (
                    !str_starts_with($diploma->img, 'assets/') &&
                    !str_starts_with($diploma->img, 'public/assets/') &&
                    !str_starts_with($diploma->img, '/assets/') &&
                    !str_starts_with($diploma->img, 'http')
                ) {
                    if (Storage::disk('public')->exists($diploma->img)) {
                        Storage::disk('public')->delete($diploma->img);
                    }
                }
            }
        }
        Diploma::query()->delete();
        return redirect()->route('diplomas.index');
    }
}
