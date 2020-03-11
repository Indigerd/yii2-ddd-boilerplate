<?php declare(strict_types=1);

namespace Infrastructure\Rest;

use Domain\Collection\Collection;
use yii\rest\Serializer as BaseSerializer;

class Serializer extends BaseSerializer
{
    protected $models = [];

    public function serialize($data)
    {
        if (\is_object($data) && isset($this->models[\get_class($data)])) {
            $resource = \Yii::$container->get($this->models[\get_class($data)]);
            $resource->decorate($data);
            return $this->serializeModel($resource);
        }
        if (\is_object($data) and $data instanceof Collection) {
            return $this->serializeCollection($data);
        }
        return parent::serialize($data);
    }

    protected function serializeCollection(Collection $collection)
    {
        $f = \reset($collection);
        if (empty($f)) {
            return [];
        }
        $class = \get_class($f[0]);
        $models = [];
        if (isset($this->models[$class])) {
            foreach ($collection as $model) {
                $resource = \Yii::$container->get($this->models[$class]);
                $resource->decorate($model);
                $models[] = $resource;
            }
        }
        return parent::serializeModels($models);
    }

    protected function serializeModels(array $models)
    {
        $model = \reset($models);
        if (\is_object($model) && isset($this->models[\get_class($model)])) {
            foreach ($models as $i => $model) {
                $resource = \Yii::$container->get($this->models[\get_class($model)]);
                $resource->decorate($model);
                $models[$i] = $resource;
            }
        }
        return parent::serializeModels($models);
    }
}
