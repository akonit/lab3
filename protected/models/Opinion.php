<?php
	
	class Opinion extends EMongoDocument {

		//FK from Product
		public $productId;

		public $login;

		public $time;

		public $text;

		function rules(){
			return array(
				array('productId,login,time,text', 'required'),
				array('login', 'length', 'max' => 20),
				array('text', 'length', 'max' => 150),

				array('productId', 'safe', 'on' => 'search'),
			);
		}

		function collectionName() {
			return 'opinion';
		}

		public function behaviors(){
			return array(
			   'EMongoTimestampBehaviour' => array(
			   	'class' => 'EMongoTimestampBehaviour'
			   ));
		}

		public function relations(){
			return array(
				'product' => array('one','Product','_id','on'=>'productId'),
			);
		}

		public function attributeLabels(){
			return array(
				'productId' => 'Идентификатор продукта',
				'login' => 'Никнейм',
				'time' => "Время создания отзыва",
				'text' => 'Текст отзыва'
			);
		}

		public static function model($className=__CLASS__)
		{
			return parent::model($className);
		}

		public function search(){
			$criteria = new EMongoCriteria;

			/*if($this->_id!=null) {
				$criteria->compare('_id', new MongoId($this->_id));
			}*/

			$criteria->compare('productId', $this->productId, true);

			return new EMongoDataProvider(get_class($this), array(
				'criteria' => $criteria,
			));

		}
	}
?>