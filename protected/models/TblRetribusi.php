<?php

/**
 * This is the model class for table "tbl_retribusi".
 *
 * The followings are the available columns in table 'tbl_retribusi':
 * @property string $id_retribusi
 * @property string $id_kendaraan
 * @property string $tgl_retribusi
 * @property string $penerima
 * @property string $numerator
 * @property string $id_bk_masuk
 * @property string $id_uji
 * @property string $nampeng
 * @property boolean $validasi
 * @property string $tglmati
 * @property integer $id_jns
 * @property string $stts_syarat
 * @property string $no_berkas
 * @property boolean $dikuasakan
 * @property string $idnoktp
 * @property string $stts_kuasa
 * @property string $kepada
 * @property string $tgl_uji
 * @property integer $lm_tlt
 * @property boolean $langsung
 * @property string $numerator_hari
 * @property string $petugas_validasi
 * @property double $b_jbb_kurang
 * @property double $b_jbb_lebih
 * @property double $b_denda_kurang
 * @property double $b_denda_lebih
 * @property double $b_buku
 * @property double $b_buku_hilang
 * @property double $b_buku_rusak
 * @property double $b_plat_uji
 * @property double $b_tanda_uji
 * @property double $b_rekom
 * @property string $wilayah_asal_kode
 * @property double $b_denda
 * @property double $b_gandengan_tempelan
 * @property integer $virtual_account
 * @property string $qr_value
 * @property double $b_retribusi_lebih
 */
