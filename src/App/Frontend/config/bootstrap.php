<?php

Yii::setAlias('@frontend', realpath(__DIR__ . '/../../Api'));

Yii::$container->set(
    yii\web\Application::class,
    function () {
        return Yii::$app;
    }
);

Yii::$container->set(Infrastructure\Http\Request::class);
Yii::$container->set(Infrastructure\Http\Response::class);

Yii::$container->set(
    Indigerd\Hydrator\Accessor\AccessorInterface::class,
    Indigerd\Hydrator\Accessor\PropertyAccessor::class
);
Yii::$container->set(Indigerd\Hydrator\Hydrator::class);

Yii::$container->set(
    'Infrastructure\Repository\TableGateway\ArticleTableGateway',
    function () {
        return new \Infrastructure\Repository\TableGateway\ArticleTableGateway(
            Yii::$app->db,
            new \Indigerd\Repository\Query\SqlQueryFactory(),
            'articles'
        );
    }
);

Yii::$container->set(
    'Domain\Repository\ArticleRepositoryInterface',
    function () {
        return new \Infrastructure\Repository\ArticleRepository(
            Yii::$container->get('Infrastructure\Repository\TableGateway\ArticleTableGateway'),
            Yii::$container->get('Indigerd\Hydrator\Hydrator'),
            \Domain\Entity\Article::class,
            Yii::$container->get('Infrastructure\Repository\Relation\ArticleRelationCollection')
        );
    }
);
