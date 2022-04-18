<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException as Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request as Request;
use Illuminate\Http\Response as Response;

class UserMottoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        //
        return new Response();
    }

    /**
     * Get the user specified motto from the Habbo API
     *
     * @param string|null $name
     * @return string|null from api
     * @throws GuzzleException
     */
    public function getMotto(string|null $name, string $code = 'HabboDome-Register'): string|null
    {
        $client = new Client();
        $apiResult['motto'] = '';
        try {
            $result = $client->get('https://www.habbo.com/api/public/users?name=' . $name);
            $result = json_decode($result->getBody(), true);
            $apiResult['motto'] = $result['motto'];
        } catch(Exception) {
            // do nothing
        }
        return $apiResult['motto'] === $code ? $apiResult['motto'] : null;
    }
}
