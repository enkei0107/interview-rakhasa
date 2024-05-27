<?php

namespace Modules\FrontOffice;
use App\Models\Attendace;
use App\Repositories\BaseRepository;

class AttendanceRepository extends BaseRepository
{
    public function __construct(Attendace $attendace){
        $this->model = $attendace;
    }
    public function checkAttendanceIsCreated(){
        //buatlah fungsi apakah data presensi sudah dibuat dari scheduler
    }
}
