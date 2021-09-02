<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\EmployeeRequest;
use App\Models\Project;
use App\Models\User;
use App\Traits\ApiResponser;

class EmployeeController extends ApiController
{
    use ApiResponser;

    public function callAction($method, $parameters)
    {
        return parent::callAction($method, $parameters); // TODO: Change the autogenerated stub
    }

    public function index()
    {
        $employees = User::where('manage_id', '=', null)->paginate(request()->all());

        return $this->success($employees, 200);
    }

    public function list()
    {
        $employees = User::where('manage_id', '=', null)->get();
        $employees = collect($employees)->pluck('email', 'id');

        return $this->success($employees, 200);
    }

    public function show($id)
    {
        $employee = User::find($id);
        if (empty($employee)) {
            return $this->error('Project not exists.', 403);
        }
        return $this->success(['employee' => $employee, 'department' => $employee->department->first()]);
    }

    public function store(EmployeeRequest $request)
    {
        $attr = $request->validated();
        $user = User::create($attr);
        if (! empty($user)) {
            $user->department()->attach($request->get('department_id'));
        }

        return $this->success([], 'Employee created.', 201);
    }

    public function update($id ,EmployeeRequest $request)
    {
        $attr = $request->validated();
        $user = User::find($id);

        if ($user->update($attr)) {
            $user->department()->detach();
            $user->department()->attach($request->get('department_id'));
        }

        return $this->success([], 'Employee updated.', 201);
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            $this->error('User not found', 403);
        }
        $user->delete();
        return $this->success([], 'Employee deleted.', 201);
    }
}
