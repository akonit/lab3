<?php

	class ProductCategory extends EMongoDocument {

		//product id
		public $pid;

		//category id
		public $cid;

		public function product() {
			return Product::model()->findBy_id($this->pid);
		}

		public function  category() {
			return Category::model()->findBy_id($this->cid);
		}

		public function rules()
		{
			return array(
				array('pid,cid', 'required'),

				array('_id,pid,cid', 'safe', 'on'=>'search'),
			);
		}

		function collectionName() {
			return 'productCategory';
		}

		public function relations()
		{
			return array(
				'p' => array('one', 'Product', '_id', 'on'=>'pid'),
				'c' => array('one', 'Category', '_id', 'on'=>'cid'),
			);
		}

		public function attributeLabels()
		{
			return array(
				'_id' => 'Идентификатор',
				'pid' => 'Продукт',
				'cid' => 'Категория продукта',
			);
		}

		public function search()
		{
			$criteria=new EMongoCriteria;

			//$criteria->compare('_id',(string)$this->_id, true);
			$criteria->compare('pid',(string)$this->pid, true);
			$criteria->compare('cid',(string)$this->cid, true);

			return new EMongoDataProvider($this, array(
				'criteria'=>$criteria,
			));
		}

		public static function model($className=__CLASS__)
		{
			return parent::model($className);
		}

		public function getProductName($data,$row)
		{
			return Product::model()->findBy_id($data->pid)->name;
		}

		public function getCategoryName($data,$row)
		{
			return Category::model()->findBy_id($data->cid)->name;
		}
	}
?>