<?php


namespace Modules\BackOffice\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
class AuthRepository extends BaseRepository
{
    /**
     * Class constructor.
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
