<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $article \Domain\Entity\Article */
/* @var $comments \Domain\Collection\ArticleCommentCollection */
/* @var $commentErrors array */
$this->title = $article->getTitle();
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <article class="article-item">
        <h1><?php echo $article->getTitle() ?></h1>

        <?php echo $article->getContent() ?>

        <?php if (sizeof($comments) > 0) { ?>
            <h3>Comments</h3>
            <?php foreach ($comments as $comment) { ?>
                <p><?php echo $comment->getContent() ?></p>
                <br/>
            <?php } ?>
        <?php } ?>

        <h3>Add comment</h3>
        <?php if (!empty($commentErrors)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($commentErrors as $fieldName => $errors) { ?>
                <?php foreach ($errors as $error) { ?>
                    <?php echo \yii\helpers\Inflector::humanize($fieldName) . ': ' . $error ?>
                    <br/>
                <?php } ?>
            <?php } ?>
        </div>
        <?php } ?>

        <?php
        ActiveForm::begin([
            'action' => \yii\helpers\Url::toRoute(['article/create-comment', 'articleId' => $article->getId()]),
        ]);
        ?>
            <input type="hidden" name="articleId" value="<?php echo $article->getId() ?>"/>
            <textarea name="content"></textarea><br/>
            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?php echo Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        <?php ActiveForm::end() ?>

    </article>
</div>