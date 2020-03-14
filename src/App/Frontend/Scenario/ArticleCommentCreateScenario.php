<?php declare(strict_types=1);

namespace App\Frontend\Scenario;

use indigerd\scenarios\Scenario;
use indigerd\scenarios\validation\factory\ValidatorFactory;
use indigerd\scenarios\validation\factory\ValidatorCollectionFactory;

class ArticleCommentCreateScenario extends Scenario
{
    public function __construct(
        ValidatorFactory $validatorFactory,
        ValidatorCollectionFactory $validatorCollectionFactory
    ) {
        $validationRules = [
            [['articleId', 'content'], 'required'],
        ];
        parent::__construct($validatorFactory, $validatorCollectionFactory, $validationRules);
    }
}
