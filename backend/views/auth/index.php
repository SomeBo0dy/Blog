<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AuthSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $_GET['type'] == 1 ?'角色管理':'权限管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index">
    <h1>
        <?= Html::encode($this->title) ?>
    </h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'description:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => $_GET['type'] == 1 ? '{update} {childs} {delete}' : '{update} {delete}',
                'buttons' => $_GET['type'] == 1 ? [
                    'childs' => function ($url, $model, $key) {
                            if ($model->name != 'admin') {
                                return Html::a('权限', ['childs', 'id' => $model->name], [
                                    'class' => 'btn btn-primary',
                                    'data' => [
                                        'method' => 'post',
                                        'params' => [
                                            'params_key' => 'params_val'
                                        ]

                                    ],
                                ]);
                            } else {
                                return;
                            }
                        },
                    'update' => function ($url, $model, $key) {
                            if ($model->name != 'admin') {
                                return Html::a('编辑', ['update', 'id' => $model->name, 'type' => $model->type], [
                                    'class' => 'btn btn-primary',
                                    'data' => [
                                        'method' => 'post',
                                        'params' => [
                                            'params_key' => 'params_val'
                                        ]

                                    ],
                                ]);
                            } else {
                                return;
                            }
                        },
                    'delete' => function ($url, $model, $key) {
                            if ($model->name != 'admin') {
                                return Html::a('删除', ['delete', 'id' => $model->name, 'type' => $model->type], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => '您确定要删除吗?',
                                        'method' => 'post',
                                        'params' => [
                                            'params_key' => 'params_val'
                                        ]

                                    ],
                                ]);
                            } else {
                                return;
                            }
                        }
                ] : [
                    'update' => function ($url, $model, $key) {
                            if ($model->name != 'admin') {
                                return Html::a('编辑', ['update', 'id' => $model->name, 'type' => $model->type], [
                                    'class' => 'btn btn-primary',
                                    'data' => [
                                        'method' => 'post',
                                        'params' => [
                                            'params_key' => 'params_val'
                                        ]

                                    ],
                                ]);
                            } else {
                                return;
                            }
                        },
                    'delete' => function ($url, $model, $key) {
                            if ($model->name != 'admin') {
                                return Html::a('删除', ['delete', 'id' => $model->name, 'type' => $model->type], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => '您确定要删除吗?',
                                        'method' => 'post',
                                        'params' => [
                                            'params_key' => 'params_val'
                                        ]

                                    ],
                                ]);
                            } else {
                                return;
                            }
                        }
                ],
            ]
        ]
    ]); ?>
</div>