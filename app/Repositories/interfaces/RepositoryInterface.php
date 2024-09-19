<?php

namespace App\Repositories\interfaces;

interface RepositoryInterface {

    public function findAll();

    public function findById(int $id);

    public function store(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

}
