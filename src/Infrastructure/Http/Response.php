<?php declare(strict_types=1);

namespace Infrastructure\Http;

use yii\web\Application;

class Response
{
    protected $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function setStatusCode(int $httpCode, string $text = null)
    {
        $this->application->getResponse()->setStatusCode($httpCode, $text);
    }

    public function getStatusCode(): int
    {
        return $this->application->getResponse()->getStatusCode();
    }
}
