<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AuthItem */

$this->title = $_GET['type'] == 1 ?'创建角色':'创建权限';
$this->params['breadcrumbs'][] = $_GET['type'] == 1 ?'角色':'权限';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
