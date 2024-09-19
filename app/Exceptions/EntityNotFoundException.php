<?php

namespace App\Exceptions;

use RuntimeException;

class EntityNotFoundException extends RuntimeException
{
    public function getStatusCode() {
        return $this->code;
    }
}
