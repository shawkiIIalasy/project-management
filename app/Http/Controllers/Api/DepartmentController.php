<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DepartmentController extends ApiController
{
    use ApiResponser;

    public function __construct()
    {
    }

    public function index()
    {
        $departments = Department::all();
        return $this->success($departments, 200);
    }
}
