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
use App\Authentication\Controller\AuthentificationController;
use PHPUnit\Framework\TestCase;

class AuthenticationControllerTest extends TestCase
{
    public function testLogin()
    {
        //real user created
        $user = new User(
            'mike_spike',
            'mikepass',
            null,
            2
        );

        //his credentials
        $credentials = '2_qwasd123qe';

        //mock encoding password
        $userPassEncMock = $this->createMock(UserPasswordEncoderInterface::class);
        
        $userPassEncMock->expects($this->any())
            ->method('encodePassword')
            ->with('mikepass')
            ->willReturn('qwasd123qe');

        //mock user repo
        $userRepoMock = $this->createMock(UserRepositoryInterface::class);

        $userRepoMock->expects($this->any())
            ->method('findById')
            ->with(2)
            ->willReturn($user);

        $userRepoMock->expects($this->any())
            ->method('findByLogin')
            ->with('mike_spike')
            ->willReturn($user);

        //create real authService
        $authService = new AuthenticationService($userRepoMock);

        //create real authController
        $authContr = new AuthentificationController(
            $userRepoMock, 
            $userPassEncMock,
            $authService
        );

        /**
        * creating request to test if auth controller is working correctly
        */

        //case I test if username is too short -> should return template with error msg 'Username is too short'
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

        
        // 'error' => 'Password is too short'
        $this->assertEquals('Password is too short', $authContr->login($request)['bindings']['errors']);
        $this->assertEquals('Password is too short', $authContr->login($request)->bindings['errors']);


        
        //case II test if password is too short -> should return template with error msg 'Password is too short'
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

        //case III test if password is too short -> should return template with error msg 'Password or username is incorrect'
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
        
        // case VI test if password is too short -> should return template with error msg 'Password or username is incorrect'
        // 
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
        // to test that error in bindings is not empty and consist an error about username field
        $request = new Request(
            'POST',
            '/',
            '',
            '',
            [],
            [],
            [
                'username' => '',

            ]
        );

        $authContr = new AuthentificationController(
            $this->createMock(UserRepositoryInterface::class),
            $this->createMock(UserPasswordEncoderInterface::class),
            $this->createMock(AuthenticationServiceInterface::class)
        );

        $response = $authContr->login($request);
    }

    public function testLoginInvalidPassword()
    {
        // to test that error in bindings is not empty and consist an error about password field
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

        $authContr = new AuthentificationController(
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



        $authContr = new AuthentificationController(
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
        // $this->assertEquals(false, empty($responseMock->setCookie('auth', $authServiceMock->generateCredentials($user))));

    }
}