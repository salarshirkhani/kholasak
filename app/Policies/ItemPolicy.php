<?php

namespace App\Policies;

use App\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

trait ItemPolicy
{
    use HandlesAuthorization;

    protected static abstract function getItemType(): string;

    public function before(User $user, $ability)
    {
        if ($user->type == 'admin')
            return true;
        return null;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product|\App\Service $item
     * @return mixed
     */
    public function view(User $user, $item)
    {
        return !empty($item->company->creator) && $item->company->creator->is($user) && $user->type == 'owner';
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $sub = $user->defaultSubscription();
        return (
            !empty($user->company) &&
            $user->type == 'owner' &&
            $user->company->type == static::getItemType() &&
            !empty($sub) &&
            $sub->canUseFeature('max_items')
        );
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\User $user
     * @param  \App\Product|\App\Service $item
     * @return mixed
     */
    public function update(User $user, $item)
    {
        $type = $item instanceof Product ? 'product' : 'service';
        return
            $this->create($user) &&
            $type == static::getItemType() &&
            !empty($item->company->creator) &&
            $item->company->creator->is($user) &&
            $item->company->is($user->company);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product|\App\Service $item
     * @return mixed
     */
    public function delete(User $user, $item)
    {
        return $this->update($user, $item);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product|\App\Service $item
     * @return mixed
     */
    public function restore(User $user, $item)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product|\App\Service $item
     * @return mixed
     */
    public function forceDelete(User $user, $item)
    {
        return false;
    }
}
