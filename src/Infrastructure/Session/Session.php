<?php declare(strict_types=1);

namespace Infrastructure\Session;

use yii\web\Session as SessionHandler;

class Session
{
    protected $sessionHandler;

    public function __construct(SessionHandler $sessionHandler)
    {
        $this->sessionHandler = $sessionHandler;
    }

    public function set($key, $value): void
    {
        $this->sessionHandler->set($key, $value);
    }

    public function get($key, $defaultValue)
    {
        return $this->sessionHandler->get($key, $defaultValue);
    }
}
