<?php

/**
 * This is the model class for table "v_resep_obat".
 *
 * The followings are the available columns in table 'v_resep_obat':
 * @property string $id_rekam_medis
 * @property integer $harga_jual
 * @property string $nama_obat
 * @property string $bahan_aktif
 * @property string $cara_pemakaian
 */
class VResepObat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_resep_obat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('harga_jual', 'numerical', 'integerOnly'=>true),
			array('nama_obat', 'length', 'max'=>100),
			array('bahan_aktif', 'length', 'max'=>50),
			array('id_rekam_medis, cara_pemakaian', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_rekam_medis, harga_jual, nama_obat, bahan_aktif, cara_pemakaian', 'safe', 'on'=>'search'),
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
			'id_rekam_medis' => 'Id Rekam Medis',
			'harga_jual' => 'Harga Jual',
			'nama_obat' => 'Nama Obat',
			'bahan_aktif' => 'Bahan Aktif',
			'cara_pemakaian' => 'Cara Pemakaian',
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

		$criteria->compare('id_rekam_medis',$this->id_rekam_medis,true);
		$criteria->compare('harga_jual',$this->harga_jual);
		$criteria->compare('nama_obat',$this->nama_obat,true);
		$criteria->compare('bahan_aktif',$this->bahan_aktif,true);
		$criteria->compare('cara_pemakaian',$this->cara_pemakaian,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VResepObat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
