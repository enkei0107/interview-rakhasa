<?php

namespace Modules\BackOffice\Http\Controllers;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\BackOffice\Http\Requests\SettingIndexRequest;
use Modules\BackOffice\Http\Requests\SettingStoreRequest;
use Modules\BackOffice\SettingRepository;

class SettingController extends Controller
{
    private SettingRepository $settingRepository;
    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }
    public function index(SettingIndexRequest $settingIndexRequest){
        try {
            //code...
            // buatlah pagination untu get semua data setting dan tambahkan filter by key
        } catch (\Exception $exception) {
            return ApiResponse::error(__('list.error'),['general'=>$exception->getMessage()]);
        }
    }
    public function store(SettingStoreRequest $settingStoreRequest){
        $payload = $settingStoreRequest->validated();
        try {
            // format kolom setting harus seperti contoh dibawah ini
            // {"value": {"type": "integer", "property": "5000000", "is_active": "1"}}
            //code...
        } catch (\Exception $exception) {
            return ApiResponse::error(__('store.error'), ['general' => $exception->getMessage()]);
        }
    }
}
