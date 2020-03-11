<?php declare(strict_types=1);

namespace Infrastructure\Auth;

use Infrastructure\Session\Session as BaseSession;

class Session extends BaseSession
{
    public function setOauthAccessToken(OAuthAccessToken $token): void
    {
        $this->sessionHandler->set('OAuthAccessToken', $token->toJson());
    }

    public function getOauthAccessToken(): OAuthAccessToken
    {
        $tokenString = $this->sessionHandler->get('OAuthAccessToken');
        if (empty($tokenString)) {
            throw new \RuntimeException('Token String unavalibale in session');
        }
        return OAuthAccessToken::createFromJson($tokenString);
    }
}
