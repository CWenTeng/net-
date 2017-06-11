<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Expert;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReserveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$expert_name=Yii::$app->request->get( 'expert_name' );
$expert_id = Expert::find()
                ->select(['id'])
                ->where(['expert_name'=>$expert_name])
                ->indexBy('id')
                ->column();
foreach ($expert_id as $value) {
       // echo $value;     
    }

?>
<form action="" method="get">
<span style="font-size: 16px;color: #888;">您想要预约的人是:<?php echo $expert_name;?></span>
<br />
<span style="font-size: 16px;color: #888;">您选择的日期是:</span>
<input type="date" value="2017-05-03"/>
<br />
<span style="font-size: 16px;color: #888;">您选择的预定时间是:</span>
<br />
<label><input name="Fruit" type="radio" value="" />8:00-8:30 </label>
<label><input name="Fruit" type="radio" value="" />8:30-9:00 </label>
<label><input name="Fruit" type="radio" value="" />9:00-9:30 </label>
<label><input name="Fruit" type="radio" value="" />9:30-10:00 </label>
<label><input name="Fruit" type="radio" value="" />10:00-10:30 </label>
<label><input name="Fruit" type="radio" value="" />10:30-11:00 </label>
<label><input name="Fruit" type="radio" value="" />11:00-11:30 </label>
<br />
<label><input name="Fruit" type="radio" value="" />1:30-2:00 </label>
<label><input name="Fruit" type="radio" value="" />2:00-2:30 </label>
<label><input name="Fruit" type="radio" value="" />2:30-3:00 </label>
<label><input name="Fruit" type="radio" value="" />3:00-3:30 </label>
<label><input name="Fruit" type="radio" value="" />3:30-4:00 </label>
<label><input name="Fruit" type="radio" value="" />4:00-4:30 </label>
<label><input name="Fruit" type="radio" value="" />4:30-5:00 </label>
<br />
<button type="button" class="btn btn-success">提交</button>
</form>

