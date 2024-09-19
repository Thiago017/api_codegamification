<?php

namespace App\Services;

use App\DTOs\InstitutionDTO;
use App\Repositories\interfaces\InstitutionRepositoryInterface;
use App\Services\Interfaces\InstitutionServiceInterface;

final class InstitutionService implements InstitutionServiceInterface
{

    public function __construct(
        private InstitutionRepositoryInterface $institutionRepository
    ) {}

    public function findAll() {
        return $this->institutionRepository->findAll()->map(function($instituttion) {
            return new InstitutionDTO($instituttion);
        });
    }

    public function findById(int $id) {
        $institution = $this->institutionRepository->findById($id);
        return new InstitutionDTO($institution);
    }

    public function store(array $data) {
        $institution = $this->institutionRepository->store($data);
        return new InstitutionDTO($institution);
    }

    public function update(int $id, array $data) {
        $institution = $this->institutionRepository->update($id, $data);
        return new InstitutionDTO($institution);
    }

    public function delete($id) {
        return $this->institutionRepository->delete($id);
    }
}
