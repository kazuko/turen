<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\catalog\Brand;

/* @var $this yii\web\View */
/* @var $searchModel common\models\catalog\BrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('catalog', 'Brand');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
               <li class="active">
                   <?= Html::a(Yii::t('common', 'Index'), 'javascript:;') ?>
               </li>
               <li data-original-title="<?= Yii::t('common', 'Click').'('.Yii::t('common', 'Create').')'?>" data-toggle="tooltip">
                    <?= Html::a(Yii::t('common', 'Create'), ['create']) ?>
               </li>
            </ul>
           
            <div class="tab-content clearfix">
                <div class="tab-pane active brand-index">
                
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                        
                    <!-- 
                        <p>
                            <?= Html::a(Yii::t('catalog', 'Create Brand'), ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                     -->
            
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    
                    'options' => ['class' => 'grid-view box-body table-responsive no-padding'],//整个grid view样式//\yii\helpers\Html::renderTagAttributes()
                    'tableOptions' => ['class'=>'table table-hover table-striped table-bordered'],//表格总样式
                    
                    'headerRowOptions' => [],//头部单行样式//\yii\helpers\Html::renderTagAttributes()
                    'footerRowOptions' => [],//底部单行样式//\yii\helpers\Html::renderTagAttributes()
                    
                    'showHeader' => true,
                    'showFooter' => false,
                    
                    'layout' => "{summary}\n{errors}\n{items}\n{pager}",//布局
                    
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        
                        //'id',
                        'name',
                        'image',
                        //'desc:ntext',
                        //'url:url',
                        'sort',
                        [
                            'attribute' => 'status',
                            'filter' => [Brand::BRAND_STATUS_ON=>Yii::t('common', 'On'), Brand::BRAND_STATUS_OFF=>Yii::t('common', 'Off')],
                            'value' => function($model, $key, $index, $_this){
                                return $model->status?Yii::t('common', 'On') : Yii::t('common', 'Off');
                            },
                        ],
                        // 'created_at',
                        'updated_at:datetime',
            
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => Yii::t('common', 'Opration'),
                        ],
                    ],
                ]); ?>
                                
                </div>
                
            </div>
        </div>
	        
    </div>
</div>



