<?php

namespace App\Services\Interfaces;

interface UserServiceInterface
{
    public function findAll();

    public function findById(int $id);

    public function store(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);
}
