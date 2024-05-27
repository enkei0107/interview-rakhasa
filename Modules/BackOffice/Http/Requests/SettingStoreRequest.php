<?php

namespace Modules\BackOffice\Http\Requests;

use App\Enums\SettingEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class SettingStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "key" => ['required', 'string', new Enum(SettingEnum::class)],
            "setting" => ['required'],
            "setting.is_active" => ['required', 'int', 'min:0', 'max:1'],
            "setting.type" => ['required'],
            "setting.property" => ['required'],
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
