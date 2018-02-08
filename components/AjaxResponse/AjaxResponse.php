<?php

namespace app\components\AjaxResponse;

use Yii;

class AjaxResponse
{
    
    public static function send(array $data, array $errors = null)
    {
        $success = count($errors) === 0;
        
        $response = [
            'success' => $success,
            'data' => $data,
            'errors' => $errors,
        ];
        
        echo json_encode($response);
        Yii::$app->end();
    }
    
}