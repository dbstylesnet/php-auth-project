<?php

namespace AppTest\Core\RequestDispatcher;

use App\Core\RequestDispatcher\Request;
use App\Core\RequestDispatcher\RequestInterface;
use App\Core\RequestDispatcher\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase{


    // $router->get('/sayhello', function(RequestInterface $request) {
    //     return 'HELLO ' . $request->getQueryParam('name');
    // });
    public function testSayHello()
    {
        $request = new Request(
            'GET',
            '/sayhello',
            'https',
            [],
            ['name' => 'alex'],
            []
        );

        $router = new Router($request);
        $name = null;

        $router->get('/sayhello', function(RequestInterface $request) use (&$name) {
            $name = $request->getQueryParam('name');
        });

        $router->get('/', function(RequestInterface $request) use (&$name) {
            $name = 'should not be called';
        });

        $router->resolve();

        $this->assertEquals('alex', $name);
    }

    // $router->post('/data', function(RequestInterface $request) {
    //     return json_encode($request->getBody());
    // });
    /*public function testPostData()
    {
        $request = new Request();
        $router = new Router($request);

        assertEquals('HELLO',
            $router->post('/data', function(RequestInterface $request) {
                return 'HELLO';
            })
        );
    }*/

        // $router->post('/data', function(RequestInterface $request) {
    //     return json_encode($request->getBody());
    // });
    // public function testPostData()
    // { 
    //     $request = new Request();
    //     $router = new Router($request);

    //     assertIsStriwng(true,
    //         $router->get('/profile') 
    //     );
    // }

    


    
    
}

