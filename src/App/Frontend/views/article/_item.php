<?php
/**
 * @var $this yii\web\View
 * @var $article \Domain\Entity\Article
 */
use yii\helpers\Html;

?>
<hr/>
<div class="article-item row">
    <div class="col-xs-12">
        <h2 class="article-title">
            <?php echo Html::a($article->getTitle(), ['view', 'id'=>$article->getId()]) ?>
        </h2>
        <div class="article-meta">
            <span class="article-category">
                <?php echo Html::a(
                    $article->getCategory()->getName(),
                    ['index', 'categoryId' => $article->getCategory()->getId()]
                )?>
            </span>
        </div>
        <div class="article-content">
            <div class="article-text">
                <?php echo \yii\helpers\StringHelper::truncate($article->getContent(), 150, '...', null, true) ?>
            </div>
        </div>
    </div>
</div>
