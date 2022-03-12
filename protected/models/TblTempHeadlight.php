<?php

/**
 * This is the model class for table "tbl_temp_headlight".
 *
 * The followings are the available columns in table 'tbl_temp_headlight':
 * @property string $id_temp_headlight
 * @property string $no_uji
 * @property string $no_kendaraan
 * @property string $cis
 * @property double $lamp_kt_kanan
 * @property double $lamp_kt_kiri
 * @property double $dev_kanan
 * @property double $dev_kiri
 * @property boolean $kelulusan
 * @property string $id_hasil_uji
 */
class TblTempHeadlight extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_temp_headlight';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lamp_kt_kanan, lamp_kt_kiri, dev_kanan, dev_kiri', 'numerical'),
			array('no_uji, no_kendaraan', 'length', 'max'=>20),
			array('cis', 'length', 'max'=>10),
			array('kelulusan, id_hasil_uji', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_temp_headlight, no_uji, no_kendaraan, cis, lamp_kt_kanan, lamp_kt_kiri, dev_kanan, dev_kiri, kelulusan, id_hasil_uji', 'safe', 'on'=>'search'),
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
			'id_temp_headlight' => 'Id Temp Headlight',
			'no_uji' => 'No Uji',
			'no_kendaraan' => 'No Kendaraan',
			'cis' => 'Cis',
			'lamp_kt_kanan' => 'Lamp Kt Kanan',
			'lamp_kt_kiri' => 'Lamp Kt Kiri',
			'dev_kanan' => 'Dev Kanan',
			'dev_kiri' => 'Dev Kiri',
			'kelulusan' => 'Kelulusan',
			'id_hasil_uji' => 'Id Hasil Uji',
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

		$criteria->compare('id_temp_headlight',$this->id_temp_headlight,true);
		$criteria->compare('no_uji',$this->no_uji,true);
		$criteria->compare('no_kendaraan',$this->no_kendaraan,true);
		$criteria->compare('cis',$this->cis,true);
		$criteria->compare('lamp_kt_kanan',$this->lamp_kt_kanan);
		$criteria->compare('lamp_kt_kiri',$this->lamp_kt_kiri);
		$criteria->compare('dev_kanan',$this->dev_kanan);
		$criteria->compare('dev_kiri',$this->dev_kiri);
		$criteria->compare('kelulusan',$this->kelulusan);
		$criteria->compare('id_hasil_uji',$this->id_hasil_uji,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblTempHeadlight the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
