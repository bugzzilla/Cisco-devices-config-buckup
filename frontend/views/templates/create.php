<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Templates */

$this->title = 'Create Template';
$this->params['breadcrumbs'][] = ['label' => 'Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="templates-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
