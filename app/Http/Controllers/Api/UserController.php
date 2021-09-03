<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Department;
use App\Models\Manage;
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

        $department = Department::where('access_code', $attr['access_code'])->first();

        if ( empty($department)) {
            return $this->error('Access code invalid', 401);
        }


        $user = User::create($attr);

        if(!empty($department)){
            $department->users()->save($user);
        }

        return $this->success([]);
    }
    /**
     * Register
     */
    public function registerManager(RegisterRequest $request)
    {
        $attr = $request->validated();

        $manage = Manage::where('access_code', $attr['access_code'])->first();

        if (empty($manage)) {
            return $this->error('Manage Access code invalid', 401);
        }

        $attr['manage_id'] = $manage->id;

        User::create($attr);

        !empty($manage) ? $manage->delete(): false;

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
            'access_token' => auth()->user()->createToken('access_token')->plainTextToken,
            'is_manager' => !empty(auth()->user()->manage_id)
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
            'message' => 'User authenticated',
            'is_manager' => !empty(auth()->user()->manage_id)
        ]);
    }
}
