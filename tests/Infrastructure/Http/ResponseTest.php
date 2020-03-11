<?php declare(strict_types=1);

namespace Tests\Infrastructure\Http;

use PHPUnit\Framework\TestCase;
use yii\web\Application;
use Infrastructure\Http\Response;

class ResponseTest extends TestCase
{
    protected $response;

    protected $application;

    public function setUp(): void
    {
        $this->application = $this
            ->getMockBuilder(Application::class)
            ->disableOriginalConstructor()
            ->setMethods(['getResponse'])
            ->getMock();
        $this->response = new Response($this->application);
    }

    public function testStatusCode()
    {
        $code = 422;
        $appResponse = $this->getMockBuilder(\yii\web\Response::class)
            ->disableOriginalConstructor()
            ->setMethods(['setStatusCode', 'getStatusCode'])
            ->getMock();
        $appResponse
            ->expects($this->once())
            ->method('setStatusCode')
            ->with($this->equalTo($code));
        $appResponse
            ->expects($this->once())
            ->method('getStatusCode')
            ->will($this->returnValue($code));
        $this->application
            ->expects($this->any())
            ->method('getResponse')
            ->will($this->returnValue($appResponse));
        $this->response->setStatusCode($code);
        $this->assertEquals($code, $this->response->getStatusCode());
    }
}
