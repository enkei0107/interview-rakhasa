<?php

namespace Modules\FrontOffice\Http\Controllers;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\FrontOffice\AttendanceRepository;
use Modules\FrontOffice\Http\Requests\AttendanceStoreRequest;

class AttendanceController extends Controller
{
    private AttendanceRepository $attendanceRepository;
    public function __construct(
        AttendanceRepository $attendanceRepository
    ) {
        $this->attendanceRepository = $attendanceRepository;
    }

    public function store(AttendanceStoreRequest $attendanceStoreRequest)
    {
        try {
            //code...
        } catch (\Exception $exception) {
            return ApiResponse::error(__('store.error'), ['general' => $exception->getMessage()]);
        }
    }

}
