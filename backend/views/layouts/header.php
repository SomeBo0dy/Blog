<?php
use common\models\Comment;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">后台</span><span class="logo-lg">' . 'YELLOW BLOG 后台' . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"><?= Comment::getPengdingCommentCount() > 0 ? Comment::getPengdingCommentCount() : ''?></span>
                    </a>
                    <?php if(Comment::getPengdingCommentCount() > 0){?>
                        <ul class="dropdown-menu">
                            <li class="header">你有<?=Comment::getPengdingCommentCount()?>个新消息</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="/comment/index">
                                                <i class="fa fa-warning text-yellow"><?= Comment::getPengdingCommentCount()?>&nbsp条评论等待审核</i> 
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                        </ul>
                    <?php } else { ?>
                        <ul class="dropdown-menu">
                            <li class="header">当前暂无消息</li>
                        </ul>
                    <?php }  ?>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= Yii::$app->user->identity->nickname ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                alt="User Image"/>
                            <p>
                                <?= Yii::$app->user->identity->nickname ?> 
                            </p>
                        </li>
                            
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?=  '<a href="/adminuser/'.Yii::$app->user->identity->id.'" class="btn btn-default btn-flat">简介</a>'?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    '注销',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>    
                        
                </li>                  
            </ul>
        </div>
    </nav>
</header>
