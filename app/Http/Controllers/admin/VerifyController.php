<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inc\Auth;
use Inc\Perms;
use Inc\Rsp;
use Inc\STG;
use Laravel\Sanctum\PersonalAccessToken;


class VerifyController extends Controller
{

    /**
     * @OA\SecurityScheme(
     *     type="http",
     *     description="Login with email and password to get the authentication token",
     *     name="Token based Based",
     *     in="header",
     *     scheme="bearer",
     *     bearerFormat="JWT",
     *     securityScheme="apiAuth",
     * ),
     *
     * @OA\Post(
     * path="/api/admin/verify",
     * summary="verify",
     * operationId="Verify",
     * tags={"Verify"},
     *
     *   security={{ "apiAuth": {} }},
     *
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
    public function index(Request $req)
    {
        $userData = null;
        $me = Auth::user();
        $menu = Perms::menuSorted();
        $url_home = '/';

        if ($me) {
            $people = Person::find($me->id_person);
            $userData = [
                'id'          => $me->id,
                'name'        => $people->name,
                'surname'     => $people->surname,
                'displayName' => $people->name . ' ' . ($people->surname[0] ?? '') . '.',
                'pic'         => $me->pic,
                'email'       => $me->username,
                'ro_id'       => $me->id_role,
                'ro_name'     => $me->ro_name ?? '?',
                'shortcuts'   => $shortcuts ?? '',
                'settings'    => [
                    'layout' => [
                        'config' => [
                            'navbar' => [
                                'folded' => ($me->ro_menu_collapsed ?? '') == '1',
                            ],
                            'footer' => [
                                'display' => false,
                                'style'   => 'static',
                            ],
                        ],
                    ],
                    'theme'  => [
                        'main' => 'default',
                    ],
                ],
            ];
        }
        $stg = STG::all();

        $config = [
            'colors' => [
                'primary'     => $stg->color_primary ?? '',
                'accent'      => $stg->color_accent ?? '',
                'accent_dark' => $stg->color_accent_dark ?? '',
                'menu'        => $stg->color_menu ?? '',
            ],
            'layout' => '',
            'theme'  => [
                'main' => 'default'
            ],
            'themes' => '',
        ];

        $userDataGlobal = [
            'role'     => $me ? 'admin' : null,
            'data'     => $userData,
            'url_home' => $url_home,
            'base_dir' => '',
            'menu'     => $menu,
            'settings' => $stg,
            'config'   => $config,
        ];

        return Rsp::ok()
            ->set('token', Auth::$token)
            ->set('user', $userDataGlobal);
    }



















    public function indexPost(Request $req)
    {
        $menu = Perms::menuSorted();
        $token = $req->bearerToken(); // Obtener el only token bearer de la solicitud
        //$authorization = $req->header('Authorization');
        $settings = [
            'module'  => '',
            'url_api' => ''
        ];
        $me = [];
        $tokenFinal = null;

        if ($token) {
            //$personalAccessToken = PersonalAccessToken::where('token', $tokenSanctum)->first();
            $personalAccessToken = PersonalAccessToken::findToken($token);
            //return $personalAccessToken;
            if ($personalAccessToken) {
                $idUser = $personalAccessToken->tokenable_id;
                $user = User::find($idUser);
                $me = $user;
                $tokenFinal = $token;
            }
        }

        $userData = [
            'role'     => 'admin',
            'data'     => $me,
            'url_home' => '',
            'base_dir' => '',
            'menu'     => $menu,
            'settings' => $settings,
            'config'   => [
                'colors' => [
                    'primary'     => "#DC1C13",
                    'accent'      => "#2989f8",
                    'accent_dark' => "#d15b00",
                    'menu'        => "#333333",
                ],
                'layout' => '',
                'theme'  => [
                    'main' => 'default'
                ],
                'themes' => ''
            ],
        ];

        //return response()->json(['message' => 'Usuario no autenticado'], 401);
        return Rsp::ok()
            ->set('token', $tokenFinal)
            ->set('user', $userData);
    }

}
