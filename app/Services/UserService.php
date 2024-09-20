<?php

namespace App\Services;

use App\DTOs\User\UserDTO;
use App\Repositories\interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;

final class UserService implements UserServiceInterface
{

    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function findAll() {
        return $this->userRepository->findAll()->map(function($user) {
            return new UserDTO($user);
        });
    }

    public function findById(int $id) {
        $user = $this->userRepository->findById($id);
        return new UserDTO($user);
    }

    public function store(array $data) {
        $user = $this->userRepository->store($data);
        return new UserDTO($user);
    }

    public function update(int $id, array $data) {
        $user = $this->userRepository->update($id, $data);
        return new UserDTO($user);
    }

    public function delete($id) {
        return $this->userRepository->delete($id);
    }
}
