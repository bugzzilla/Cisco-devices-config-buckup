<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Devices */

$this->title = 'Device: ' . $model->getDeviceFullName();
$this->params['breadcrumbs'][] = ['label' => 'Devices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="devices-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->device_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->device_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete device '.$model->getDeviceFullName(),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
    		'formatter' => [
    			'class' => 'yii\\i18n\\Formatter',
    			'nullDisplay' => '<span class="not-set">(not set)</span>',
    			'dateFormat' => 'medium',
    			'timeFormat' => 'medium',
    			'datetimeFormat' => 'medium',
    			'booleanFormat' => ['<span class="glyphicon glyphicon-remove"></span> Disabled', '<span class="glyphicon glyphicon-ok"></span> Enabled']
    		],    		
        	'attributes' => [
	            'device_id',
            	'device_hostname',
            	'device_address',
            	'templatesTemplate.template_name',            
            	'backup_status:boolean',
        	],
    	]) ?>

</div>
