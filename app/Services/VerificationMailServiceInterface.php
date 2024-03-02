<?php

namespace App\Services;

use App\Models\User;

interface VerificationMailServiceInterface
{
    public function sendVerificationEmail(User $user);
}
