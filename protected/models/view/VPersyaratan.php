<?php

/**
 * This is the model class for table "v_persyaratan".
 *
 * The followings are the available columns in table 'v_persyaratan':
 * @property integer $id_persyaratan_category
 * @property string $persyaratan_category
 * @property integer $id_rekom
 * @property integer $id_pengujian
 * @property string $category_code
 * @property string $keterangan
 * @property integer $persyaratan_id
 * @property string $persyaratan
 */
class VPersyaratan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_persyaratan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_persyaratan_category, id_rekom, id_pengujian, persyaratan_id', 'numerical', 'integerOnly'=>true),
			array('category_code', 'length', 'max'=>5),
			array('persyaratan_category, keterangan, persyaratan', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_persyaratan_category, persyaratan_category, id_rekom, id_pengujian, category_code, keterangan, persyaratan_id, persyaratan', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_persyaratan_category' => 'Id Persyaratan Category',
			'persyaratan_category' => 'Persyaratan Category',
			'id_rekom' => 'Id Rekom',
			'id_pengujian' => 'Id Pengujian',
			'category_code' => 'Category Code',
			'keterangan' => 'Keterangan',
			'persyaratan_id' => 'Persyaratan',
			'persyaratan' => 'Persyaratan',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_persyaratan_category',$this->id_persyaratan_category);
		$criteria->compare('persyaratan_category',$this->persyaratan_category,true);
		$criteria->compare('id_rekom',$this->id_rekom);
		$criteria->compare('id_pengujian',$this->id_pengujian);
		$criteria->compare('category_code',$this->category_code,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('persyaratan_id',$this->persyaratan_id);
		$criteria->compare('persyaratan',$this->persyaratan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VPersyaratan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
