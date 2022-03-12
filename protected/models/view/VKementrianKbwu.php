<?php

/**
 * This is the model class for table "v_kementrian_kbwu".
 *
 * The followings are the available columns in table 'v_kementrian_kbwu':
 * @property string $id_kendaraan
 * @property integer $id_jns
 * @property double $tahun
 * @property double $bulan
 * @property string $jumlah
 */
class VKementrianKbwu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_kementrian_kbwu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_jns', 'numerical', 'integerOnly'=>true),
			array('tahun, bulan', 'numerical'),
			array('id_kendaraan, jumlah', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kendaraan, id_jns, tahun, bulan, jumlah', 'safe', 'on'=>'search'),
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
			'id_kendaraan' => 'Id Kendaraan',
			'id_jns' => 'Id Jns',
			'tahun' => 'Tahun',
			'bulan' => 'Bulan',
			'jumlah' => 'Jumlah',
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

		$criteria->compare('id_kendaraan',$this->id_kendaraan,true);
		$criteria->compare('id_jns',$this->id_jns);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('bulan',$this->bulan);
		$criteria->compare('jumlah',$this->jumlah,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VKementrianKbwu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
