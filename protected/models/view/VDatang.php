<?php

/**
 * This is the model class for table "v_datang".
 *
 * The followings are the available columns in table 'v_datang':
 * @property string $tgl_uji
 * @property string $no_berkas
 * @property string $no_uji
 * @property string $nama_pemilik
 * @property string $no_kendaraan
 * @property string $no_chasis
 * @property string $no_mesin
 * @property string $id_kendaraan
 * @property string $id_daftar
 * @property string $id_retribusi
 * @property boolean $datang
 * @property string $jns_kend
 * @property string $nm_uji
 * @property string $id_uji
 * @property string $numerator
 */
class VDatang extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_datang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_uji', 'length', 'max'=>30),
			array('jns_kend', 'length', 'max'=>40),
			array('nm_uji', 'length', 'max'=>50),
			array('tgl_uji, no_berkas, nama_pemilik, no_kendaraan, no_chasis, no_mesin, id_kendaraan, id_daftar, id_retribusi, datang, id_uji, numerator', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tgl_uji, no_berkas, no_uji, nama_pemilik, no_kendaraan, no_chasis, no_mesin, id_kendaraan, id_daftar, id_retribusi, datang, jns_kend, nm_uji, id_uji, numerator', 'safe', 'on'=>'search'),
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
			'tgl_uji' => 'Tgl Uji',
			'no_berkas' => 'No Berkas',
			'no_uji' => 'No Uji',
			'nama_pemilik' => 'Nama Pemilik',
			'no_kendaraan' => 'No Kendaraan',
			'no_chasis' => 'No Chasis',
			'no_mesin' => 'No Mesin',
			'id_kendaraan' => 'Id Kendaraan',
			'id_daftar' => 'Id Daftar',
			'id_retribusi' => 'Id Retribusi',
			'datang' => 'Datang',
			'jns_kend' => 'Jns Kend',
			'nm_uji' => 'Nm Uji',
			'id_uji' => 'Id Uji',
			'numerator' => 'Numerator',
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

		$criteria->compare('tgl_uji',$this->tgl_uji,true);
		$criteria->compare('no_berkas',$this->no_berkas,true);
		$criteria->compare('no_uji',$this->no_uji,true);
		$criteria->compare('nama_pemilik',$this->nama_pemilik,true);
		$criteria->compare('no_kendaraan',$this->no_kendaraan,true);
		$criteria->compare('no_chasis',$this->no_chasis,true);
		$criteria->compare('no_mesin',$this->no_mesin,true);
		$criteria->compare('id_kendaraan',$this->id_kendaraan,true);
		$criteria->compare('id_daftar',$this->id_daftar,true);
		$criteria->compare('id_retribusi',$this->id_retribusi,true);
		$criteria->compare('datang',$this->datang);
		$criteria->compare('jns_kend',$this->jns_kend,true);
		$criteria->compare('nm_uji',$this->nm_uji,true);
		$criteria->compare('id_uji',$this->id_uji,true);
		$criteria->compare('numerator',$this->numerator,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VDatang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
