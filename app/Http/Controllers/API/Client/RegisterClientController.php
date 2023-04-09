<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterClientController extends Controller
{
    public function __invoke(Request $request)
    {
        //receive api call with installation token from the homepage
        // generate a new secret token, for use locally
        // activate client in database

    }
}
