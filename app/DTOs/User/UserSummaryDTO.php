<?php

namespace App\DTOs\User;

use App\DTOs\DTO;
use App\Models\User;

class UserSummaryDTO extends DTO
{

    public string $name;
    public string $enrollment;
    public int $institution_id;
    public int $classroom;
    public string $email;
    public string $role;

    public function __construct(User $user)
    {
        $this->name = $user->name;
        $this->enrollment = $user->enrollment;
        $this->institution_id = $user->institution_id;
        $this->classroom = $user->classroom;
        $this->email = $user->email;
        $this->role = $user->role;
    }
}
