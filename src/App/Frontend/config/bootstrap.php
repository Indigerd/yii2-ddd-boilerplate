<?php

Yii::setAlias('@frontend', realpath(__DIR__ . '/../../Frontend'));

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

Yii::$container->set(
    'Infrastructure\Repository\TableGateway\ArticleCommentTableGateway',
    function () {
        return new \Infrastructure\Repository\TableGateway\ArticleCommentTableGateway(
            Yii::$app->db,
            new \Indigerd\Repository\Query\SqlQueryFactory(),
            'article_comments'
        );
    }
);

Yii::$container->set(
    'Domain\Repository\ArticleCommentRepositoryInterface',
    function () {
        return new \Infrastructure\Repository\ArticleCommentRepository(
            Yii::$container->get('Infrastructure\Repository\TableGateway\ArticleCommentTableGateway'),
            Yii::$container->get('Indigerd\Hydrator\Hydrator'),
            \Domain\Entity\ArticleComment::class
        );
    }
);
