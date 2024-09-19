<?php

namespace App\DTOs;

use App\Models\User;

class UserDTO extends DTO
{
    public string $name;
    public string $address;
    public string $city;
    public string $state;
    public string $country;
    public string $contact_email;

    public function __construct(User $user) {
        $this->name = $user->name;
        $this->enrollment = $user->enrollment;
        $this->institution_id = $user->institution_id;
        $this->classroom = $user->classroom;
        $this->email = $user->email;
        $this->role = $user->role;
    }
}
