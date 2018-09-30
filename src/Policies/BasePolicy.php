<?php

namespace Oxygencms\Core\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;

    /**
     * Users with the specified role and superuser should have full access.
     *
     * @param User $user
     *
     * @return mixed
     */
    public function before(User $user)
    {
        if ($user->superuser || $user->can('access-backoffice')) {
            return true;
        }

        return null;
    }
}
