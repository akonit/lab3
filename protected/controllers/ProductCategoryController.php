<?php

	class ProductCategoryController extends Controller {

		public $layout='//layouts/column2';

		public function filters(){
			return array(
				'accessControl',
			);
		}

		public function accessRules()
		{
			return array(
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('admin','index','view','create','update','delete', 'updatePid', 'updateCid'),
					'users'=>array('admin'),
				),
				array('deny',  // deny all users
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
			$model=ProductCategory::model()->findBy_id($id);
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}

		public function actionCreate()
		{
			$model=new ProductCategory;

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['ProductCategory']))
			{
				$model->attributes=$_POST['ProductCategory'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->_id));
			}

			$this->render('create',array(
				'model'=>$model,
			));
		}

		public function actionAdmin()
		{
			$model=new ProductCategory('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['ProductCategory']))
				$model->attributes=$_GET['ProductCategory'];

			$this->render('admin',array(
				'model'=>$model,
			));
		}

		public function actionDelete($id)
		{
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}

		public function actionUpdate($id)
		{
			$model=$this->loadModel($id);

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['ProductCategory']))
			{
				$model->attributes=$_POST['ProductCategory'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->_id));
			}

			$this->render('update',array(
				'model'=>$model,
			));
		}
	}
?>