<?php

namespace App\Repositories;

use App\Exceptions\EntityNotFoundException;
use App\Models\User;
use App\Repositories\interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Support\Facades\Log;

final class UserRepository implements UserRepositoryInterface
{
    public function findAll()
    {
        try {
            return User::all();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new Exception('Error retrieving Users');
        }
    }

    public function findById(int $id)
    {
        try {
            return User::query()->findOrFail($id);
        } catch (ModelNotFoundException) {
            throw new EntityNotFoundException('User not found');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new Exception('Error retrieving User');
        }
    }

    public function store(array $data)
    {
        try {
            return User::query()->create($data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new Exception('Error storing User');
        }
    }

    public function update(int $id, array $data)
    {
        try {
            $User = $this->findById($id);
            $User->update($data);
            return $User;
        } catch (EntityNotFoundException) {
            throw new EntityNotFoundException('User not found');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new Exception('Error updating User');
        }
    }

    public function delete($id)
    {
        try {
            return $this->findById($id)->delete();
        } catch (EntityNotFoundException) {
            throw new EntityNotFoundException('User not found');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new Exception('Error deleting User');
        }
    }
}
