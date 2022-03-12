<?php

/**
 * This is the model class for table "m_kota".
 *
 * The followings are the available columns in table 'm_kota':
 * @property string $id_kota
 * @property string $id_provinsi
 * @property string $nama
 * @property string $created_at
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property MProvinsi $idProvinsi
 * @property MKecamatan[] $mKecamatans
 */
class MKota extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_kota';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kota, id_provinsi, nama', 'required'),
			array('id_kota', 'length', 'max'=>4),
			array('id_provinsi', 'length', 'max'=>2),
			array('nama', 'length', 'max'=>255),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kota, id_provinsi, nama, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'idProvinsi' => array(self::BELONGS_TO, 'MProvinsi', 'id_provinsi'),
			'mKecamatans' => array(self::HAS_MANY, 'MKecamatan', 'id_kota'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kota' => 'Id Kota',
			'id_provinsi' => 'Id Provinsi',
			'nama' => 'Nama',
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

		$criteria->compare('id_kota',$this->id_kota,true);
		$criteria->compare('id_provinsi',$this->id_provinsi,true);
		$criteria->compare('nama',$this->nama,true);
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
	 * @return MKota the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
