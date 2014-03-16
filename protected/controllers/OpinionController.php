<?php

	class OpinionController extends Controller {

		public $layout='//layouts/column2';

		public function filters(){
			return array(
				'accessControl',
			);
		}

		public function accessRules() {
			return array(
				array('allow',
					'actions' => array('delete'),
					'expression' => '$user->isAdmin()'
				),
				array('deny',
					'actions' => array('create','edit'),
					'users'=>array('?'),
				),
				array('allow',
					'users'=>array('*'),
				),
			);
		}

		public function actionIndex(){
			$this->render('index');
		}

		public function actionView($id)
		{
			$this->render('view',array(
				'model'=>$this->loadModel($id),
			));
		}

		public function loadModel($id)
		{
			$model=Opinion::model()->findBy_id($id);
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}

		public function actionCreate($product){
			$model=new Opinion;
			if(isset($_POST['Opinion'])){
				$model->attributes=$_POST['Opinion'];
				$model->time=date('Y/m/d H:i:s');
				$model->productId=$product;
				if($model->validate()&&$model->save()){
					$this->redirect(array('/product/view','id'=>$product));
				}
			}

			$this->render('create',array(
				'model'=>$model
			));
		}
	}
?>