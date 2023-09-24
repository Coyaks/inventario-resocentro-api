<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Inc\utils\Util;
use Illuminate\Http\Request;
class TestController extends Controller
{

    public function index()
    {
        $tokenOriginal = 'JzgXyiRg7rNPMXD0onZ8SPxLhFiqA66ZAgfxNdYv';
        return Util::generateSha256Hash($tokenOriginal);
    }

    public function generateBcryptHash($value = 'test')
    {
        return Util::generateSha256Hash($value);
    }

    public function show($id)
    {
        return $this->generateSha256Hash($id);
    }
    // /**
    // * @OA\RequestBody(
    //     *    required=true,
    //     *    description="Credenciales del usuario",
    //     *    @OA\JsonContent(
    //     *       required={"email","password"},
    //     *       @OA\Property(property="email", type="string", format="email", example="root@skoy.pe"),
    //     *       @OA\Property(property="password", type="string", format="password", example="root"),
    //     *    ),
    //     * ),
    //  * @OA\Post(
    //  *      path="/api/test/form",
    //  *      operationId="Test",
    //  *      tags={"Recoveries Docs"},
    //  *      summary="Add new doc for given recovery reference",
    //  *      @OA\Parameter(
    //  *         name="recovery_reference",
    //  *         in="query",
    //  *         description="Recovery reference",
    //  *         required=true,
    //  *         @OA\Schema(
    //  *             type="string",
    //  *         )
    //  *      ),
    //  *      @OA\Parameter(
    //  *          name="invoice_files_visibility_customer",
    //  *          description="Visible pour le ",
    //  *          required=true,
    //  *          in="query",
    //  *          @OA\Schema(
    //  *             type="string",
    //  *         )
    //  *      ),
    //  *      @OA\Parameter(
    //  *          name="invoice_files_visibility_debtor",
    //  *          description="Visible pour le débiteur ? 1 : Oui, 0 : false",
    //  *          required=true,
    //  *          in="query",
    //  *          example="1",
    //  *      ),
    //  *      @OA\Parameter(
    //  *          name="invoice_files_type",
    //  *          description="Type de fichier. 1 : Facture, 4 : Bon de commande, 5 : Contrat, 6 : Devis,7 : Preuve de paiement,8 : Autre",
    //  *          required=true,
    //  *          in="query",
    //  *          example="1",
    //  *      ),
    //  *      @OA\Parameter(
    //  *          @OA\Schema(type="string", format="binary"),
    //  *          name="invoice_file",
    //  *          description="Fichier du document",
    //  *          in="query",
    //  *      ),
    //  *
    //  *      @OA\Response(
    //  *          response=201,
    //  *          description="Return doc object",
    //  *          @OA\JsonContent(ref="#")
    //  *       ),
    //  *       @OA\Response(response=401, description="Unauthorized"),
    //  *       @OA\Response(response=403, description="Not found or dont have access"),
    //  *       security={{"bearerAuth": {}}}
    //  *     )
    //  *
    //  */

    public function formulario(Request $req){
        echo json_encode($req->input());
    }
}
