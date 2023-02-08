<?php
use common\models\Adminuser;
use common\models\Category;
use common\models\Comment;
use common\models\Post;
use common\models\User;
use common\models\Visitcount;
use Hisune\EchartsPHP\Doc\IDE\Series;
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use Hisune\EchartsPHP\ECharts;

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h1><?= $this->blocks['content-header'] ?></h1>
        <?php } else { ?>
            <h1>
                <?php
                if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                        \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                } ?>
                
            </h1>
        <?php } ?>
        <?=
            Breadcrumbs::widget(
                [
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]
            ) ?>
    </section>

    <section class="content">
        <?php if (Strlen($content)==38) { ?>
            <h4>今日首页访问量：<?= is_null(Yii::$app->redis->get('view_count'))?'0':Yii::$app->redis->get('view_count')?></h4 >
            <?php
             $sql = "SELECT sum(count) as sum FROM visit_count";
             $sum = Visitcount::findBySql($sql)->asArray()->all();
            ?>
            <h5>首页访问总量（截至昨日23点59分）：<?= is_null($sum[0]['sum'])?0:$sum[0]['sum']?></h5 >
            <h2>
                网站概况
                <small>资源数量</small>
            </h2>
            <!-- 统计数值 -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?=Post::getCount()?></h3>
                                <p>文章数</p>
                        </div>

                        <a href="/post/index" class="small-box-footer">详细 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?= (Comment::getCount()-Comment::getPengdingCommentCount()).
                            (Comment::getPengdingCommentCount() > 0?
                            '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.
                            Comment::getPengdingCommentCount():'')?></h3>
                            <p>已审核文章评论数<?=
                            Comment::getPengdingCommentCount() > 0?'&nbsp&nbsp&nbsp&nbsp待审核文章评论数':''?></p>
                        </div>
                        <a href="/comment/index" class="small-box-footer">详细 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?=User::getCount()?></h3>
                            <p>用户数</p>
                        </div>
                        <a href="/user/index" class="small-box-footer">详细 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?=Adminuser::getCount()?></h3>
                            <p>管理员数</p>
                        </div>
                        <a href="/adminuser/index" class="small-box-footer">详细 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->            
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-xs-12 col-lg-6">
                    <h2>
                        文章概况
                        <small>种类</small>
                    </h2>
                    <?php
                    $chart = new ECharts();
                    $categorys = Category::find()->asArray()->all();
                    $datesource = array();
                    foreach ($categorys as $category) {
                        $datesource[] = array('value' => $category['count'], 'name' => $category['category']); 
                    }
                    $option = array(
                        'title' => 
                        array(
                            'text' => '文章分类',
                            'left' => 'center',
                        ),
                        'tooltip' =>
                        array(
                            'trigger' => 'item',
                        ),
                        'legend' =>
                        array(
                            'orient' => 'vertical',
                            'left' => 'left',
                        ),
                        'series' => 
                        array(
                            array( 
                                    'name' => '文章分类',
                                    'type' => 'pie',
                                    'radius' => '50%',
                                    'data'=> $datesource, 
                                    
                                    'emphasis'=>
                                    array(
                                        'itemStyle'=> 
                                        array(
                                            'shadowBlur'=> 10,
                                            'shadowOffsetX'=> 0,
                                            'shadowColor'=> 'rgba(0, 0, 0, 0.5)'
                                        )
                                    )
                            )
                        )
                    );  
                    $chart->setOption($option);
                    echo $chart->render('category_chart');
                    ?>
                </div>
                <div class="col-xs-12 col-lg-6">
                    <h2>
                        作者贡献
                        <small>文章发布数</small>
                    </h2>
                    <?php
                    $chart = new ECharts();
                    $sql = "SELECT a.nickname, count(*) as count FROM adminuser a LEFT JOIN post p ON a.id = p.author_id WHERE p.status = 2 GROUP BY a.nickname";
                    $authors = Adminuser::findBySql($sql)->asArray()->all();
                    $datesource2 = array();
                    foreach ($authors as $author) {
                        $datesource2[] = array('value' => $author['count'], 'name' => $author['nickname']); 
                    }
                    $option = array(
                        'title' => 
                        array(
                            'text' => '文章发布数',
                            'left' => 'center',
                        ),
                        'tooltip' =>
                        array(
                            'trigger' => 'item',
                        ),
                        'legend' =>
                        array(
                            'orient' => 'vertical',
                            'left' => 'left',
                        ),
                        'series' => 
                        array(
                            array( 
                                    'name' => '文章发布数',
                                    'type' => 'pie',
                                    'radius' => '50%',
                                    'data'=> $datesource2, 
                                    
                                    'emphasis'=>
                                    array(
                                        'itemStyle'=> 
                                        array(
                                            'shadowBlur'=> 10,
                                            'shadowOffsetX'=> 0,
                                            'shadowColor'=> 'rgba(0, 0, 0, 0.5)'
                                        )
                                    )
                            )
                        )
                    );  
                    $chart->setOption($option);
                    echo $chart->render('author_chart');
                    ?>
                </div>
            </div>
            
            <!-- /.row -->
        <?php } else { ?>
            <?= $content ?>
        <?php } ?>

    </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; <?= date('Y') ?> <a href="https://somebodycn.xyz/index.html">YELLOW</a>.</strong> All rights
    reserved.
</footer>

