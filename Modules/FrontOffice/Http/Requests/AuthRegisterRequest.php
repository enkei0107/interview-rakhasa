<?php

namespace Modules\FrontOffice\Http\Requests;

use App\Enums\MemberAccountTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class AuthRegisterRequest extends FormRequest
    {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
        {
        return [
            'name'                  => ['required', 'string'],
            'email'                 => ['required', 'email', 'string'],
            'roles'                 => ['required', 'string', new Enum(MemberAccountTypeEnum::class)],
            'password'              => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => 'required'
        ];
        }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
        {
        return true;
        }
    }
