<?php declare(strict_types=1);

namespace Infrastructure\Http;

class Request extends \yii\web\Request
{
    public function __construct($config = [])
    {
        $this->parsers['application/json'] = 'yii\web\JsonParser';
        parent::__construct($config);
    }

    public function getLinks()
    {
        $result = [];
        $headers = $this->getHeaders();
        $links = \explode(',', $headers['Link']);
        foreach ($links as $link) {
            \preg_match('/\<(.*?)\>/', $link, $linkMatch);
            if (\count($linkMatch) < 2) {
                continue;
            }
            \preg_match('/rel\=\"(.*?)\"/', \str_replace(' ', '', $link), $relMatch);
            if (\count($relMatch) < 2) {
                continue;
            }
            $result[] = new LinkHeader($linkMatch[1], $relMatch[1]);
        }
        return $result;
    }
}
