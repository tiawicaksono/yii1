<?php

/**
 * This is the model class for table "tbl_temp_tl".
 *
 * The followings are the available columns in table 'tbl_temp_tl':
 * @property string $id_temp_tl
 * @property string $id_kendaraan
 * @property string $id_hasil_uji
 * @property string $tgl_tl
 * @property string $tgl_batas_tl
 */
class TblTempTl extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_temp_tl';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kendaraan, id_hasil_uji, tgl_tl, tgl_batas_tl', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_temp_tl, id_kendaraan, id_hasil_uji, tgl_tl, tgl_batas_tl', 'safe', 'on'=>'search'),
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
			'id_temp_tl' => 'Id Temp Tl',
			'id_kendaraan' => 'Id Kendaraan',
			'id_hasil_uji' => 'Id Hasil Uji',
			'tgl_tl' => 'Tgl Tl',
			'tgl_batas_tl' => 'Tgl Batas Tl',
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

		$criteria->compare('id_temp_tl',$this->id_temp_tl,true);
		$criteria->compare('id_kendaraan',$this->id_kendaraan,true);
		$criteria->compare('id_hasil_uji',$this->id_hasil_uji,true);
		$criteria->compare('tgl_tl',$this->tgl_tl,true);
		$criteria->compare('tgl_batas_tl',$this->tgl_batas_tl,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblTempTl the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
