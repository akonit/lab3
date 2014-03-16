<?php
	
	class Category extends EMongoDocument {

		public $name;

		public function rules()
		{
			return array(
				array('name', 'required'),
				array('name', 'length', 'max'=>64),

				array('name', 'safe', 'on'=>'search'),
			);
		}

		public function productCategories() {
			return ProductCategory::model()->findAll(array('cid' => (string) $this->_id));
		}

		public function relations()
		{
			return array(
				'productCategories' => array('many', 'ProductCategory', 'cid'),
			);
		}

		public function attributeLabels()
		{
			return array(
				'_id' => 'Идентификатор',
				'name' => 'Наименование категории продукта',
			);
		}

		public static function model($className=__CLASS__)
		{
			return parent::model($className);
		}

		public function search()
		{
			// @todo Please modify the following code to remove attributes that should not be searched.

			$criteria=new EMongoCriteria;

			/*$criteria->compare('_id',$this->_id);*/
			$criteria->compare('name',(string)$this->name,true);

			return new EMongoDataProvider($this, array(
				'criteria'=>$criteria,
			));
		}
	}
?>