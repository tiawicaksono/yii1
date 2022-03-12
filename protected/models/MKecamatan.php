<?php

/**
 * This is the model class for table "m_kecamatan".
 *
 * The followings are the available columns in table 'm_kecamatan':
 * @property string $id_kecamatan
 * @property string $id_kota
 * @property string $nama
 * @property string $created_at
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property MKota $idKota
 * @property MKelurahan[] $mKelurahans
 */
class MKecamatan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_kecamatan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kecamatan, id_kota, nama', 'required'),
			array('id_kecamatan', 'length', 'max'=>7),
			array('id_kota', 'length', 'max'=>4),
			array('nama', 'length', 'max'=>255),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kecamatan, id_kota, nama, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'idKota' => array(self::BELONGS_TO, 'MKota', 'id_kota'),
			'mKelurahans' => array(self::HAS_MANY, 'MKelurahan', 'id_kecamatan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kecamatan' => 'Id Kecamatan',
			'id_kota' => 'Id Kota',
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

		$criteria->compare('id_kecamatan',$this->id_kecamatan,true);
		$criteria->compare('id_kota',$this->id_kota,true);
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
	 * @return MKecamatan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
