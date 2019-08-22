<?php

namespace AppTest\App\Authentication\Service;

use App\Authentication\Repository\UserRepositoryInterface;
use App\Authentication\Repository\UserRepository;
use App\Authentication\UserTokenInterface;
use App\Authentication\UserToken;
use App\Authentication\User;
use App\Authentication\Service\AuthenticationServiceInterface;
use App\Authentication\Service\AuthenticationService;
use App\Authentication\Encoder\UserPasswordEncoderInterface;
use App\Authentication\Encoder\UserPasswordEncoder;
use PHPUnit\Framework\TestCase;

class AuthenticationServiceTest extends TestCase
{
	public function testShouldReturnsAnonymousToken()
	{
		$credentials = '2_wer23@#wsf3';

		$repository = $this->createMock(UserRepositoryInterface::class);
		$repository
			->expects($this->any()) // replace with $this->once() - why?
			->method('findById')
			->with(2)
			->willReturn(null);
		
		$service = new AuthenticationService($repository);
		$userToken = $service->authenticate($credentials);
		$this->assertTrue($userToken->isAnonymous());
	}

	public function testShouldReturnAnonymousInvalidCredentials(Type $var = null)
	{
		$invalidCredentials = '2_asqwfsdf';
		$user = new User(
			'mike_spike',
			'wer23@#wsf3',
			null,
			2
		);

		$repository = $this->createMock(UserRepositoryInterface::class);
		$repository
			->expects($this->any()) // replace with $this->once() - why?
			->method('findById')
			->with(2)
			->willReturn($user);

		$service = new AuthenticationService($repository);
		$userToken = $service->authenticate($invalidCredentials);
		$this->assertTrue($userToken->isAnonymous());
	}

	public function testShouldReturnAuthentificate(Type $var = null)
	{
		$credentials = '2_asqwfsdf';
		$user = new User(
			'mike_spike',
			'asqwfsdf',
			null,
			2
		);

		$repository = $this->createMock(UserRepositoryInterface::class);
		$repository
			->expects($this->any()) // replace with $this->once() - why?
			->method('findById')
			->with(2)
			->willReturn($user);

		$service = new AuthenticationService($repository);
		$userToken = $service->authenticate($credentials);
		$this->assertFalse($userToken->isAnonymous());
	}
	
}


