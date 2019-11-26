<?php
namespace App\Authentication\Service;

use App\Authentication\UserTokenInterface;
use App\Authentication\UserInterface;

/**
* The contract provides authentication and customer identification services. 
 * Authentication Example:
 * $authService = new AuthenticationService(..);
 * $userToken = $authService->authenticate($request->getCookie('auth_cookie'));
 *
 * if ($userToken->isAnonymous()) { ...
 * } else {
 *      $user = $userToken->getUser();
 *      ...
 * }
 *
 * ###
 *
 * Example of affixing authentication information 
 * $response->setCookie('auth_cookie', $authService->generateCredentials($user));
 *
 * Interface AuthenticationServiceInterface
 * @package App\Authentication\Service
 */
interface AuthenticationServiceInterface
{
	/**
	 * The method authenticates the user based on the authentication credentials of the request	
	 * @param mixed $credentials
	 * @return UserTokenInterface
	 */
	public function authenticate($credentials);

	/**
	 * Method generates authentication credentials
	 *
	 * @param UserInterface $user
	 * @return mixed
	 */
	public function generateCredentials(UserInterface $user);
}