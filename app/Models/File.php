<?php
/*
========================================
File: File.php

Description:
Eloquent model representing files stored
in the system.

Purpose:
- Stores file metadata such as name,
  description, and file link
- Used to manage uploaded or shared files

Fillable Fields:
- name: File name
- description: File description/details
- file_link: Path or URL to the file

Author:
Nada Khaled

Notes:
- Simple model without relationships
- Can be extended later if files are linked
  to courses, users, or other entities
========================================
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'name',
        'description',
        'file_link',
    ];
}
