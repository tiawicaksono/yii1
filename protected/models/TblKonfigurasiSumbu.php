<?php

/**
 * This is the model class for table "tbl_konfigurasi_sumbu".
 *
 * The followings are the available columns in table 'tbl_konfigurasi_sumbu':
 * @property integer $id_knfigurasi_sumbu
 * @property string $konfigurasi_sumbu
 */
class TblKonfigurasiSumbu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_konfigurasi_sumbu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('konfigurasi_sumbu', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_konfigurasi_sumbu, konfigurasi_sumbu', 'safe', 'on'=>'search'),
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
			'id_konfigurasi_sumbu' => 'Id Knfigurasi Sumbu',
			'konfigurasi_sumbu' => 'Konfigurasi Sumbu',
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

		$criteria->compare('id_konfigurasi_sumbu',$this->id_knfigurasi_sumbu);
		$criteria->compare('konfigurasi_sumbu',$this->konfigurasi_sumbu,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblKonfigurasiSumbu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
