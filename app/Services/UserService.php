<?php

namespace App\Services;

use App\DTOs\UserDTO;
use App\Repositories\interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;

final class UserService implements UserServiceInterface
{

    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function findAll() {
        return $this->userRepository->findAll()->map(function($instituttion) {
            return new UserDTO($instituttion);
        });
    }

    public function findById(int $id) {
        $institution = $this->userRepository->findById($id);
        return new UserDTO($institution);
    }

    public function store(array $data) {
        $institution = $this->userRepository->store($data);
        return new UserDTO($institution);
    }

    public function update(int $id, array $data) {
        $institution = $this->userRepository->update($id, $data);
        return new UserDTO($institution);
    }

    public function delete($id) {
        return $this->userRepository->delete($id);
    }
}
