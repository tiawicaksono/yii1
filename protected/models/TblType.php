<?php

/**
 * This is the model class for table "tbl_type".
 *
 * The followings are the available columns in table 'tbl_type':
 * @property string $warna
 * @property string $isi_silinder
 * @property string $daya_motor
 * @property string $bahan_bakar
 * @property string $ukuran_panjang
 * @property string $ukuran_lebar
 * @property string $ukuran_tinggi
 * @property string $bagian_belakang
 * @property string $bagian_depan
 * @property string $bagian_jterendah
 * @property string $karoseri_jenis
 * @property string $karoseri_bahan
 * @property string $karoseri_duduk
 * @property string $karoseri_berdiri
 * @property string $jsumbu1
 * @property string $jsumbu2
 * @property string $jsumbu3
 * @property string $jsumbu4
 * @property string $bsumbu1
 * @property string $bsumbu2
 * @property string $bsumbu3
 * @property string $bsumbu4
 * @property string $bsumbu5
 * @property string $psumbu1
 * @property string $psumbu2
 * @property string $psumbu4
 * @property string $psumbu5
 * @property string $psumbu3
 * @property string $dimpanjang
 * @property string $dimlebar
 * @property string $dimtinggi
 * @property string $kemjbb
 * @property string $kemjbkb
 * @property string $kemorang
 * @property string $kembarang
 * @property string $kls_jln
 * @property string $id_kendaraan
 * @property string $nm_type
 * @property string $id_nm_komersil
 * @property string $ukp
 * @property string $ukq
 * @property string $id_merk
 * @property string $nm_komersil
 * @property string $ukp2
 * @property string $konsumbu
 * @property string $mst
 * @property string $dydukpab1
 * @property string $dydukpab2
 * @property string $dydukpab3
 * @property string $dydukpab4
 * @property string $dydukpab5
 * @property string $warna_bak
 * @property string $guna_khusus
 * @property string $nm_karoseri
 */
