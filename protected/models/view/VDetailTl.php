<?php

/**
 * This is the model class for table "v_detail_tl".
 *
 * The followings are the available columns in table 'v_detail_tl':
 * @property string $no_uji
 * @property string $merk
 * @property string $tipe
 * @property string $nama_pemilik
 * @property string $no_kendaraan
 * @property string $jdatang
 * @property string $jselesai
 * @property string $kelulusan
 */
class VDetailTl extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_detail_tl';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_uji, merk, tipe', 'length', 'max'=>30),
			array('nama_pemilik', 'length', 'max'=>100),
			array('no_kendaraan', 'length', 'max'=>12),
			array('kelulusan', 'length', 'max'=>1000),
			array('jdatang, jselesai', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('no_uji, merk, tipe, nama_pemilik, no_kendaraan, jdatang, jselesai, kelulusan', 'safe', 'on'=>'search'),
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
			'no_uji' => 'No Uji',
			'merk' => 'Merk',
			'tipe' => 'Tipe',
			'nama_pemilik' => 'Nama Pemilik',
			'no_kendaraan' => 'No Kendaraan',
			'jdatang' => 'Jdatang',
			'jselesai' => 'Jselesai',
			'kelulusan' => 'Kelulusan',
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

		$criteria->compare('no_uji',$this->no_uji,true);
		$criteria->compare('merk',$this->merk,true);
		$criteria->compare('tipe',$this->tipe,true);
		$criteria->compare('nama_pemilik',$this->nama_pemilik,true);
		$criteria->compare('no_kendaraan',$this->no_kendaraan,true);
		$criteria->compare('jdatang',$this->jdatang,true);
		$criteria->compare('jselesai',$this->jselesai,true);
		$criteria->compare('kelulusan',$this->kelulusan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VDetailTl the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
