<?php

namespace Modules\BackOffice;
use App\Models\Setting;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;

class SettingRepository extends BaseRepository
{
    public function __construct(Setting $setting){
        $this->model = $setting;
    }
    // public function paginate(int $per_page):LengthAwarePaginator{
    //     $baseQuery = $this->model;
    //     // $query = 
    //     // return $query->paginate($per_page)->appends(request()->query());
    //     // ****** gunakan pagination spatie ******
    // }
}
