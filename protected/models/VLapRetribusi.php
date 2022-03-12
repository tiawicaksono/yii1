<?php

/**
 * This is the model class for table "v_lap_retribusi".
 *
 * The followings are the available columns in table 'v_lap_retribusi':
 * @property string $tanggal_rekam_medis
 * @property string $total_biaya_dokter
 * @property string $total_biaya_obat
 */
class VLapRetribusi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_lap_retribusi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal_rekam_medis, total_biaya_dokter, total_biaya_obat', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tanggal_rekam_medis, total_biaya_dokter, total_biaya_obat', 'safe', 'on'=>'search'),
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
			'tanggal_rekam_medis' => 'Tanggal Rekam Medis',
			'total_biaya_dokter' => 'Total Biaya Dokter',
			'total_biaya_obat' => 'Total Biaya Obat',
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

		$criteria->compare('tanggal_rekam_medis',$this->tanggal_rekam_medis,true);
		$criteria->compare('total_biaya_dokter',$this->total_biaya_dokter,true);
		$criteria->compare('total_biaya_obat',$this->total_biaya_obat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VLapRetribusi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
