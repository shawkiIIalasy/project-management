<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Department;
use App\Models\Privilege;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use ApiResponser;

    /**
     * Register
     */
    public function register(RegisterRequest $request)
    {
        $attr = $request->validated();

        $privilegeEmployee = Department::where('access_code', $attr['access_code'])->first();
        $privilegeManager = Privilege::where('manage_access_code', $attr['access_code'])->first();

        if (empty($privilegeEmployee) && empty($privilegeManager)) {
            return $this->error('Access code invalid', 401);
        }

        $attr['privilege_id'] = ! empty($privilegeEmployee) ? $privilegeEmployee->id : $privilegeManager->id;

        User::create($attr);

        return $this->success([]);
    }

    /**
     * Login
     */
    public function login(LoginRequest $request)
    {

        if (! Auth::attempt($request->only(['email', 'password']))) {
            return $this->error('Credentials not match', 401);
        }

        return $this->success([
            'access_token' => auth()->user()->createToken('access_token')->plainTextToken
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return $this->success([
            'message' => 'Tokens Revoked'
        ]);
    }

    public function authenticated()
    {
        return $this->success([
            'message' => 'User authenticated'
        ]);
    }
}
