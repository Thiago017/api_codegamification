<?php

namespace App\DTOs\Institution;

use App\DTOs\DTO;
use App\DTOs\User\UserSummaryDTO;
use App\Models\Institution;

class InstitutionDTO extends DTO
{
    public string $name;
    public string $address;
    public string $city;
    public string $state;
    public string $country;
    public string $contact_email;

    public array $users;

    public function __construct(Institution $institution) {
        $this->name = $institution->name;
        $this->address = $institution->address;
        $this->city = $institution->city;
        $this->state = $institution->state;
        $this->country = $institution->country;
        $this->contact_email = $institution->contact_email;

        $this->users = $institution->users->map(function($user) {
            return new UserSummaryDTO($user);
        })->toArray();
    }
}
