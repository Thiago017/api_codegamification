<?php

namespace App\DTOs\User;

use App\DTOs\DTO;
use App\DTOs\Institution\InstitutionSummaryDTO;
use App\Models\User;

class UserDTO extends DTO
{

    public string $name;
    public string $enrollment;
    public int $institution_id;
    public int $classroom;
    public string $email;
    public string $role;

    public InstitutionSummaryDTO $institution;

    public function __construct(User $user) {
        $this->name = $user->name;
        $this->enrollment = $user->enrollment;
        $this->institution_id = $user->institution_id;
        $this->classroom = $user->classroom;
        $this->email = $user->email;
        $this->role = $user->role;

        $this->institution = new InstitutionSummaryDTO($user->institution);
    }
}
