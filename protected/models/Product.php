<?php
	
	class Product extends EMongoDocument {

        public $id;

		public $name;

		public $description;

		public $mark;

		//total num of voters, need it to re-count average mark
		public $voters;

		public function opinions() {
			return Opinion::model()->findAll(array('productId' => (string) $this->_id));
		}

		public function productCategories() {
			return ProductCategory::model()->findAll(array('pid' => (string) $this->_id));
		}

		function rules(){
			return array(
				array('name,description,mark,voters', 'required'),
				array('name', 'length', 'max' => 20),
				array('description', 'length', 'max' => 150),
				
				array('name,description,mark,voters,_id', 'safe', 'on' => 'search'),
			);
		}
		
		function collectionName() {
			return 'product';
		}

		function relations(){
			return array(
				//one product -> many opinions
				'opinions' => array('many','Opinion','productId'),
			    'productCategories' => array('many', 'ProductCategory', 'pid'),
			);
		}

		public function attributeLabels(){
			return array(
				'name' => 'Имя продукта',
				'description' => "Описание",
				'mark' => 'Средняя оценка'
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

			$criteria->compare('name', (string)$this->name, true);
			$criteria->compare('description', (string)$this->description, true);
			/*$criteria->compare('mark', $this->mark);
			$criteria->compare('voters', $this->voters);*/

			//Yii::trace(CVarDumper::dumpAsString($this));

			return new EMongoDataProvider(get_class($this), array(
				'criteria' => $criteria,
			));

		}
	}
?>