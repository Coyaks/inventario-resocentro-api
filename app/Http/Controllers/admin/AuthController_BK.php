<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inc\Rsp;


class AuthController_BK extends Controller
{
    /**
     * @OA\Post(
     * path="/api/admin/auth/login",
     * summary="Sign in",
     * description="Login by email, password",
     * operationId="authLogin",
     * tags={"Login"},
     *       @OA\Parameter(
     *          name="email",
     *          description="Correo electronico",
     *          required=true,
     *          in="query",
     *          @OA\Schema(type="string"),
     *          example="root@skoy.pe"
     *      ),
     *      @OA\Parameter(
     *          name="password",
     *          description="Contraseña",
     *          required=true,
     *          in="query",
     *            @OA\Schema(type="string"),
     *          example="root"
     *      ),
     * @OA\Response(
     *    response=200,
     *    description="Credenciales correctas",
     *    @OA\JsonContent(
     *          @OA\Property(property="ok", type="boolean", example=true),
     *          @OA\Property(property="msg", type="string", example="Usuario logeado correctamente!"),
     *          @OA\Property(property="token", type="string", example="11|hIeKkm3J4CIZ4ir7PZ8vGHCAOTGZPyawT19gT4ZW"),
     *        )
     *     ),
     * @OA\Response(
     *    response=420,
     *    description="Credenciales incorrectas",
     *    @OA\JsonContent(
     *          @OA\Property(property="fail", type="boolean", example=false),
     *        )
     *     )
     * ),
     *
     */

    public function login(Request $req)
    {
        // validate: required|email
        $req->validate([
            'username'    => 'required|email',
            'password' => 'required',
        ]);
        //$username = $req->username;

        $user = User::where('username', $req->username)->first();
        //dep($user);
        if(!$user) return Rsp::false('Correo electrónico incorrecto', 401);
        if (Hash::check($req->password, $user->password)) {
            //Create token user
            $tokenUser = $user->createToken('auth_token')->plainTextToken;
            /*  return response()->json([
                  'ok' => true,
                  'msg' => 'Usuario logeado correctamente!',
                  'token' => $token
              ]);*/


            $loginRsp = [
                'user'         => [
                    'uuid' => 'XgbuVEXBU5gtSKdbQRP1Zbbby1i1',
                    'from' => 'custom-db',
                    'role' => 'admin',
                    'data' => [
                        'displayName' => $user->name,
                        'photoURL'    => 'assets/images/avatars/brian-hughes.jpg',
                        'email'       => $user->email,
                        'settings'    => [
                            'layout' => (object)[],
                            'theme'  => (object)[],
                        ],
                        'shortcuts'   => [
                            "apps.calendar",
                            "apps.mailbox",
                            "apps.contacts"
                        ]
                    ]
                ],
                'access_token' => $tokenUser
            ];
            return response()->json($loginRsp);
        } else {
            return Rsp::false('Contraseña incorrecta', 401);
        }
    }

    public function login_(Request $req)
    {
        $req->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $req->email)->first();
        if (isset($user)) {
            if (Hash::check($req->password, $user->password)) {
                //Create token user
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    'ok'    => true,
                    'msg'   => 'Usuario logeado correctamente!',
                    'token' => $token
                ]);
            } else {
                return Rsp::false('Contraseña incorrecta', 401);
            }
        } else {
            return Rsp::false('Correo electrónico incorrecto', 401);
        }

    }


    /**
     * @OA\Post(
     * path="/api/admin/auth/register",
     * summary="Sign in",
     * description="Login by email, password",
     * operationId="Register",
     * tags={"Register"},
     *  @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="Nombre",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         example="kevyn"
     *      ),
     *      @OA\Parameter(
     *          name="email",
     *          description="Correo electronico",
     *          required=true,
     *          in="query",
     *          @OA\Schema(type="string"),
     *          example="root@skoy.pe"
     *      ),
     *      @OA\Parameter(
     *          name="password",
     *          description="Contraseña",
     *          required=true,
     *          in="query",
     *            @OA\Schema(type="string"),
     *          example="root"
     *      ),
     * @OA\Response(
     *    response=200,
     *    description="Credenciales correctas",
     *    @OA\JsonContent(
     *          @OA\Property(property="ok", type="boolean", example=true),
     *          @OA\Property(property="msg", type="string", example="Usuario logeado correctamente!"),
     *          @OA\Property(property="token", type="string", example="11|hIeKkm3J4CIZ4ir7PZ8vGHCAOTGZPyawT19gT4ZW"),
     *        )
     *     )
     * ),
     *
     *
     */
    public function register(Request $req)
    {
        $req->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);

        $user = User::create([
            'name'     => $req->name,
            'email'    => $req->email,
            'password' => Hash::make($req->password),
        ]);

        return response()->json([
            'ok'  => true,
            'msg' => MSG_INSERT,
        ]);

    }


    /**
     * @OA\Get(
     * path="/api/admin/auth/profile",
     * summary="Profile",
     * operationId="Profile",
     * tags={"Profile"},
     * security={{ "apiAuth": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Credenciales correctas",
     *    @OA\JsonContent(
     *          @OA\Property(property="ok", type="boolean", example=true)
     *        )
     *     )
     * ),
     */
    public function profile()
    {
        $me = auth()->user();
        return response()->json([
            'ok'   => false,
            'msg'  => 'Perfil de usuario',
            'data' => $me,
        ]);
    }

    /**
     * @OA\Get(
     * path="/api/admin/auth/logout",
     * summary="Logout",
     * operationId="Logout",
     * tags={"Logout"},
     *   security={{ "apiAuth": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Credenciales correctas",
     *    @OA\JsonContent(
     *          @OA\Property(property="ok", type="boolean", example=true),
     *        )
     *     )
     * ),
     */
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'ok'  => true,
            'msg' => 'Logout success',
        ]);
    }

}
