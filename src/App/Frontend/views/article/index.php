<?php
/* @var $this yii\web\View */
/* @var $dataProvider \Infrastructure\DataProvider\DataProvider */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('frontend', 'Articles')
?>
<div id="article-index">
    <h1>
        <?php echo Yii::t('frontend', 'Articles') ?>
    </h1>
    <span class="glyphicon glyphicon-search" data-toggle="collapse" data-target="#search-form"></span>
    <?php echo \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'hideOnSinglePage' => true,
        ],
        'itemView' => '_item'
    ])?>
</div>