class TblType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('warna, isi_silinder, daya_motor, bahan_bakar, ukuran_panjang, ukuran_lebar, ukuran_tinggi, bagian_belakang, bagian_depan, bagian_jterendah, karoseri_jenis, karoseri_bahan, karoseri_duduk, karoseri_berdiri, jsumbu1, jsumbu2, jsumbu3, jsumbu4, bsumbu1, bsumbu2, bsumbu3, bsumbu4, bsumbu5, psumbu1, psumbu2, psumbu4, psumbu5, psumbu3, dimpanjang, dimlebar, dimtinggi, kemjbb, kemjbkb, kemorang, kembarang, kls_jln, ukp, ukq, ukp2, mst, dydukpab1, dydukpab2, dydukpab3, dydukpab4, dydukpab5', 'length', 'max'=>30),
			array('nm_type, nm_komersil, warna_bak, guna_khusus', 'length', 'max'=>100),
			array('konsumbu', 'length', 'max'=>12),
			array('nm_karoseri', 'length', 'max'=>200),
			array('id_kendaraan, id_nm_komersil, id_merk', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('warna, isi_silinder, daya_motor, bahan_bakar, ukuran_panjang, ukuran_lebar, ukuran_tinggi, bagian_belakang, bagian_depan, bagian_jterendah, karoseri_jenis, karoseri_bahan, karoseri_duduk, karoseri_berdiri, jsumbu1, jsumbu2, jsumbu3, jsumbu4, bsumbu1, bsumbu2, bsumbu3, bsumbu4, bsumbu5, psumbu1, psumbu2, psumbu4, psumbu5, psumbu3, dimpanjang, dimlebar, dimtinggi, kemjbb, kemjbkb, kemorang, kembarang, kls_jln, id_kendaraan, nm_type, id_nm_komersil, ukp, ukq, id_merk, nm_komersil, ukp2, konsumbu, mst, dydukpab1, dydukpab2, dydukpab3, dydukpab4, dydukpab5, warna_bak, guna_khusus, nm_karoseri', 'safe', 'on'=>'search'),
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
			'warna' => 'Warna',
			'isi_silinder' => 'Isi Silinder',
			'daya_motor' => 'Daya Motor',
			'bahan_bakar' => 'Bahan Bakar',
			'ukuran_panjang' => 'Ukuran Panjang',
			'ukuran_lebar' => 'Ukuran Lebar',
			'ukuran_tinggi' => 'Ukuran Tinggi',
			'bagian_belakang' => 'Bagian Belakang',
			'bagian_depan' => 'Bagian Depan',
			'bagian_jterendah' => 'Bagian Jterendah',
			'karoseri_jenis' => 'Karoseri Jenis',
			'karoseri_bahan' => 'Karoseri Bahan',
			'karoseri_duduk' => 'Karoseri Duduk',
			'karoseri_berdiri' => 'Karoseri Berdiri',
			'jsumbu1' => 'Jsumbu1',
			'jsumbu2' => 'Jsumbu2',
			'jsumbu3' => 'Jsumbu3',
			'jsumbu4' => 'Jsumbu4',
			'bsumbu1' => 'Bsumbu1',
			'bsumbu2' => 'Bsumbu2',
			'bsumbu3' => 'Bsumbu3',
			'bsumbu4' => 'Bsumbu4',
			'bsumbu5' => 'Bsumbu5',
			'psumbu1' => 'Psumbu1',
			'psumbu2' => 'Psumbu2',
			'psumbu4' => 'Psumbu4',
			'psumbu5' => 'Psumbu5',
			'psumbu3' => 'Psumbu3',
			'dimpanjang' => 'Dimpanjang',
			'dimlebar' => 'Dimlebar',
			'dimtinggi' => 'Dimtinggi',
			'kemjbb' => 'Kemjbb',
			'kemjbkb' => 'Kemjbkb',
			'kemorang' => 'Kemorang',
			'kembarang' => 'Kembarang',
			'kls_jln' => 'Kls Jln',
			'id_kendaraan' => 'Id Kendaraan',
			'nm_type' => 'Nm Type',
			'id_nm_komersil' => 'Id Nm Komersil',
			'ukp' => 'Ukp',
			'ukq' => 'Ukq',
			'id_merk' => 'Id Merk',
			'nm_komersil' => 'Nm Komersil',
			'ukp2' => 'Ukp2',
			'konsumbu' => 'Konsumbu',
			'mst' => 'Mst',
			'dydukpab1' => 'Dydukpab1',
			'dydukpab2' => 'Dydukpab2',
			'dydukpab3' => 'Dydukpab3',
			'dydukpab4' => 'Dydukpab4',
			'dydukpab5' => 'Dydukpab5',
			'warna_bak' => 'Warna Bak',
			'guna_khusus' => 'Guna Khusus',
			'nm_karoseri' => 'Nm Karoseri',
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

		$criteria->compare('warna',$this->warna,true);
		$criteria->compare('isi_silinder',$this->isi_silinder,true);
		$criteria->compare('daya_motor',$this->daya_motor,true);
		$criteria->compare('bahan_bakar',$this->bahan_bakar,true);
		$criteria->compare('ukuran_panjang',$this->ukuran_panjang,true);
		$criteria->compare('ukuran_lebar',$this->ukuran_lebar,true);
		$criteria->compare('ukuran_tinggi',$this->ukuran_tinggi,true);
		$criteria->compare('bagian_belakang',$this->bagian_belakang,true);
		$criteria->compare('bagian_depan',$this->bagian_depan,true);
		$criteria->compare('bagian_jterendah',$this->bagian_jterendah,true);
		$criteria->compare('karoseri_jenis',$this->karoseri_jenis,true);
		$criteria->compare('karoseri_bahan',$this->karoseri_bahan,true);
		$criteria->compare('karoseri_duduk',$this->karoseri_duduk,true);
		$criteria->compare('karoseri_berdiri',$this->karoseri_berdiri,true);
		$criteria->compare('jsumbu1',$this->jsumbu1,true);
		$criteria->compare('jsumbu2',$this->jsumbu2,true);
		$criteria->compare('jsumbu3',$this->jsumbu3,true);
		$criteria->compare('jsumbu4',$this->jsumbu4,true);
		$criteria->compare('bsumbu1',$this->bsumbu1,true);
		$criteria->compare('bsumbu2',$this->bsumbu2,true);
		$criteria->compare('bsumbu3',$this->bsumbu3,true);
		$criteria->compare('bsumbu4',$this->bsumbu4,true);
		$criteria->compare('bsumbu5',$this->bsumbu5,true);
		$criteria->compare('psumbu1',$this->psumbu1,true);
		$criteria->compare('psumbu2',$this->psumbu2,true);
		$criteria->compare('psumbu4',$this->psumbu4,true);
		$criteria->compare('psumbu5',$this->psumbu5,true);
		$criteria->compare('psumbu3',$this->psumbu3,true);
		$criteria->compare('dimpanjang',$this->dimpanjang,true);
		$criteria->compare('dimlebar',$this->dimlebar,true);
		$criteria->compare('dimtinggi',$this->dimtinggi,true);
		$criteria->compare('kemjbb',$this->kemjbb,true);
		$criteria->compare('kemjbkb',$this->kemjbkb,true);
		$criteria->compare('kemorang',$this->kemorang,true);
		$criteria->compare('kembarang',$this->kembarang,true);
		$criteria->compare('kls_jln',$this->kls_jln,true);
		$criteria->compare('id_kendaraan',$this->id_kendaraan,true);
		$criteria->compare('nm_type',$this->nm_type,true);
		$criteria->compare('id_nm_komersil',$this->id_nm_komersil,true);
		$criteria->compare('ukp',$this->ukp,true);
		$criteria->compare('ukq',$this->ukq,true);
		$criteria->compare('id_merk',$this->id_merk,true);
		$criteria->compare('nm_komersil',$this->nm_komersil,true);
		$criteria->compare('ukp2',$this->ukp2,true);
		$criteria->compare('konsumbu',$this->konsumbu,true);
		$criteria->compare('mst',$this->mst,true);
		$criteria->compare('dydukpab1',$this->dydukpab1,true);
		$criteria->compare('dydukpab2',$this->dydukpab2,true);
		$criteria->compare('dydukpab3',$this->dydukpab3,true);
		$criteria->compare('dydukpab4',$this->dydukpab4,true);
		$criteria->compare('dydukpab5',$this->dydukpab5,true);
		$criteria->compare('warna_bak',$this->warna_bak,true);
		$criteria->compare('guna_khusus',$this->guna_khusus,true);
		$criteria->compare('nm_karoseri',$this->nm_karoseri,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
