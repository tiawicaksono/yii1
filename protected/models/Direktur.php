<?php

/**
 * This is the model class for table "direktur".
 *
 * The followings are the available columns in table 'direktur':
 * @property string $idx
 * @property string $nama
 * @property string $nip
 * @property string $pangkat
 * @property string $tandatangan
 * @property string $tandatangan2
 * @property string $tandatangan3
 * @property string $kodewilayah
 * @property string $flag_tandatangan_aktif
 * @property boolean $flag_aktif
 * @property string $verifikasi
 */
class Direktur extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'direktur';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idx, nama, nip, pangkat, kodewilayah, verifikasi', 'required'),
			array('nama', 'length', 'max'=>50),
			array('nip', 'length', 'max'=>25),
			array('flag_tandatangan_aktif', 'length', 'max'=>1),
			array('tandatangan, tandatangan2, tandatangan3, flag_aktif', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idx, nama, nip, pangkat, tandatangan, tandatangan2, tandatangan3, kodewilayah, flag_tandatangan_aktif, flag_aktif, verifikasi', 'safe', 'on'=>'search'),
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
			'idx' => 'Idx',
			'nama' => 'Nama',
			'nip' => 'Nip',
			'pangkat' => 'Pangkat',
			'tandatangan' => 'Tandatangan',
			'tandatangan2' => 'Tandatangan2',
			'tandatangan3' => 'Tandatangan3',
			'kodewilayah' => 'Kodewilayah',
			'flag_tandatangan_aktif' => 'Flag Tandatangan Aktif',
			'flag_aktif' => 'Flag Aktif',
			'verifikasi' => 'Verifikasi',
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

		$criteria->compare('idx',$this->idx,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('nip',$this->nip,true);
		$criteria->compare('pangkat',$this->pangkat,true);
		$criteria->compare('tandatangan',$this->tandatangan,true);
		$criteria->compare('tandatangan2',$this->tandatangan2,true);
		$criteria->compare('tandatangan3',$this->tandatangan3,true);
		$criteria->compare('kodewilayah',$this->kodewilayah,true);
		$criteria->compare('flag_tandatangan_aktif',$this->flag_tandatangan_aktif,true);
		$criteria->compare('flag_aktif',$this->flag_aktif);
		$criteria->compare('verifikasi',$this->verifikasi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Direktur the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
