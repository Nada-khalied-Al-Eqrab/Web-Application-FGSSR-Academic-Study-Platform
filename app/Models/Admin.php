<?php
/*
========================================
File: Admin.php

Description:
Eloquent model representing the Admin entity.
Handles admin-related data and relationships.

Features:
- Defines fillable attributes for mass assignment
- Links admin to User model via belongsTo relationship
- Provides helper method to check admin type

Fillable Fields:
- user_id: Reference to users table
- type: Admin type (super / normal)
- code, password, role, state, name, phone

Methods:
- user():
  Defines relationship with User model

- isSuper():
  Checks if admin type is 'super'

Author:
Nada Khaled

Notes:
- Uses Notifiable trait for notifications support
- Designed for role-based admin management
========================================
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id',
        'type',
        'code',
        'password',
        'role',
        'state',
        'name',
        'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isSuper()
    {
        return $this->type === 'super';
    }
}
