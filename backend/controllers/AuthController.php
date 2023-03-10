<?php

namespace backend\controllers;

use common\models\AuthItemChild;
use Yii;
use common\models\AuthItem;
use common\models\AuthSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthController implements the CRUD actions for AuthItem model.
 */
class AuthController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem();

        if ($model->load(Yii::$app->request->post()) &&($model->type = $_GET['type'])&& $model->save()) {
            return $this->redirect(['index?type='.$model->type]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index?type='.$model->type]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->delete();

        return $this->redirect(['index?type='.$model->type]);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionChilds($id)
    {
        $model = $this->findModel($id);
        // //????????????????????????
        // $parent_childs = AuthItemChild::find()->all();
        // foreach ($parent_childs as $pc) {
        //     $parent_childsArray[$pc->parent] = $pc->child;
        // }
        // var_dump($parent_childsArray);
        //??????????????????,?????????checkboxlist
        $allPrivileges = AuthItem::find()->select(['name', 'description'])
            ->where(['type' => 2])->orderBy('description')->all();

        foreach ($allPrivileges as $pri) {
            $allPrivilegesArray[$pri->name] = $pri->description;
        }
        //?????????????????????

        $AuthChilds = AuthItemChild::find()->select(['child'])
            ->where(['parent' => $id])->orderBy('child')->all();

        $AuthChildsArray = array();

        foreach ($AuthChilds as $AuthChild) {
            array_push($AuthChildsArray, $AuthChild->child);
        }
        //????????????????????????,?????????AuthItemChild???,?????????????????????????????????
        if (isset($_POST['newPri'])) {
            AuthItemChild::deleteAll('parent=:id', [':id' => $id]);

            $newPri = $_POST['newPri'];

            $arrlength = count($newPri);

            for ($x = 0; $x < $arrlength; $x++) {
                $aPri = new AuthItemChild();
                $aPri->child = $newPri[$x];
                $aPri->parent = $id;
                $aPri->save();
            }
            return $this->redirect(['index?type='.$model->type]);
        }

        //??????checkBoxList??????

        return $this->render('childs', [
            'name' => $id,
            'AuthChildsArray' => $AuthChildsArray,
            'allPrivilegesArray' => $allPrivilegesArray
        ]);

    }
}