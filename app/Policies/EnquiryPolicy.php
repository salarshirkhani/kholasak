<?php

namespace App\Policies;

use App\Company;
use App\Enquiry;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnquiryPolicy
{
    use HandlesAuthorization;

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
        return $user->type == 'customer' || $user->type == 'owner';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Enquiry  $enquiry
     * @return mixed
     */
    public function view(User $user, Enquiry $enquiry)
    {
        return
            (
                $user->type == 'customer' &&
                $enquiry->creator->is($user)
            ) ||
            (
                $user->type == 'owner' &&
                !empty($user->company) &&
                ($enquiry->relationLoaded('relevantCompanies') && $enquiry->relevantCompanies->contains($user->company) ||
                $enquiry->relevantCompanies()->where('companies.id', $user->company->id)->exists())
            );
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return
            $user->type == 'customer' &&
            (
                !empty($sub = $user->defaultSubscription()) &&
                $sub->canUseFeature('enquiries_per_day')
            );
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Enquiry  $enquiry
     * @return mixed
     */
    public function update(User $user, Enquiry $enquiry)
    {
        return $user->type == 'customer' && $enquiry->creator->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Enquiry  $enquiry
     * @return mixed
     */
    public function delete(User $user, Enquiry $enquiry)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Enquiry  $enquiry
     * @return mixed
     */
    public function restore(User $user, Enquiry $enquiry)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Enquiry  $enquiry
     * @return mixed
     */
    public function forceDelete(User $user, Enquiry $enquiry)
    {
        return false;
    }
}
