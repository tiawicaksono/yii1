<?php

/**
 * This is the model class for table "v_cis_emisi".
 *
 * The followings are the available columns in table 'v_cis_emisi':
 * @property string $no_antrian
 * @property string $stts_no
 * @property string $id_hasil_uji
 * @property string $id_daftar
 * @property boolean $prauji
 * @property boolean $cetak
 * @property string $no_kendaraan
 * @property string $no_uji
 * @property string $nama_pemilik
 * @property string $keterangan
 * @property string $merk
 * @property string $tahun
 * @property string $tipe
 * @property string $karoseri_jenis
 * @property string $bahan_bakar
 * @property string $nm_komersil
 */
class VCisEmisi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_cis_emisi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_uji, karoseri_jenis, bahan_bakar', 'length', 'max'=>30),
			array('keterangan', 'length', 'max'=>1000),
			array('nm_komersil', 'length', 'max'=>100),
			array('no_antrian, stts_no, id_hasil_uji, id_daftar, prauji, cetak, no_kendaraan, nama_pemilik, merk, tahun, tipe', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('no_antrian, stts_no, id_hasil_uji, id_daftar, prauji, cetak, no_kendaraan, no_uji, nama_pemilik, keterangan, merk, tahun, tipe, karoseri_jenis, bahan_bakar, nm_komersil', 'safe', 'on'=>'search'),
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
			'no_antrian' => 'No Antrian',
			'stts_no' => 'Stts No',
			'id_hasil_uji' => 'Id Hasil Uji',
			'id_daftar' => 'Id Daftar',
			'prauji' => 'Prauji',
			'cetak' => 'Cetak',
			'no_kendaraan' => 'No Kendaraan',
			'no_uji' => 'No Uji',
			'nama_pemilik' => 'Nama Pemilik',
			'keterangan' => 'Keterangan',
			'merk' => 'Merk',
			'tahun' => 'Tahun',
			'tipe' => 'Tipe',
			'karoseri_jenis' => 'Karoseri Jenis',
			'bahan_bakar' => 'Bahan Bakar',
			'nm_komersil' => 'Nm Komersil',
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

		$criteria->compare('no_antrian',$this->no_antrian,true);
		$criteria->compare('stts_no',$this->stts_no,true);
		$criteria->compare('id_hasil_uji',$this->id_hasil_uji,true);
		$criteria->compare('id_daftar',$this->id_daftar,true);
		$criteria->compare('prauji',$this->prauji);
		$criteria->compare('cetak',$this->cetak);
		$criteria->compare('no_kendaraan',$this->no_kendaraan,true);
		$criteria->compare('no_uji',$this->no_uji,true);
		$criteria->compare('nama_pemilik',$this->nama_pemilik,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('merk',$this->merk,true);
		$criteria->compare('tahun',$this->tahun,true);
		$criteria->compare('tipe',$this->tipe,true);
		$criteria->compare('karoseri_jenis',$this->karoseri_jenis,true);
		$criteria->compare('bahan_bakar',$this->bahan_bakar,true);
		$criteria->compare('nm_komersil',$this->nm_komersil,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VCisEmisi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
