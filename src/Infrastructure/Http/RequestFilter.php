<?php declare(strict_types=1);

namespace Infrastructure\Http;

class RequestFilter
{
    protected $scenarios = [];

    public function __construct($scenarios = [])
    {
        $this->scenarios = $scenarios;
    }

    protected function filter($data, $scenario): array
    {
        if (!isset($this->scenarios[$scenario])) {
            return $data;
        }
        $rules = $this->normalizeScenario($this->scenarios[$scenario]);
        $filteredData = \array_filter($data, function ($k) use ($rules) {
            return \array_key_exists($k, $rules);
        }, ARRAY_FILTER_USE_KEY);
        foreach ($filteredData as $key => $val) {
            if (\is_callable($rules[$key])) {
                $filteredData[$key] = $rules[$key]($val);
                continue;
            }
            $typeCast = 'to' . ucfirst($rules[$key]);
            if (!\method_exists($this, $typeCast)) {
                throw new \InvalidArgumentException('Invalid request filter scenario configuration');
            }
            $filteredData[$key] = $this->$typeCast($val);
        }
        return $filteredData;
    }

    protected function toString($val)
    {
        return (string)$val;
    }

    protected function toInt($val)
    {
        return (int)$val;
    }

    protected function toArray($val)
    {
        return (array)$val;
    }

    protected function toBool($val)
    {
        return (bool)$val;
    }

    protected function normalizeScenario($data)
    {
        $normalized = [];
        foreach ($data as $key => $value) {
            $k = $key;
            $v = $value;
            if (\is_int($k)) {
                $k = $value;
                $v = 'string';
            }
            $normalized[$k] = $v;
        }
        return $normalized;
    }

    public function filterBody(Request $request, $scenario): array
    {
        return $this->filter($request->getBodyParams(), $scenario);
    }

    public function filterQuery(Request $request, $scenario): array
    {
        return $this->filter($request->getQueryParams(), $scenario);
    }
}
