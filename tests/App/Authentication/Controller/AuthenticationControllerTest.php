<?php
namespace AppTest\App\Authentication\Controller;

use App\Authentication\Repository\UserRepositoryInterface;
use App\Authentication\Encoder\UserPasswordEncoderInterface;
use App\Authentication\Service\AuthenticationServiceInterface;
use App\Authentication\Service\AuthenticationService;
use App\Core\RequestDispatcher\ResponseInterface;
use App\Core\RequestDispatcher\Request;
use App\Authentication\User;
use App\Authentication\UserToken;
use App\Authentication\Controller\AuthenticationController;
use PHPUnit\Framework\TestCase;

class AuthenticationControllerTest extends TestCase
{
    public function testLogin()
    {
        $user = new User(
            'mike_spike',
            'mikepass',
            null,
            2
        );

        $credentials = '2_qwasd123qe';

        $userPassEncMock = $this->createMock(UserPasswordEncoderInterface::class);
        $userPassEncMock->expects($this->any())
            ->method('encodePassword')
            ->with('mikepass')
            ->willReturn('qwasd123qe');
        $userRepoMock = $this->createMock(UserRepositoryInterface::class);
        $userRepoMock->expects($this->any())
            ->method('findById')
            ->with(2)
            ->willReturn($user);
        $userRepoMock->expects($this->any())
            ->method('findByLogin')
            ->with('mike_spike')
            ->willReturn($user);

        $authService = new AuthenticationService($userRepoMock);
        $authContr = new AuthenticationController(
            $userRepoMock, 
            $userPassEncMock,
            $authService
        );
        $request = new Request(
            'POST',
            '/',
            'HTTP',
            'Moz',
            [],
            [],
            [
                'username' => 'mi',
                'password' => 'mikepass'
            ]
        );

        $this->assertEquals('Password is too short', $authContr->login($request)['bindings']['errors']);
        $this->assertEquals('Password is too short', $authContr->login($request)->bindings['errors']);
        $request = new Request(
            'POST',
            '/',
            'HTTP',
            'Moz',
            [],
            [],
            [
                'username' => 'mike_spike',
                'password' => 'mikep'
            ]
        );

        $authContr->login($request);
        $request = new Request(
            'POST',
            '/',
            'HTTP',
            'Moz',
            [],
            [],
            []
        );

        $authContr->login($request);      
        $request = new Request(
            'POST',
            '/',
            'HTTP',
            'Moz',
            [],
            [],
            [
                'username' => 'mike_spike',
                'password' => 'mikepazz'                
            ]
        );
        $authContr->login($request);            
    }

    public function testLoginInvalidUsername()
    {
        $request = new Request(
            'POST',
            '/',
            '',
            '',
            [],
            [],
            [
                'username' => ''
            ]
        );

        $authContr = new AuthenticationController(
            $this->createMock(UserRepositoryInterface::class),
            $this->createMock(UserPasswordEncoderInterface::class),
            $this->createMock(AuthenticationServiceInterface::class)
        );

        $response = $authContr->login($request);
    }

    public function testLoginInvalidPassword()
    {
        $request = new Request(
            'POST',
            '/',
            '',
            '',
            [],
            [],
            [
                'username' => 'mike_spike',
                'password' => 'mikepazz'
            ]
        );

        $authContr = new AuthenticationController(
            $this->createMock(UserRepositoryInterface::class),
            $this->createMock(UserPasswordEncoderInterface::class),
            $this->createMock(AuthenticationServiceInterface::class)
        );

        $response = $authContr->login($request);
    }

    public function testSignin() 
    {
        $user = new User(
            'mike_spike',
            'mikepass',
            null,
            2
        );

        
        $credentials = '2_qwasd123qe';

        $userPassEncMock = $this->createMock(UserPasswordEncoderInterface::class);
        $userPassEncMock->expects($this->any())
            ->method('encodePassword')
            ->with('mikepass')
            ->willReturn('2_qwasd123qe');
        $userTokenMock = $this->getMockBuilder(\stdClass::class)
            ->setMethods(['getUser','isAnonymous'])
            ->getMock();
        $userTokenMock->expects($this->any())
            ->method('getUser')
            ->with($user)
            ->willReturn($user);
        $userTokenMock->expects($this->any())
            ->method('isAnonymous')
            ->with($user)
            ->willReturn(false);
        $authServiceMock = $this->createMock(AuthenticationServiceInterface::class);
        $authServiceMock->expects($this->any())
            ->method('authenticate')
            ->with($credentials)
            ->willReturn($userTokenMock);
        $authServiceMock->expects($this->any())
            ->method('generateCredentials')
            ->with($user)
            ->willReturn($credentials);
        $userRepoMock = $this->createMock(UserRepositoryInterface::class);
        $userRepoMock->expects($this->any())
            ->method('findById')
            ->with(2)
            ->willReturn($user);
        $userRepoMock->expects($this->any())
            ->method('findByLogin')
            ->with('mike_spike')
            ->willReturn($user);

        $authContr = new AuthenticationController(
            $userRepoMock, 
            $userPassEncMock,
            $authServiceMock
        );

        $salt = 1335939007;
        $hashedPassword = $userPassEncMock->encodePassword($user->getPassword());
        $userUpdated = new User(
            'mike_spike',
            $hashedPassword,
            $salt,
            null
        );

        $userRepoMock->expects($this->any())
            ->method('save')
            ->with($userUpdated)
            ->willReturn($userUpdated);
        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->expects($this->any())
            ->method('setCookie')
            ->with(['auth', $credentials]);

        $this->assertEquals('mike_spike', $user->getLogin());
        $this->assertEquals(false, empty($user->getLogin()));
        $this->assertEquals(true, strlen($user->getLogin()) > 6);
        $this->assertEquals(false, strlen($user->getLogin()) < 3);
        $this->assertEquals($user, $userRepoMock->findById(2));
        $this->assertEquals($user, $userRepoMock->findByLogin('mike_spike'));
        $this->assertEquals($userUpdated, $userRepoMock->save($userUpdated));
        $this->assertEquals(false, empty($authContr->redirect('/profile')));
    }
}
