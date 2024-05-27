<?php


namespace Modules\FrontOffice\Repositories;

use App\Models\Member;
use App\Repositories\BaseRepository;
class AuthRepository extends BaseRepository
{
    public function __construct(Member $member) {
        $this->model = $member;
    }
}
