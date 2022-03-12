<?php

/**
 * This is the model class for table "v_validasi".
 *
 * The followings are the available columns in table 'v_validasi':
 * @property string $nm_uji
 * @property string $no_uji
 * @property string $no_kendaraan
 * @property string $numerator
 * @property double $b_uji_kecil
 * @property double $b_uji_besar
 * @property double $b_denda_kecil
 * @property double $b_denda_besar
 * @property double $b_rekom_mutasi
 * @property double $b_rekom_nu
 * @property double $b_rekom_ubah
 * @property double $b_buku_rusak
 * @property double $b_buku_hilang
 * @property double $total
 * @property integer $lama_tlt
 * @property boolean $validasi
 * @property string $tglmati
 * @property string $tgl_retribusi
 * @property string $id_retribusi
 * @property string $jns_kend
 * @property string $penerima
 * @property string $nama_pemilik
 * @property string $ptgs_valid
 * @property string $tgl_uji
 * @property string $alamat
 * @property string $jenis
 * @property string $id_uji
 * @property string $id_kendaraan
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
			array('lama_tlt', 'numerical', 'integerOnly'=>true),
			array('b_uji_kecil, b_uji_besar, b_denda_kecil, b_denda_besar, b_rekom_mutasi, b_rekom_nu, b_rekom_ubah, b_buku_rusak, b_buku_hilang, total', 'numerical'),
			array('nm_uji, penerima', 'length', 'max'=>50),
			array('no_uji', 'length', 'max'=>30),
			array('jns_kend', 'length', 'max'=>40),
			array('ptgs_valid', 'length', 'max'=>20),
			array('no_kendaraan, numerator, validasi, tglmati, tgl_retribusi, id_retribusi, nama_pemilik, tgl_uji, alamat, jenis, id_uji, id_kendaraan', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nm_uji, no_uji, no_kendaraan, numerator, b_uji_kecil, b_uji_besar, b_denda_kecil, b_denda_besar, b_rekom_mutasi, b_rekom_nu, b_rekom_ubah, b_buku_rusak, b_buku_hilang, total, lama_tlt, validasi, tglmati, tgl_retribusi, id_retribusi, jns_kend, penerima, nama_pemilik, ptgs_valid, tgl_uji, alamat, jenis, id_uji, id_kendaraan', 'safe', 'on'=>'search'),
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
			'b_uji_kecil' => 'B Uji Kecil',
			'b_uji_besar' => 'B Uji Besar',
			'b_denda_kecil' => 'B Denda Kecil',
			'b_denda_besar' => 'B Denda Besar',
			'b_rekom_mutasi' => 'B Rekom Mutasi',
			'b_rekom_nu' => 'B Rekom Nu',
			'b_rekom_ubah' => 'B Rekom Ubah',
			'b_buku_rusak' => 'B Buku Rusak',
			'b_buku_hilang' => 'B Buku Hilang',
			'total' => 'Total',
			'lama_tlt' => 'Lama Tlt',
			'validasi' => 'Validasi',
			'tglmati' => 'Tglmati',
			'tgl_retribusi' => 'Tgl Retribusi',
			'id_retribusi' => 'Id Retribusi',
			'jns_kend' => 'Jns Kend',
			'penerima' => 'Penerima',
			'nama_pemilik' => 'Nama Pemilik',
			'ptgs_valid' => 'Ptgs Valid',
			'tgl_uji' => 'Tgl Uji',
			'alamat' => 'Alamat',
			'jenis' => 'Jenis',
			'id_uji' => 'Id Uji',
			'id_kendaraan' => 'Id Kendaraan',
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
		$criteria->compare('b_uji_kecil',$this->b_uji_kecil);
		$criteria->compare('b_uji_besar',$this->b_uji_besar);
		$criteria->compare('b_denda_kecil',$this->b_denda_kecil);
		$criteria->compare('b_denda_besar',$this->b_denda_besar);
		$criteria->compare('b_rekom_mutasi',$this->b_rekom_mutasi);
		$criteria->compare('b_rekom_nu',$this->b_rekom_nu);
		$criteria->compare('b_rekom_ubah',$this->b_rekom_ubah);
		$criteria->compare('b_buku_rusak',$this->b_buku_rusak);
		$criteria->compare('b_buku_hilang',$this->b_buku_hilang);
		$criteria->compare('total',$this->total);
		$criteria->compare('lama_tlt',$this->lama_tlt);
		$criteria->compare('validasi',$this->validasi);
		$criteria->compare('tglmati',$this->tglmati,true);
		$criteria->compare('tgl_retribusi',$this->tgl_retribusi,true);
		$criteria->compare('id_retribusi',$this->id_retribusi,true);
		$criteria->compare('jns_kend',$this->jns_kend,true);
		$criteria->compare('penerima',$this->penerima,true);
		$criteria->compare('nama_pemilik',$this->nama_pemilik,true);
		$criteria->compare('ptgs_valid',$this->ptgs_valid,true);
		$criteria->compare('tgl_uji',$this->tgl_uji,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('jenis',$this->jenis,true);
		$criteria->compare('id_uji',$this->id_uji,true);
		$criteria->compare('id_kendaraan',$this->id_kendaraan,true);

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
