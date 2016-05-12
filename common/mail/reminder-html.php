<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\components\MiscHelpers;
use frontend\models\Meeting;
use frontend\models\UserContact;
/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\BaseMessage instance of newly created mail message */
?>
<table  cellpadding="0" cellspacing="10" border="0" align="center" width="600">
  <tr>
    <td colspan="2">
      <p><em>Hi, this email is regarding our new service <?php echo HTML::a(Yii::t('frontend','Meeting Planner'),$links['home']); ?>. The service makes it easy to plan meetings without the exhausting threads of repetitive emails.</em></p>
      <p>This is just a reminder about your meeting coming up <?php echo $display_time; ?>. <?php echo HTML::a(Yii::t('frontend','View the meeting details'),$links['view']); ?>.</p>
      <p><em>Stay tuned: Soon we'll embed a link to the map and some helpful features for if you're running late or need to call the other participant(s).</em></p>
    </td>
  </tr>
</table>
<table  cellpadding="0" cellspacing="10" border="0" align="center" width="600">
  <tr><td width="300" style="text-align:center;margin:10px;">
<p>
  <?php echo Html::a(Yii::t('frontend','Visit Meeting Planner'), $links['home']); ?>
</p>
</td></tr>
<tr><td width="300" style="text-align:center;font-size:75%;margin:10px;">
  <em>
    <?php echo HTML::a(Yii::t('frontend','Review your email settings'),$links['footer_email']); ?>
    | <?php echo HTML::a(Yii::t('frontend','Block this person'),$links['footer_block']); ?>
    | <?php echo HTML::a(Yii::t('frontend','Block all emails'),$links['footer_block_all']); ?>
  </em>
</td></tr>
</table>