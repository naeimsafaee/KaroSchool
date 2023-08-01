<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *    title="KaroSchool OpenApi Swagger",
 *    version="1.0.0",
 * )
 *  @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      name="bearerAuth",
 *      type="http",
 *      in="header",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 *  )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
