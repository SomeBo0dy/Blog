<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AuthItem */

$this->title = $_GET['type'] == 1 ? '更新角色: ' . $model->name: '更新权限: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => $_GET['type'] == 1 ?'角色':'权限', 'url' => ['index?type='.$model->type]];
$this->params['breadcrumbs'][] = $model->name;
$this->params['breadcrumbs'][] = '更新';
?>
<div class="auth-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
