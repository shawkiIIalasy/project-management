<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DepartmentController extends ApiController
{
    use ApiResponser;

    public function __construct()
    {
        $response = Gate::inspect('isManager');
        if ($response->allowed()) {
            return $this->error($response->message(), 403);
        }
    }

    public function index()
    {
        $departments = Department::all();
        return $this->success($departments, 200);
    }

    public function store(DepartmentRequest $request)
    {
        $attr = $request->validated();

        $attr['created_by_user_id'] = auth()->user()->id;

        Department::create($attr);

        return $this->success([],'Department created.',201);

    }
}
