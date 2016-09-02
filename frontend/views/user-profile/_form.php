<?php

use yii\helpers\Html;
use yii\helpers\BaseHtml;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use common\components\MiscHelpers;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserProfile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-8">
 <!-- Nav tabs -->
 <ul class="nav nav-tabs" role="tablist">
   <li id="tabname" class="<?= ($model->tab=='name'?'active':'tabHide') ?>"><a href="#name" role="tab" data-toggle="tab"><?= Yii::t('frontend','Your name') ?></a></li>
   <li id="tabsocial" class="<?= ($model->tab=='social'?'active':'tabHide') ?>"><a href="#social" role="tab" data-toggle="tab"><?= Yii::t('frontend','Link Social accounts') ?></a></li>
   <li id="tabphoto" class="<?= ($model->tab=='photo'?'active':'tabHide') ?>"><a href="#photo" role="tab" data-toggle="tab"><?= Yii::t('frontend','Upload Photo') ?></a></li>
   <li id="tabusername" class="<?= ($model->tab=='username'?'active':'tabHide') ?>"><a href="#username" role="tab" data-toggle="tab"><?= Yii::t('frontend','Username') ?></a></li>
 </ul>
 <!-- Tab panes -->
 <?php
 $form = ActiveForm::begin([
     'action'=>['update','id'=>$model->id],
     'options'=>['enctype'=>'multipart/form-data']
   ]); // important
      ?>
 <div class="tab-content">
   <div class="tab-pane <?= ($model->tab=='name'?'active':'') ?> vertical-pad" id="name">
     <div class="user-profile-form">
         <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
         <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
         <?= $form->field($model, 'fullname')->textInput(['maxlength' => true])->label(Yii::t('frontend','Friendly Name'))->hint(Yii::t('frontend','Optional')) ?>
     </div>
   </div> <!-- end of profile tab -->
    <div class="tab-pane <?= ($model->tab=='social'?'active':'') ?> vertical-pad" id="social">
            <p>Do you want to login with one click with one of the following services?</p>
            <?= yii\authclient\widgets\AuthChoice::widget([
                 'baseAuthUrl' => ['site/auth'],
                 'popupMode' => false,
            ]) ?>
    </div> <!-- end of social tab -->
    <div class="tab-pane <?= ($model->tab=='username'?'active':'') ?> vertical-pad" id="username">
      <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label(Yii::t('frontend','Username'))->hint(Yii::t('frontend','Used for meeting links (URLs), signing in, et al.')) ?>
    </div>  <!-- end tab content -->
    <div class="tab-pane <?= ($model->tab=='photo'?'active':'') ?> vertical-pad" id="photo">
      <?=$form->field($model, 'image')->widget(FileInput::classname(), [
          'options' => ['accept' => 'image/*','data-show-upload'=>'false'],
           'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']],
      ]);   ?>
    </div> <!-- end of upload photo tab -->
</div> <!-- end tab content -->
<div class="form-group">
    <?= Html::submitButton(Yii::t('frontend', 'Update'), ['class' => 'btn btn-primary']) ?>
</div>
<?= BaseHtml::activeHiddenInput($model, 'tab',['id'=>'model_tab']); ?>
<?php
$this->registerJsFile(MiscHelpers::buildUrl().'/js/user_profile.js',['depends' => [\yii\web\JqueryAsset::className()]]);
ActiveForm::end();
?>
</div> <!-- end left col -->
<div class="col-md-4">
  <?php
   if ($model->avatar<>'') {
     echo '<img src="'.Yii::getAlias('@web').'/uploads/avatar/sqr_'.$model->avatar.'" class="profile-image"/>';
   } else {
     echo \cebe\gravatar\Gravatar::widget([
          'email' => common\models\User::find()->where(['id'=>Yii::$app->user->getId()])->one()->email,
          'options' => [
              'class'=>'profile-image',
              'alt' => common\models\User::find()->where(['id'=>Yii::$app->user->getId()])->one()->username,
          ],
          'size' => 128,
      ]);
   }
  ?>
</div> <!--end rt col -->
