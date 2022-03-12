<?php

/**
 * This is the model class for table "tbl_temp_kelulusan".
 *
 * The followings are the available columns in table 'tbl_temp_kelulusan':
 * @property string $id_temp_kelulusan
 * @property string $id_hasil_uji
 * @property string $cis
 * @property boolean $kelulusan
 * @property string $no_uji
 * @property string $no_kendaraan
 */
class TblTempKelulusan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_temp_kelulusan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cis', 'length', 'max'=>10),
			array('no_uji, no_kendaraan', 'length', 'max'=>20),
			array('id_hasil_uji, kelulusan', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_temp_kelulusan, id_hasil_uji, cis, kelulusan, no_uji, no_kendaraan', 'safe', 'on'=>'search'),
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
			'id_temp_kelulusan' => 'Id Temp Kelulusan',
			'id_hasil_uji' => 'Id Hasil Uji',
			'cis' => 'Cis',
			'kelulusan' => 'Kelulusan',
			'no_uji' => 'No Uji',
			'no_kendaraan' => 'No Kendaraan',
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

		$criteria->compare('id_temp_kelulusan',$this->id_temp_kelulusan,true);
		$criteria->compare('id_hasil_uji',$this->id_hasil_uji,true);
		$criteria->compare('cis',$this->cis,true);
		$criteria->compare('kelulusan',$this->kelulusan);
		$criteria->compare('no_uji',$this->no_uji,true);
		$criteria->compare('no_kendaraan',$this->no_kendaraan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblTempKelulusan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
