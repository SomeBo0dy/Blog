<?php

use common\models\AuthItem;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$model = AuthItem::findOne($name);

$this->title = '角色权限设置: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '角色', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->description;
$this->params['breadcrumbs'][] = '权限设置';
?>

<div class="authItem-update">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="authItem-childs-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= Html::checkboxList('newPri',$AuthChildsArray,$allPrivilegesArray);?>

    <div class="form-group">
        <?= Html::submitButton('设置') ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



</div>




