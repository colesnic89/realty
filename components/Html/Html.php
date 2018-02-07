<?php

namespace app\components\Html;

use Yii;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Html as BootstrapHtml;

class Html extends BootstrapHtml
{
    
    public static function createLabel($label)
    {
        return Html::tag('i', 'add', ['class' => 'material-icons']) . " " . Html::tag('span', strtoupper($label));
    }
    
    public static function removeLabel($label)
    {
        return Html::tag('i', 'delete_forever', ['class' => 'material-icons']) . " " . Html::tag('span', strtoupper($label));
    }
    
    public static function createLink($label, $url, $options = [])
    {
        $text = Html::createLabel($label);
        $options = ArrayHelper::merge([
            'class' => 'btn btn-success ',
        ], $options);
        return Html::a($text, $url, $options);
    }
    
    public static function removeLink($label, $url, $options = [])
    {
        $text = Html::removeLabel($label);
        $options = ArrayHelper::merge([
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Confirm deletion?'),
            ],
        ], $options);
        return Html::a($text, $url, $options);
    }
    
    public static function goBackLink($text, $url, $options = [])
    {
        $options = ArrayHelper::merge([
            'class' => 'btn btn-info',
        ], $options);
        $text = self::tag('i', 'chevron_left', ['class' => 'material-icons']) . ' ' . self::tag('span', strtoupper($text));
        return Html::a($text, $url, $options);
    }
    
    
    public static function saveSubmitButton($content = 'Submit', $options = array())
    {
        $options = ArrayHelper::merge([
            'class' => 'btn btn-success',
        ], $options);
        
        return parent::submitButton(self::tag('i', 'save', ['class' => 'material-icons']) . " " . self::tag('span', strtoupper($content)), $options);
    }
    
}