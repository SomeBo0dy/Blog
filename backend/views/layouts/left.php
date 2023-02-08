<?php
use common\models\Comment;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>
                    <?= Yii::$app->user->identity->nickname ?>
                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'encodeLabels' => false,
                'items' => [
                    ['label' => '展示菜单', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'fas fa-tachometer', 'url' => ['/']],
                    ['label' => '管理菜单', 'options' => ['class' => 'header']],
                    [
                        'label' => '文章管理',
                        'icon' => 'fas fa-server',
                        'url' => '#',
                        'items' => [
                            ['label' => '查看文章', 'icon' => 'circle-o', 'url' => ['/post/index']],
                            ['label' => '添加文章', 'icon' => 'circle-o', 'url' => ['/post/create']],
                            ['label' => '查看文章类别', 'icon' => 'circle-o', 'url' => ['/category/index']],
                            ['label' => '添加文章类别', 'icon' => 'circle-o', 'url' => ['/category/create']],

                        ],
                    ],
                    [
                        'label' => '评论管理' . (Comment::getPengdingCommentCount() > 0 ? '<span class="badge" style="float: right">' . Comment::getPengdingCommentCount() : '') . '</span>',
                        'icon' => 'fas fa-ticket',
                        'url' => ['/comment/index']
                    ],
                    ['label' => '用户管理', 'icon' => 'fas fa-users', 'url' => ['/user/index']],
                    [
                        'label' => '管理员管理',
                        'icon' => 'fad fa-user-secret',
                        'url' => '#',
                        'items' => [
                            ['label' => '查看管理员', 'icon' => 'circle-o', 'url' => ['/adminuser/index']],
                            ['label' => '新增管理员', 'icon' => 'circle-o', 'url' => ['/adminuser/create']],
                        ],
                    ],
                    [
                        'label' => '角色管理',
                        'icon' => 'fas fa-puzzle-piece',
                        'url' => '#',
                        'items' => [
                            ['label' => '查看角色', 'icon' => 'circle-o', 'url' => ['/auth/index?type=1']],
                            ['label' => '新增角色', 'icon' => 'circle-o', 'url' => ['/auth/create?type=1']],
                        ],
                    ],
                    [
                        'label' => '权限管理',
                        'icon' => 'fas fa-puzzle-piece',
                        'url' => '#',
                        'items' => [
                            ['label' => '查看权限', 'icon' => 'circle-o', 'url' => ['/auth/index?type=2']],
                            ['label' => '新增权限', 'icon' => 'circle-o', 'url' => ['/auth/create?type=2']],
                        ],
                    ],
                    // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    // [
                    //     'label' => 'Some tools',
                    //     'icon' => 'share',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                    //         ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    //         [
                    //             'label' => 'Level One',
                    //             'icon' => 'circle-o',
                    //             'url' => '#',
                    //             'items' => [
                    //                 ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                    //                 [
                    //                     'label' => 'Level Two',
                    //                     'icon' => 'circle-o',
                    //                     'url' => '#',
                    //                     'items' => [
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                     ],
                    //                 ],
                    //             ],
                    //         ],
                    //     ],
                    // ],
                ],
            ]
        ) ?>

    </section>

</aside>