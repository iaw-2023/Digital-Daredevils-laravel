<?php
namespace App\Http\Middleware;

use Auth0\SDK\Auth0;
use Closure; 
use Illuminate\Http\JsonResponse;

class Auth0Middleware
{
    public function handle($request, Closure $next)
    {
        // Import the Composer Autoloader to make the SDK classes accessible:
        require __DIR__ . '/../../../vendor/autoload.php';

        // Now instantiate the Auth0 class with our configuration:
        $auth0 = new Auth0([
            'domain' => $_ENV['AUTH0_DOMAIN'],
            'clientId' => $_ENV['AUTH0_CLIENT_ID'],
            'clientSecret' => $_ENV['AUTH0_CLIENT_SECRET'],
            'audience' => [$_ENV['AUTH0_AUDIENCE']],
            'cookieSecret' => $_ENV['AUTH0_SECRET']
        ]);

        // Caching
        $tokenCache = new \Symfony\Component\Cache\Adapter\FilesystemAdapter();
        $auth0->configuration()->setTokenCache($tokenCache);

        $jwt = $_GET['token'] ?? $_SERVER['HTTP_AUTHORIZATION'] ?? $_SERVER['Authorization'] ?? null;

        // If a token is present, process it.
        if ($jwt !== null) {
            // Trim whitespace from token string.
            $jwt = trim($jwt);

            // Remove the 'Bearer ' prefix, if present, in the event we're getting an Authorization header that's using it.
            if (substr($jwt, 0, 7) === 'Bearer ') {
                $jwt = substr($jwt, 7);
            }

            // Attempt to decode the token:
            try {
                $decodedToken = $auth0->decode($jwt, null, null, null, null, null, null, \Auth0\SDK\Token::TYPE_TOKEN)->toArray();
                define('ENDPOINT_AUTHORIZED', true);
                $userEmail = $decodedToken['https://example.com/email'];
                $request->merge(['email' => $userEmail]);

                return $next($request);
            } catch (\Auth0\SDK\Exception\InvalidTokenException $exception) {
                die($exception->getMessage());
            }
        }

        return new JsonResponse([
            'authorized' => false,
            'error' => [
                'message' => 'You are NOT authorized to be here!'
            ]
        ], 401);
    }
}
