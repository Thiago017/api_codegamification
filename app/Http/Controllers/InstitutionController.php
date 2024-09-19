<?

namespace App\Http\Controllers;

use App\Http\Requests\DeleteInstitutionRequest;
use App\Http\Requests\FindAllInstitutionRequest;
use App\Http\Requests\FindByIdInstitutionRequest;
use App\Http\Requests\StoreInstitutionRequest;
use App\Http\Requests\UpdateInstitutionRequest;
use App\Services\Interfaces\InstitutionServiceInterface;

final class InstitutionController extends Controller
{
    public function __construct(
        private InstitutionServiceInterface $institutionService
    ) {}

    public function findAll(FindAllInstitutionRequest $request)
    {
        $institutionList = $this->institutionService->findAll();
        return $this->response("", 200, $institutionList->toArray());
    }

    public function findById(FindByIdInstitutionRequest $request, int $id)
    {
        $institution = $this->institutionService->findById($id);
        return $this->response("", 200, $institution->toArray());
    }

    public function store(StoreInstitutionRequest $request)
    {
        $data = $request->validated();
        $institution = $this->institutionService->store($data);
        return $this->response("", 201, $institution->toArray());
    }

    public function update(UpdateInstitutionRequest $request, int $id)
    {
        $data = $request->validated();
        $institution = $this->institutionService->update($id, $data);
        return $this->response("", 200, $institution->toArray());
    }

    public function delete(DeleteInstitutionRequest $request, int $id)
    {
        $this->institutionService->delete($id);
        return $this->response("Deleted", 204, []);
    }

}
