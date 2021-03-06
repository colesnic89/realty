<?php

namespace app\modules\Admin\controllers;

use Yii;
use app\models\Object\Object;
use app\models\Object\ObjectSearch;
use yii\web\NotFoundHttpException;
use yii\imagine\Image;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use app\modules\Admin\controllers\AdminController;
use app\models\ObjectImage\ObjectImage;
use yii\helpers\Url;

/**
 * ObjectController implements the CRUD actions for Object model.
 */
class ObjectController extends AdminController
{

    /**
     * Lists all Object models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Object model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Object model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Object();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->ID]);
        }

        return $this->render('create', [
            'model' => $model,
            'initialImagesPreview' => [],
            'initialImagesPreviewConfig' => [],
        ]);
    }

    /**
     * Updates an existing Object model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->ID]);
        }
        
        $initialImagesPreview = [];
        $initialImagesPreviewConfig = [];
        foreach ($model->objectImages as $image) {
            $initialImagesPreview[] = Url::to("@web/uploads/objects/{$image->Medium}", true);
        }

        return $this->render('update', [
            'model' => $model,
            'initialImagesPreview' => $initialImagesPreview,
            'initialImagesPreviewConfig' => $initialImagesPreviewConfig,
        ]);
    }

    /**
     * Deletes an existing Object model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionUploadImages($objectID)
    {
        $uploads = UploadedFile::getInstancesByName('images');
        
        if (count($uploads)) {
            $images = [];
            foreach ($uploads as $tempImage)
            {
                try {
                    $uniqID = uniqid();
                    
                    $tempImagePath = Yii::getAlias("@webroot/uploads/temp/{$uniqID}.{$tempImage->extension}");
                    $tempImage->saveAs($tempImagePath);

                    $imageLargeObj = Image::getImagine()->open($tempImagePath);
                    $imageLargeObj->resize($imageLargeObj->getSize()->widen(1200));
                    $imageLargeName = "large_{$uniqID}.{$tempImage->extension}";
                    $imageLargePath = Yii::getAlias("@webroot/uploads/objects/{$imageLargeName}");
                    $imageLargeObj->save($imageLargePath);

                    $imageMedium = Image::thumbnail($tempImagePath, 400, 400);
                    $imageMediumName = "medium_{$uniqID}.{$tempImage->extension}";
                    $imageMediumPath = Yii::getAlias("@webroot/uploads/objects/{$imageMediumName}");
                    $imageMedium->save($imageMediumPath);

                    $imageSmall = Image::thumbnail($tempImagePath, 120, 120);
                    $imageSmallName = "small_{$uniqID}.{$tempImage->extension}";
                    $imageSmallPath = Yii::getAlias("@webroot/uploads/objects/{$imageSmallName}");
                    $imageSmall->save($imageSmallPath);

                    FileHelper::unlink($tempImagePath);
                    
                    $images[] = [
                        'ObjectID' => $objectID,
                        'Large' => $imageLargeName,
                        'Medium' => $imageMediumName,
                        'Small' => $imageSmallName,
                        'IsMain' => 0,
                    ];
                } catch (Exception $ex) {}
            }
            
            $this->saveImages($images, $objectID);
        }
        
        $output = array('uploaded' => 'OK' );
        
        exit(json_encode($output));
    }
    
    private function saveImages($images, $objectID)
    {
        if (count($images) > 0) {
            $isMainImage = ObjectImage::find()->where(['IsMain' => 1, 'ObjectID' => $objectID])->count();
            
            if (!$isMainImage) {
                $images[0]['IsMain'] = 1;
            }
            
            foreach ($images as $image) {
                $imageModel = new ObjectImage($image);
                $imageModel->save();
            }
        }
    }

    /**
     * Finds the Object model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Object the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Object::find()->where(['ID' => $id])->limit(1)->with('objectImages')->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
