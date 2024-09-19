<?php

namespace App\DTOs;

abstract class DTO
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