class TblRetribusi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_retribusi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_jns, lm_tlt, virtual_account', 'numerical', 'integerOnly'=>true),
			array('b_jbb_kurang, b_jbb_lebih, b_denda_kurang, b_denda_lebih, b_buku, b_buku_hilang, b_buku_rusak, b_plat_uji, b_tanda_uji, b_rekom, b_denda, b_gandengan_tempelan, b_retribusi_lebih', 'numerical'),
			array('penerima', 'length', 'max'=>50),
			array('nampeng', 'length', 'max'=>100),
			array('kepada', 'length', 'max'=>30),
			array('petugas_validasi, wilayah_asal_kode', 'length', 'max'=>20),
			array('id_kendaraan, tgl_retribusi, numerator, id_bk_masuk, id_uji, validasi, tglmati, stts_syarat, no_berkas, dikuasakan, idnoktp, stts_kuasa, tgl_uji, langsung, numerator_hari, qr_value', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_retribusi, id_kendaraan, tgl_retribusi, penerima, numerator, id_bk_masuk, id_uji, nampeng, validasi, tglmati, id_jns, stts_syarat, no_berkas, dikuasakan, idnoktp, stts_kuasa, kepada, tgl_uji, lm_tlt, langsung, numerator_hari, petugas_validasi, b_jbb_kurang, b_jbb_lebih, b_denda_kurang, b_denda_lebih, b_buku, b_buku_hilang, b_buku_rusak, b_plat_uji, b_tanda_uji, b_rekom, wilayah_asal_kode, b_denda, b_gandengan_tempelan, virtual_account, qr_value, b_retribusi_lebih', 'safe', 'on'=>'search'),
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
			'id_retribusi' => 'Id Retribusi',
			'id_kendaraan' => 'Id Kendaraan',
			'tgl_retribusi' => 'Tgl Retribusi',
			'penerima' => 'Penerima',
			'numerator' => 'Numerator',
			'id_bk_masuk' => 'Id Bk Masuk',
			'id_uji' => 'Id Uji',
			'nampeng' => 'Nampeng',
			'validasi' => 'Validasi',
			'tglmati' => 'Tglmati',
			'id_jns' => 'Id Jns',
			'stts_syarat' => 'Stts Syarat',
			'no_berkas' => 'No Berkas',
			'dikuasakan' => 'Dikuasakan',
			'idnoktp' => 'Idnoktp',
			'stts_kuasa' => 'Stts Kuasa',
			'kepada' => 'Kepada',
			'tgl_uji' => 'Tgl Uji',
			'lm_tlt' => 'Lm Tlt',
			'langsung' => 'Langsung',
			'numerator_hari' => 'Numerator Hari',
			'petugas_validasi' => 'Petugas Validasi',
			'b_jbb_kurang' => 'B Jbb Kurang',
			'b_jbb_lebih' => 'B Jbb Lebih',
			'b_denda_kurang' => 'B Denda Kurang',
			'b_denda_lebih' => 'B Denda Lebih',
			'b_buku' => 'B Buku',
			'b_buku_hilang' => 'B Buku Hilang',
			'b_buku_rusak' => 'B Buku Rusak',
			'b_plat_uji' => 'B Plat Uji',
			'b_tanda_uji' => 'B Tanda Uji',
			'b_rekom' => 'B Rekom',
			'wilayah_asal_kode' => 'Wilayah Asal Kode',
			'b_denda' => 'B Denda',
			'b_gandengan_tempelan' => 'B Gandengan Tempelan',
			'virtual_account' => 'Virtual Account',
			'qr_value' => 'Qr Value',
			'b_retribusi_lebih' => 'B Retribusi Lebih',
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

		$criteria->compare('id_retribusi',$this->id_retribusi,true);
		$criteria->compare('id_kendaraan',$this->id_kendaraan,true);
		$criteria->compare('tgl_retribusi',$this->tgl_retribusi,true);
		$criteria->compare('penerima',$this->penerima,true);
		$criteria->compare('numerator',$this->numerator,true);
		$criteria->compare('id_bk_masuk',$this->id_bk_masuk,true);
		$criteria->compare('id_uji',$this->id_uji,true);
		$criteria->compare('nampeng',$this->nampeng,true);
		$criteria->compare('validasi',$this->validasi);
		$criteria->compare('tglmati',$this->tglmati,true);
		$criteria->compare('id_jns',$this->id_jns);
		$criteria->compare('stts_syarat',$this->stts_syarat,true);
		$criteria->compare('no_berkas',$this->no_berkas,true);
		$criteria->compare('dikuasakan',$this->dikuasakan);
		$criteria->compare('idnoktp',$this->idnoktp,true);
		$criteria->compare('stts_kuasa',$this->stts_kuasa,true);
		$criteria->compare('kepada',$this->kepada,true);
		$criteria->compare('tgl_uji',$this->tgl_uji,true);
		$criteria->compare('lm_tlt',$this->lm_tlt);
		$criteria->compare('langsung',$this->langsung);
		$criteria->compare('numerator_hari',$this->numerator_hari,true);
		$criteria->compare('petugas_validasi',$this->petugas_validasi,true);
		$criteria->compare('b_jbb_kurang',$this->b_jbb_kurang);
		$criteria->compare('b_jbb_lebih',$this->b_jbb_lebih);
		$criteria->compare('b_denda_kurang',$this->b_denda_kurang);
		$criteria->compare('b_denda_lebih',$this->b_denda_lebih);
		$criteria->compare('b_buku',$this->b_buku);
		$criteria->compare('b_buku_hilang',$this->b_buku_hilang);
		$criteria->compare('b_buku_rusak',$this->b_buku_rusak);
		$criteria->compare('b_plat_uji',$this->b_plat_uji);
		$criteria->compare('b_tanda_uji',$this->b_tanda_uji);
		$criteria->compare('b_rekom',$this->b_rekom);
		$criteria->compare('wilayah_asal_kode',$this->wilayah_asal_kode,true);
		$criteria->compare('b_denda',$this->b_denda);
		$criteria->compare('b_gandengan_tempelan',$this->b_gandengan_tempelan);
		$criteria->compare('virtual_account',$this->virtual_account);
		$criteria->compare('qr_value',$this->qr_value,true);
		$criteria->compare('b_retribusi_lebih',$this->b_retribusi_lebih);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblRetribusi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
