<?php

/**
 * This is the model class for table "v_not_lulus".
 *
 * The followings are the available columns in table 'v_not_lulus':
 * @property string $id_hasil_uji
 * @property string $no_uji
 * @property string $no_kendaraan
 * @property string $nama_pemilik
 * @property string $nm_penguji
 * @property string $no_antrian
 * @property string $id_daftar
 * @property boolean $lulus
 * @property string $tgl_uji
 */
class VNotLulus extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_not_lulus';
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
			array('no_kendaraan', 'length', 'max'=>12),
			array('nama_pemilik', 'length', 'max'=>100),
			array('nm_penguji', 'length', 'max'=>50),
			array('id_hasil_uji, no_antrian, id_daftar, lulus, tgl_uji', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_hasil_uji, no_uji, no_kendaraan, nama_pemilik, nm_penguji, no_antrian, id_daftar, lulus, tgl_uji', 'safe', 'on'=>'search'),
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
			'id_hasil_uji' => 'Id Hasil Uji',
			'no_uji' => 'No Uji',
			'no_kendaraan' => 'No Kendaraan',
			'nama_pemilik' => 'Nama Pemilik',
			'nm_penguji' => 'Nm Penguji',
			'no_antrian' => 'No Antrian',
			'id_daftar' => 'Id Daftar',
			'lulus' => 'Lulus',
			'tgl_uji' => 'Tgl Uji',
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

		$criteria->compare('id_hasil_uji',$this->id_hasil_uji,true);
		$criteria->compare('no_uji',$this->no_uji,true);
		$criteria->compare('no_kendaraan',$this->no_kendaraan,true);
		$criteria->compare('nama_pemilik',$this->nama_pemilik,true);
		$criteria->compare('nm_penguji',$this->nm_penguji,true);
		$criteria->compare('no_antrian',$this->no_antrian,true);
		$criteria->compare('id_daftar',$this->id_daftar,true);
		$criteria->compare('lulus',$this->lulus);
		$criteria->compare('tgl_uji',$this->tgl_uji,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VNotLulus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
