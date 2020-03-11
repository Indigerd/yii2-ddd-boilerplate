<?php declare(strict_types=1);

namespace Infrastructure\Http;

use yii\web\Application;
use yii\web\IdentityInterface;

class User
{
    protected $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function getIdentity(): IdentityInterface
    {
        return $this->application->getUser()->getIdentity();
    }
}
