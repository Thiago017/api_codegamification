<?php

namespace App\Enums;

enum UserRoles: string
{
    CASE STUDENT = 'student';
    CASE TEACHER = 'teacher';
    CASE DIRECTOR = 'director';
    CASE ADMIN = 'admin';
}
