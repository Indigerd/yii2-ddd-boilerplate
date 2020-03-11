<?php declare(strict_types=1);

namespace Infrastructure\Auth;

class OAuthAccessToken
{
    protected $accessToken;

    protected $refreshToken;

    protected $ownerId;

    protected $expireIn;

    protected $issueTime;

    public function __construct(string $accessToken, string $refreshToken, int $ownerId, int $expireIn, int $issueTime = null)
    {
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->ownerId = $ownerId;
        $this->expireIn = $expireIn;
        $this->issueTime = (empty($issueTime) ? \time() : $issueTime);
    }

    public static function createFromJson(string $jsonString) : self
    {
        $data = \json_decode($jsonString, true);
        if (!\array_key_exists('issueTime', $data)) {
            $data['issueTime'] = null;
        }
        return new static(
            (string)$data['access_token'],
            (string)$data['refresh_token'],
            (int)$data['owner_id'],
            (int)$data['expires_in'],
            (int)$data['issueTime']
        );
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    /**
     * @return int
     */
    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    public function getExpireAt(): int
    {
        return $this->issueTime + $this->expireIn;
    }

    public function toJson(): string
    {
        return \json_encode([
            'access_token' => $this->accessToken,
            'refresh_token' => $this->refreshToken,
            'owner_id' => $this->ownerId,
            'expires_in' => $this->expireIn,
            'issueTime' => $this->issueTime
        ]);
    }
}
