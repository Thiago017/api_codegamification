<?

namespace App\Http\Controllers;

use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\FindAllUserRequest;
use App\Http\Requests\FindByIdUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\Interfaces\UserServiceInterface;

final class UserController extends Controller
{
    public function __construct(
        private UserServiceInterface $userService
    ) {}

    public function findAll(FindAllUserRequest $request)
    {
        $userList = $this->userService->findAll();
        return $this->response("", 200, $userList->toArray());
    }

    public function findById(FindByIdUserRequest $request, int $id)
    {
        $user = $this->userService->findById($id);
        return $this->response("", 200, $user->toArray());
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->store($data);
        return $this->response("", 201, $user->toArray());
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        $data = $request->validated();
        $user = $this->userService->update($id, $data);
        return $this->response("", 200, $user->toArray());
    }

    public function delete(DeleteUserRequest $request, int $id)
    {
        $this->userService->delete($id);
        return $this->response("Deleted", 204, []);
    }

}
