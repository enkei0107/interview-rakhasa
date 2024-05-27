<?php

namespace Modules\FrontOffice\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class AttendanceStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status'=>['required','string'],
            "date_time" => ['required', 'string',]
        ];
    }

    public function validationData()
    {
        // buatlah validation data untuk mengatur value status presensi
        // dimana aturan jam masuk ,keterlambatan dan lain lain diambil dari tabel setting
        // yang di loadg menjadi config
        $newData = array_merge($this->all(), [
            "date_time" => Carbon::now()->tz('Asia/Jakarta')->toIso8601String(),
        ]);
        return $newData;
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
