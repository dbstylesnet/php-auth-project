<?php
namespace AppTest\Core\RequestDispatcher;

use App\Core\RequestDispatcher\Request;
use App\Core\RequestDispatcher\RequestInterface;
use App\Core\RequestDispatcher\Router;
use App\Core\RequestDispatcher\Response;
use App\Authentication\Controller\AuthentificationController;
use App\Personal\Controller\ProfileController;
use App\Authentication\Repository\UserRepository;
use App\Authentication\Encoder\UserPasswordEncoder;
use App\Authentication\Service\AuthenticationService;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    public function testSayHello()
    {
        $request = new Request(
            'GET',
            '/sayhello',
            'https',
            'mozilla',
            [],
            ['name' => 'alex'],
            []
        );

        $router = new Router($request);

        $mockResponse = $this->getMockBuilder(\stdClass::class)
            ->setMethods(['send'])
            ->getMock();        
        $mockResponse->expects($this->once())
            ->method('send');
        $mockController = $this->getMockBuilder(\stdClass::class)
            ->setMethods(['controllerMethod','otherMethod'])
            ->getMock();
        $mockController->expects($this->once())
            ->method('controllerMethod')
            ->with($request)
            ->willReturn($mockResponse);
        $mockController->expects($this->never())
            ->method('otherMethod');

        $router->get('/sayhello', [$mockController, 'controllerMethod']);
        $router->get('/', [$mockController, 'otherMethod']);
        $router->resolve();
    }    

    public function testProfile()
    {
        $request = new Request(
            'GET',
            '/profile',
            'https',
            'mozilla',
            [],
            ['name' => 'alex'],
            []
        );

        $this->assertEquals('alex', $request->getQueryParam('name'));

        $mockResponse = $this->getMockBuilder(\stdClass::class)
            ->setMethods(['send'])
            ->getMock();
        $mockResponse->expects($this->once())
            ->method('send');
        $mockProfileCall = $this->getMockBuilder(\stdClass::class)
            ->setMethods(['shouldBeCalled', 'shouldNotBeCalled'])
            ->getMock();
        $mockProfileCall->expects($this->once())
            ->method('shouldBeCalled')
            ->with($request)
            ->willReturn($mockResponse);
        $mockProfileCall->expects($this->never())
            ->method('shouldNotBeCalled');

        $router = new Router($request);
        $router->get('/profile', [$mockProfileCall, 'shouldBeCalled']);
        $router->get('/', [$mockProfileCall, 'shouldNotBeCalled']);
        $router->resolve();
    }

    public function testProfilePath()
    {
        $request = new Request(
            'GET',
            '/profile?name=alex',
            'https',
            'mozilla',
            [],
            ['name' => 'alex'],
            []
        );

        $this->assertEquals('alex', $request->getQueryParam('name'));

        $responseMock = $this->getMockBuilder(\stdClass::class)
            ->setMethods(['send'])
            ->getMock();
        $responseMock->expects($this->once())
            ->method('send');
        $mockProfileCall = $this->getMockBuilder(\stdClass::class)
            ->setMethods(['shouldBeCalled', 'shouldNotBeCalled'])
            ->getMock();
        $mockProfileCall->expects($this->once())
            ->method('shouldBeCalled')
            ->with($request)
            ->willReturn($responseMock);
        $mockProfileCall->expects($this->never())
            ->method('shouldNotBeCalled');

        $router = new Router($request);
        $router->get('/profile', [$mockProfileCall, 'shouldBeCalled']);
        $router->get('/', [$mockProfileCall, 'shouldNotBeCalled']);
        $router->resolve();
    }

    public function testResponse()
    {
        $request = new Request(
            'GET',
            '/sayhello',
            'https',
            'mozilla',
            [],
            ['name' => 'alex'],
            []
        );

        $responseMock = $this->getMockBuilder(\stdClass::class)
            ->setMethods(['send'])
            ->getMock();
        $responseMock->expects($this->once())
            ->method('send');
        $mockController = $this->getMockBuilder(\stdClass::class)
            ->setMethods(['controllerMethod'])
            ->getMock();
        $mockController->expects($this->once())
            ->method('controllerMethod')
            ->with($request)
            ->willReturn($responseMock);

        $router = new Router($request);
        $router->get('/sayhello', [$mockController, 'controllerMethod']);
        $router->resolve();
    }
}
