<?php

/**
 * This is the model class for table "tbl_kepala_dinas".
 *
 * The followings are the available columns in table 'tbl_kepala_dinas':
 * @property integer $id_kepala_dinas
 * @property string $nama
 * @property string $pangkat
 * @property string $nip
 * @property integer $status
 */
class TblKepalaDinas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_kepala_dinas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('nama, pangkat, nip', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kepala_dinas, nama, pangkat, nip, status', 'safe', 'on'=>'search'),
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
			'id_kepala_dinas' => 'Id Kepala Dinas',
			'nama' => 'Nama',
			'pangkat' => 'Pangkat',
			'nip' => 'Nip',
			'status' => 'Status',
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

		$criteria->compare('id_kepala_dinas',$this->id_kepala_dinas);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('pangkat',$this->pangkat,true);
		$criteria->compare('nip',$this->nip,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblKepalaDinas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
