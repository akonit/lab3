<?php

	class ProductController extends Controller {

		public $layout='//layouts/column2';

		public function filters(){
			return array(
				'accessControl',
			);
		}

		public function accessRules() {
			return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
					'actions'=>array('index','view'),
					'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' actions
					'actions'=>array('opinion', 'updateMark'),
					'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' and 'update' actions
					'actions'=>array('admin', 'create', 'update', 'delete'),
					'users'=>array('admin'),
				),
				array('deny',  // deny all users
					'users'=>array('*'),
				),
			);
		}

		public function actionIndex(){
			$criteria = new EMongoCriteria();

			if(isset($_GET['q']))
			{
			    $q = $_GET['q'];
			    $criteria->compare('description', $q, true);
			} 

			$dataProvider=new EMongoDataProvider('Product', array('criteria'=>$criteria));
			Yii::trace(CVarDumper::dumpAsString($criteria));
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));
		}

		public function actionView($id)
		{
			$this->render('view',array(
				'model'=>$this->loadModel($id),
			));
		}

		public function loadModel($id)
		{
			$model=Product::model()->findBy_id($id);
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}

		public function actionCreate(){
			$model=new Product;
			if(isset($_POST['Product'])){
				$model->attributes=$_POST['Product'];
				if($model->validate()&&$model->save()){
					$model->id = (string)$model->_id;
					$this->redirect(array('/product/view','id'=>$model->_id));
				}
			}

			$this->render('create',array(
				'model'=>$model
			));
		}

		public function actionAdmin()
		{
			$model=new Product('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Product']))
				$model->attributes=$_GET['Product'];

			$this->render('admin',array(
				'model'=>$model,
			));
		}

		public function actionUpdate($id)
		{
			$model=$this->loadModel($id);

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Product']))
			{
				$model->attributes=$_POST['Product'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->_id));
			}

			$this->render('update',array(
				'model'=>$model,
			));
		}

		public function actionDelete($id)
		{

			$m = $this->loadModel($id);
			$product_categories = $m->productCategories();
			$check = 0;
			foreach($product_categories as $pct)
			{
				$check = 1;
			}
			if($check > 0)
				throw new CHttpException(500,'Constraint violation, found involved categories.');

			$m->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}

		//re-count rating
		public function actionUpdateMark() 
			{
				if(Yii::app()->request->isAjaxRequest){
				$mark = Yii::app()->request->getPost('mark');
				if(isset($_POST['id'])){ 
					$model = $this->loadModel($_POST['id']);
					$model->mark = ($model->mark * $model->voters + $mark) / ($model->voters + 1);
					$model->voters = $model->voters + 1;
					$model->save();
				}
			}
		}
	}
?>