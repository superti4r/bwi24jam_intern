<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WebsiteInformation;

class WebsiteInformationPolicy
{
    /**
     * Determine whether the user can view the singleton.
     */
    public function view(User $user, WebsiteInformation $websiteInformation): bool
    {
        return $user->hasRole('administrator');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, WebsiteInformation $websiteInformation): bool
    {
        return $user->hasRole('administrator');
    }
}
