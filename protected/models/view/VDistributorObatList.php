<?php

/**
 * This is the model class for table "v_distributor_obat_list".
 *
 * The followings are the available columns in table 'v_distributor_obat_list':
 * @property string $id
 * @property string $ditributor_id
 * @property string $obat_id
 * @property string $kategori_id
 * @property string $nama_distributor
 * @property string $alamat
 * @property string $telp
 * @property string $hp
 * @property string $nama_obat
 * @property string $bahan_aktif
 * @property string $cara_pemakaian
 * @property string $usability
 * @property string $nama_kaktegori
 */
class VDistributorObatList extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_distributor_obat_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_distributor, bahan_aktif, nama_kaktegori', 'length', 'max'=>50),
			array('telp, hp', 'length', 'max'=>255),
			array('nama_obat', 'length', 'max'=>100),
			array('id, ditributor_id, obat_id, kategori_id, alamat, cara_pemakaian, usability', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ditributor_id, obat_id, kategori_id, nama_distributor, alamat, telp, hp, nama_obat, bahan_aktif, cara_pemakaian, usability, nama_kaktegori', 'safe', 'on'=>'search'),
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
			'ditributor_id' => 'Ditributor',
			'obat_id' => 'Obat',
			'kategori_id' => 'Kategori',
			'nama_distributor' => 'Nama Distributor',
			'alamat' => 'Alamat',
			'telp' => 'Telp',
			'hp' => 'Hp',
			'nama_obat' => 'Nama Obat',
			'bahan_aktif' => 'Bahan Aktif',
			'cara_pemakaian' => 'Cara Pemakaian',
			'usability' => 'Usability',
			'nama_kaktegori' => 'Nama Kaktegori',
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
		$criteria->compare('ditributor_id',$this->ditributor_id,true);
		$criteria->compare('obat_id',$this->obat_id,true);
		$criteria->compare('kategori_id',$this->kategori_id,true);
		$criteria->compare('nama_distributor',$this->nama_distributor,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('telp',$this->telp,true);
		$criteria->compare('hp',$this->hp,true);
		$criteria->compare('nama_obat',$this->nama_obat,true);
		$criteria->compare('bahan_aktif',$this->bahan_aktif,true);
		$criteria->compare('cara_pemakaian',$this->cara_pemakaian,true);
		$criteria->compare('usability',$this->usability,true);
		$criteria->compare('nama_kaktegori',$this->nama_kaktegori,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VDistributorObatList the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
