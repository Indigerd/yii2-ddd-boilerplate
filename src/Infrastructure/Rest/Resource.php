<?php declare(strict_types=1);

namespace Infrastructure\Rest;

use Indigerd\Hydrator\Hydrator;
use yii\base\Arrayable;
use yii\base\ArrayableTrait;

abstract class Resource implements Arrayable
{
    use ArrayableTrait;

    protected $hydrator;

    public function __construct(Hydrator $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    public function decorate(object $model)
    {
        $data = $this->hydrator->extract($model);
        foreach ($data as $key => $val) {
            if (\property_exists($this, $key)) {
                $this->{$key} = $val;
            }
        }
    }

    abstract public function fields(): array;
}
