<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contact', ['create'], ['class' => 'btn btn-success']) ?> <?= Html::button(Yii::t('app','Delete All'), ['class' => 'btn btn-success']) ?> 
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'firstname',
            'lastname',
            'phone',
            'mail:ntext',
            // 'address:ntext',
            // 'city:ntext',
            // 'zip:ntext',
            'isFriend:boolean',
            ['class' => 'yii\grid\CheckboxColumn','name'=>'delete','options'=>['checked'=>'true']],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
<script type="text/javascript">
   $(document).ready(function(){
   
   $('button.btn').click(function(e){
      e.preventDefault();
      $('input:checkbox:checked').each(function(e){
         $.ajax({
              url:'http://localhost:82/contactBook/web/index.php?r=contact/delete&id='+$(this).val(),
              type:'POST',
              data: {'id':$(this).val()},
              success:function(){
                 $(document).load('<?= Url::to(['contact/index'])?>');
              }
           });
      });
   });
   });
</script>