<?php

/**
 * This is the model class for table "tbl_indikator".
 *
 * The followings are the available columns in table 'tbl_indikator':
 * @property string $target
 * @property integer $tahun
 * @property integer $bulan
 * @property integer $hr_kerja
 * @property string $retribusi
 * @property string $buku
 * @property string $denda
 */
class TblIndikator extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_indikator';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tahun, bulan, hr_kerja', 'numerical', 'integerOnly'=>true),
			array('target, retribusi, buku, denda', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('target, tahun, bulan, hr_kerja, retribusi, buku, denda', 'safe', 'on'=>'search'),
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
			'target' => 'Target',
			'tahun' => 'Tahun',
			'bulan' => 'Bulan',
			'hr_kerja' => 'Hr Kerja',
			'retribusi' => 'Retribusi',
			'buku' => 'Buku',
			'denda' => 'Denda',
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

		$criteria->compare('target',$this->target,true);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('bulan',$this->bulan);
		$criteria->compare('hr_kerja',$this->hr_kerja);
		$criteria->compare('retribusi',$this->retribusi,true);
		$criteria->compare('buku',$this->buku,true);
		$criteria->compare('denda',$this->denda,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblIndikator the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
