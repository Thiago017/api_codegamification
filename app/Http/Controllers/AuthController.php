<?

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    use HttpResponse;

    /**
     * Login function
     *
     * Use email and password for authentication
     *
     * @param LoginRequest $loginRequesr request with required params
     * @return type
     **/
    public function login(LoginRequest $loginRequest)
    {
        $credentials = $loginRequest->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            return $this->response("authorized", 200, [
                'token' => $loginRequest->user()->createToken('session')->plainTextToken
            ]);
        }


        return $this->response("Not authorized", 403);
    }

}
