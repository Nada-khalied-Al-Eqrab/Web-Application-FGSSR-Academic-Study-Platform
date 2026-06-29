<?php
/*
========================================
File: SearchableTrait.php

Description:
Reusable trait that provides dynamic search
functionality for models based on request input.

Purpose:
- Applies search filtering on given model
- Supports searching across multiple columns
- Returns paginated results with query string

Function:
- applySearch($model, Request $request, array $columns):
  Builds a query and filters results if 'search'
  parameter exists in the request.

Parameters:
- $model: Target model class
- $request: HTTP request instance
- $columns: Array of column names to search in

Features:
- Uses LIKE operator for partial matching
- Supports multiple columns dynamically
- Pagination set to 10 results per page

Author:
Christin Mokbel

Notes:
- Uses Laravel query builder
- Maintains search query in pagination links
- Helps avoid code duplication across controllers
========================================
*/
namespace App\Traits;

use Illuminate\Http\Request;

trait SearchableTrait
{
    public function applySearch($model, Request $request, array $columns)
    {
        $query = $model::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($columns, $search) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'like', "%{$search}%");
                }
            });
        }
        return $query->paginate(10)->withQueryString();
    }
}
