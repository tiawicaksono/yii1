<?php

/**
 * This is the model class for table "m_obat".
 *
 * The followings are the available columns in table 'm_obat':
 * @property string $id
 * @property string $nama_obat
 * @property string $kategori_obat_id
 * @property string $bahan_aktif
 * @property string $cara_pemakaian
 * @property string $usability
 * @property string $created_at
 * @property string $updated_at
 */
class MObat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_obat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_obat', 'required'),
			array('nama_obat', 'length', 'max'=>100),
			array('bahan_aktif', 'length', 'max'=>50),
			array('kategori_obat_id, cara_pemakaian, usability, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama_obat, kategori_obat_id, bahan_aktif, cara_pemakaian, usability, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'nama_obat' => 'Nama Obat',
			'kategori_obat_id' => 'Kategori Obat',
			'bahan_aktif' => 'Bahan Aktif',
			'cara_pemakaian' => 'Cara Pemakaian',
			'usability' => 'Usability',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nama_obat',$this->nama_obat,true);
		$criteria->compare('kategori_obat_id',$this->kategori_obat_id,true);
		$criteria->compare('bahan_aktif',$this->bahan_aktif,true);
		$criteria->compare('cara_pemakaian',$this->cara_pemakaian,true);
		$criteria->compare('usability',$this->usability,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MObat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
