<?php

/**
 * This is the model class for table "v_validasi".
 *
 * The followings are the available columns in table 'v_validasi':
 * @property string $nm_uji
 * @property string $no_uji
 * @property string $no_kendaraan
 * @property string $numerator
 * @property double $b_berkala
 * @property double $b_buku
 * @property double $b_tanda_lulus_uji
 * @property double $b_tlt_uji
 * @property double $total
 * @property double $b_jbb_lebih
 * @property double $b_jbb_kurang
 * @property double $b_tnd_samping
 * @property boolean $validasi
 * @property string $tglmati
 * @property string $tgl_retribusi
 * @property string $id_retribusi
 * @property string $jns_kend
 * @property string $bk_masuk
 * @property string $kemjbb
 * @property string $numerator_hari
 * @property string $id_kendaraan
 * @property string $id_uji
 * @property string $nama_pemilik
 * @property string $jenis
 * @property string $id_bk_masuk
 * @property string $alamat
 * @property string $tgl_uji
 * @property double $b_pertama
 * @property string $penerima
 * @property integer $lm_tlt
 * @property string $nm_komersil
 */
class VValidasi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_validasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lm_tlt', 'numerical', 'integerOnly'=>true),
			array('b_berkala, b_buku, b_tanda_lulus_uji, b_tlt_uji, total, b_jbb_lebih, b_jbb_kurang, b_tnd_samping, b_pertama', 'numerical'),
			array('nm_uji, penerima', 'length', 'max'=>50),
			array('no_uji, bk_masuk, kemjbb', 'length', 'max'=>30),
			array('jns_kend', 'length', 'max'=>40),
			array('nm_komersil', 'length', 'max'=>100),
			array('no_kendaraan, numerator, validasi, tglmati, tgl_retribusi, id_retribusi, numerator_hari, id_kendaraan, id_uji, nama_pemilik, jenis, id_bk_masuk, alamat, tgl_uji', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nm_uji, no_uji, no_kendaraan, numerator, b_berkala, b_buku, b_tanda_lulus_uji, b_tlt_uji, total, b_jbb_lebih, b_jbb_kurang, b_tnd_samping, validasi, tglmati, tgl_retribusi, id_retribusi, jns_kend, bk_masuk, kemjbb, numerator_hari, id_kendaraan, id_uji, nama_pemilik, jenis, id_bk_masuk, alamat, tgl_uji, b_pertama, penerima, lm_tlt, nm_komersil', 'safe', 'on'=>'search'),
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
			'nm_uji' => 'Nm Uji',
			'no_uji' => 'No Uji',
			'no_kendaraan' => 'No Kendaraan',
			'numerator' => 'Numerator',
			'b_berkala' => 'B Berkala',
			'b_buku' => 'B Buku',
			'b_tanda_lulus_uji' => 'B Tanda Lulus Uji',
			'b_tlt_uji' => 'B Tlt Uji',
			'total' => 'Total',
			'b_jbb_lebih' => 'B Jbb Lebih',
			'b_jbb_kurang' => 'B Jbb Kurang',
			'b_tnd_samping' => 'B Tnd Samping',
			'validasi' => 'Validasi',
			'tglmati' => 'Tglmati',
			'tgl_retribusi' => 'Tgl Retribusi',
			'id_retribusi' => 'Id Retribusi',
			'jns_kend' => 'Jns Kend',
			'bk_masuk' => 'Bk Masuk',
			'kemjbb' => 'Kemjbb',
			'numerator_hari' => 'Numerator Hari',
			'id_kendaraan' => 'Id Kendaraan',
			'id_uji' => 'Id Uji',
			'nama_pemilik' => 'Nama Pemilik',
			'jenis' => 'Jenis',
			'id_bk_masuk' => 'Id Bk Masuk',
			'alamat' => 'Alamat',
			'tgl_uji' => 'Tgl Uji',
			'b_pertama' => 'B Pertama',
			'penerima' => 'Penerima',
			'lm_tlt' => 'Lm Tlt',
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

		$criteria->compare('nm_uji',$this->nm_uji,true);
		$criteria->compare('no_uji',$this->no_uji,true);
		$criteria->compare('no_kendaraan',$this->no_kendaraan,true);
		$criteria->compare('numerator',$this->numerator,true);
		$criteria->compare('b_berkala',$this->b_berkala);
		$criteria->compare('b_buku',$this->b_buku);
		$criteria->compare('b_tanda_lulus_uji',$this->b_tanda_lulus_uji);
		$criteria->compare('b_tlt_uji',$this->b_tlt_uji);
		$criteria->compare('total',$this->total);
		$criteria->compare('b_jbb_lebih',$this->b_jbb_lebih);
		$criteria->compare('b_jbb_kurang',$this->b_jbb_kurang);
		$criteria->compare('b_tnd_samping',$this->b_tnd_samping);
		$criteria->compare('validasi',$this->validasi);
		$criteria->compare('tglmati',$this->tglmati,true);
		$criteria->compare('tgl_retribusi',$this->tgl_retribusi,true);
		$criteria->compare('id_retribusi',$this->id_retribusi,true);
		$criteria->compare('jns_kend',$this->jns_kend,true);
		$criteria->compare('bk_masuk',$this->bk_masuk,true);
		$criteria->compare('kemjbb',$this->kemjbb,true);
		$criteria->compare('numerator_hari',$this->numerator_hari,true);
		$criteria->compare('id_kendaraan',$this->id_kendaraan,true);
		$criteria->compare('id_uji',$this->id_uji,true);
		$criteria->compare('nama_pemilik',$this->nama_pemilik,true);
		$criteria->compare('jenis',$this->jenis,true);
		$criteria->compare('id_bk_masuk',$this->id_bk_masuk,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('tgl_uji',$this->tgl_uji,true);
		$criteria->compare('b_pertama',$this->b_pertama);
		$criteria->compare('penerima',$this->penerima,true);
		$criteria->compare('lm_tlt',$this->lm_tlt);
		$criteria->compare('nm_komersil',$this->nm_komersil,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VValidasi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
