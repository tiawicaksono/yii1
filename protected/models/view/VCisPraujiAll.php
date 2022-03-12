<?php

/**
 * This is the model class for table "v_cis_prauji_all".
 *
 * The followings are the available columns in table 'v_cis_prauji_all':
 * @property integer $no_antrian
 * @property string $id_kendaraan
 * @property string $id_hasil_uji
 * @property string $id_daftar
 * @property boolean $prauji
 * @property boolean $cetak
 * @property string $no_kendaraan
 * @property string $no_uji
 * @property string $nama_pemilik
 * @property string $keterangan
 * @property string $id_jns_kend
 * @property string $merk
 * @property string $tahun
 * @property string $tipe
 * @property integer $antri
 * @property string $karoseri_jenis
 * @property string $bahan_bakar
 * @property string $nm_komersil
 * @property string $karoseri_bahan
 * @property string $konsumbu
 * @property string $img1
 * @property string $img2
 * @property string $jdatang
 * @property string $numerator
 */
class VCisPraujiAll extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_cis_prauji_all';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_antrian, antri', 'numerical', 'integerOnly'=>true),
			array('no_uji, karoseri_jenis, bahan_bakar, karoseri_bahan', 'length', 'max'=>30),
			array('keterangan', 'length', 'max'=>1000),
			array('nm_komersil', 'length', 'max'=>100),
			array('konsumbu', 'length', 'max'=>12),
			array('id_kendaraan, id_hasil_uji, id_daftar, prauji, cetak, no_kendaraan, nama_pemilik, id_jns_kend, merk, tahun, tipe, img1, img2, jdatang, numerator', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('no_antrian, id_kendaraan, id_hasil_uji, id_daftar, prauji, cetak, no_kendaraan, no_uji, nama_pemilik, keterangan, id_jns_kend, merk, tahun, tipe, antri, karoseri_jenis, bahan_bakar, nm_komersil, karoseri_bahan, konsumbu, img1, img2, jdatang, numerator', 'safe', 'on'=>'search'),
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
			'id_kendaraan' => 'Id Kendaraan',
			'id_hasil_uji' => 'Id Hasil Uji',
			'id_daftar' => 'Id Daftar',
			'prauji' => 'Prauji',
			'cetak' => 'Cetak',
			'no_kendaraan' => 'No Kendaraan',
			'no_uji' => 'No Uji',
			'nama_pemilik' => 'Nama Pemilik',
			'keterangan' => 'Keterangan',
			'id_jns_kend' => 'Id Jns Kend',
			'merk' => 'Merk',
			'tahun' => 'Tahun',
			'tipe' => 'Tipe',
			'antri' => 'Antri',
			'karoseri_jenis' => 'Karoseri Jenis',
			'bahan_bakar' => 'Bahan Bakar',
			'nm_komersil' => 'Nm Komersil',
			'karoseri_bahan' => 'Karoseri Bahan',
			'konsumbu' => 'Konsumbu',
			'img1' => 'Img1',
			'img2' => 'Img2',
			'jdatang' => 'Jdatang',
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

		$criteria->compare('no_antrian',$this->no_antrian);
		$criteria->compare('id_kendaraan',$this->id_kendaraan,true);
		$criteria->compare('id_hasil_uji',$this->id_hasil_uji,true);
		$criteria->compare('id_daftar',$this->id_daftar,true);
		$criteria->compare('prauji',$this->prauji);
		$criteria->compare('cetak',$this->cetak);
		$criteria->compare('no_kendaraan',$this->no_kendaraan,true);
		$criteria->compare('no_uji',$this->no_uji,true);
		$criteria->compare('nama_pemilik',$this->nama_pemilik,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('id_jns_kend',$this->id_jns_kend,true);
		$criteria->compare('merk',$this->merk,true);
		$criteria->compare('tahun',$this->tahun,true);
		$criteria->compare('tipe',$this->tipe,true);
		$criteria->compare('antri',$this->antri);
		$criteria->compare('karoseri_jenis',$this->karoseri_jenis,true);
		$criteria->compare('bahan_bakar',$this->bahan_bakar,true);
		$criteria->compare('nm_komersil',$this->nm_komersil,true);
		$criteria->compare('karoseri_bahan',$this->karoseri_bahan,true);
		$criteria->compare('konsumbu',$this->konsumbu,true);
		$criteria->compare('img1',$this->img1,true);
		$criteria->compare('img2',$this->img2,true);
		$criteria->compare('jdatang',$this->jdatang,true);
		$criteria->compare('numerator',$this->numerator,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VCisPraujiAll the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
