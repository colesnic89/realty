<?php

namespace app\modules\User\controllers;

use app\controllers\BackController;
use app\models\User\UserSearch;
use app\components\AjaxResponse\AjaxResponse;

class UserSearchController extends BackController
{

    public function actionAdminSearch($searchString)
    {
        $query = UserSearch::find();

        if (is_integer($searchString)) {
            $orderField = 'ID';
            $query->where(['like', 'ID', $searchString]);
        } else {
            $orderField = 'NickName';
            $query->where(['like', 'NickName', $searchString])
                  ->orWhere(['like', 'FirstName', $searchString])
                  ->orWhere(['like', 'LastName', $searchString])
                  ->orWhere(['like', 'Email', $searchString]);
        }
        
        $users = $query->orderBy($orderField)->limit(50)->all();
        
        $results = [];
        foreach ($users as $user) {
            $results[] = [
                'id' => $user->ID,
                'text' => $user->nicknameWithName,
            ];
        }
        
        exit(json_encode([
            'results' => $results,
        ]));
    }

}