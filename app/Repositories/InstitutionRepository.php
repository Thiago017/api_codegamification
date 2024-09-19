<?php

namespace App\Repositories;

use App\Exceptions\EntityNotFoundException;
use App\Models\Institution;
use App\Repositories\interfaces\InstitutionRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Support\Facades\Log;

final class InstitutionRepository implements InstitutionRepositoryInterface
{
    public function findAll()
    {
        try {
            return Institution::all();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new Exception('Error retrieving institutions');
        }
    }

    public function findById(int $id)
    {
        try {
            return Institution::query()->findOrFail($id);
        } catch (ModelNotFoundException) {
            throw new EntityNotFoundException('Institution not found');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new Exception('Error retrieving institution');
        }
    }

    public function store(array $data)
    {
        try {
            return Institution::query()->create($data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new Exception('Error storing institution');
        }
    }

    public function update(int $id, array $data)
    {
        try {
            $institution = $this->findById($id);
            $institution->update($data);
            return $institution;
        } catch (EntityNotFoundException) {
            throw new EntityNotFoundException('Institution not found');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new Exception('Error updating institution');
        }
    }

    public function delete($id)
    {
        try {
            return $this->findById($id)->delete();
        } catch (EntityNotFoundException) {
            throw new EntityNotFoundException('Institution not found');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new Exception('Error deleting institution');
        }
    }
}
