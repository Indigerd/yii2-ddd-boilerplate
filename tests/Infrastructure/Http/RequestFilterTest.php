<?php declare(strict_types=1);

namespace Test\Infrastructure\Http;

use PHPUnit\Framework\TestCase;
use Infrastructure\Http\Request;
use Infrastructure\Http\RequestFilter;

class RequestFilterTest extends TestCase
{
    protected $requestFilter;

    protected $testScenarios = [
        'search' => [
            'id',
            'name',
            'description'
        ],
        'create' =>[
            'name',
            'description',
            'score' => 'int'
        ]
    ];

    public function setUp(): void
    {
        $this->requestFilter = new RequestFilter($this->testScenarios);
    }

    public function testFilterBody()
    {
        $testData = [
            'id' => 'ssdfsdfsd',
            'name' => 389,
            'description' => 'test description',
            'score' => '123',
        ];
        $expected = [
            'name' => '389',
            'description' => 'test description',
            'score' => 123,
        ];
        $request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->setMethods(['getBodyParams'])
            ->getMock();
        $request
            ->expects($this->once())
            ->method('getBodyParams')
            ->will($this->returnValue($testData));

        $result = $this->requestFilter->filterBody($request, 'create');
        $this->assertEquals($result, $expected);
    }

    public function testFilterQuery()
    {
        $testData = [
            'id' => 'id123',
            'name' => 389,
            'score' => '123',
        ];
        $expected = [
            'id' => 'id123',
            'name' => '389',
        ];
        $request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->setMethods(['getQueryParams'])
            ->getMock();
        $request
            ->expects($this->once())
            ->method('getQueryParams')
            ->will($this->returnValue($testData));

        $result = $this->requestFilter->filterQuery($request, 'search');
        $this->assertEquals($result, $expected);
    }
}
