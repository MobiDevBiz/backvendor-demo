<?php

/**
 * This is the model class for table "{{post_category}}".
 *
 * The followings are the available columns in table '{{post_category}}':
 * @property integer $id
 * @property integer $post_id
 * @property integer $category_id
 *
 * The followings are the available model relations:
 * @property Category $category
 * @property Post $post
 *
 * @author    MobiDev Corporation
 * @license   http://mobidev.biz/backvendor_license
 * @link      http://mobidev.biz/backvendor
 *
 */
class PostCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PostCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{post_category}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_id, category_id', 'required'),
			array('post_id, category_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, post_id, category_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'post' => array(self::BELONGS_TO, 'Post', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'post_id' => 'Post',
			'category_id' => 'Category',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('category_id',$this->category_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}