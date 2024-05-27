<?php

namespace Modules\FrontOffice\Http\Controllers;

use App\Enums\SettingEnum;
use App\Helpers\ApiResponse;
use App\Models\Member;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\FrontOffice\Http\Requests\AuthLoginRequest;
use Modules\FrontOffice\Http\Requests\AuthRegisterRequest;
use Modules\FrontOffice\Repositories\AuthRepository;

class AuthController extends Controller
    {
    /**
     * Class constructor.
     */
    private AuthRepository $authRepository;
    public function __construct(AuthRepository $authRepository)
        {
        $this->authRepository = $authRepository;
        }

    public function login(AuthLoginRequest $authLoginRequest)
        {
        $payload = $authLoginRequest->validated();
        try {
        dd(config(SettingEnum::STUDY_STARTING_TIME_SETTING->value));
            $credentials = $authLoginRequest->only('email', 'password');

            $token = Auth::attempt($credentials);
            if (!$token) {
                return ApiResponse::unAuthorized("login.unauthorized", ["general" => "username or password is is invalid"]);
                }

            return ApiResponse::success(__("login.success"), [
                'token'      => $token,
                'type'       => 'bearer',
                'role'       => Auth::user()->account_type,
                'expires_in' => auth()->factory()->getTTL() * 60
            ]);
            } catch (\Exception $exception) {
            return ApiResponse::error(__('error'), ['general' => $exception->getMessage()]);
            }
        }

    public function register(AuthRegisterRequest $authRegisterRequest)
        {
        $payload = $authRegisterRequest->validated();
        DB::beginTransaction();
        try {
            $password = Hash::make($payload['password']);
            $member   = Member::create([
                'name'         => $payload['name'],
                'email'        => $payload['email'],
                'password'     => $password,
                'account_type' => $payload['roles']
            ]);

            $token = Auth::attempt($authRegisterRequest->only('email', 'password'));
            if (!$token) {
                DB::rollBack();
                return ApiResponse::unAuthorized(__("registration.unauthorized"), ["general" => "Unable to generate token"]);
                }

            DB::commit();
            return ApiResponse::success(__("registration.success"), [
                'token'      => $token,
                'type'       => 'bearer',
                'role'       => $member->account_type,
                'expires_in' => auth()->factory()->getTTL() * 60
            ]);
            } catch (\Exception $exception) {
            DB::rollBack();
            return ApiResponse::error(__('error'), ['general' => $exception->getMessage()]);
            }
        }
    public function logout()
        {
        try {
            auth()->logout();
            $token = request()->bearerToken();
            Auth::invalidate($token);
            return ApiResponse::success(__("success.logout"), null);
            } catch (\Exception $exception) {
            return ApiResponse::error(__('error'), ['general' => $exception->getMessage()]);
            }
        }
    }

