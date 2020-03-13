<?php
/* @var $this yii\web\View */
/* @var $article \Domain\Entity\Article */
$this->title = $article->getTitle();
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <article class="article-item">
        <h1><?php echo $article->getTitle() ?></h1>

        <?php echo $article->getContent() ?>

    </article>
</div>