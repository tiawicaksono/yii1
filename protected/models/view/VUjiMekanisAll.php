<?php

/**
 * This is the model class for table "v_uji_mekanis_all".
 *
 * The followings are the available columns in table 'v_uji_mekanis_all':
 * @property double $ktlamp_kanan
 * @property double $ktlamp_kiri
 * @property double $dev_kanan
 * @property double $dev_kiri
 * @property double $selrem_sb1
 * @property double $selrem_sb2
 * @property double $selrem_sb3
 * @property double $selrem_sb4
 * @property double $selgaya
 * @property double $selkirikanan
 * @property double $ems_diesel
 * @property double $ems_mesin_co
 * @property double $ems_mesin_hc
 * @property string $nm_penguji
 * @property string $id_hasil_uji
 * @property boolean $lulus_prauji
 * @property string $no_uji
 * @property string $no_kendaraan
 * @property string $nama_pemilik
 * @property string $alamat
 * @property string $tahun
 * @property string $jns_kend
 * @property string $bsumbu1
 * @property string $bsumbu2
 * @property string $bsumbu3
 * @property string $bsumbu4
 * @property string $konsumbu
 * @property string $bahan_bakar
 * @property string $tipe
 * @property integer $id_uji
 * @property string $id_daftar
 * @property integer $alat
 * @property double $selgaya3
 * @property double $selgaya4
 * @property integer $no_antrian
 * @property string $numerator
 * @property string $jdatang
 */
class VUjiMekanisAll extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_uji_mekanis_all';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_uji, alat, no_antrian', 'numerical', 'integerOnly'=>true),
			array('ktlamp_kanan, ktlamp_kiri, dev_kanan, dev_kiri, selrem_sb1, selrem_sb2, selrem_sb3, selrem_sb4, selgaya1, selgaya2, ems_diesel, ems_mesin_co, ems_mesin_hc, selgaya3, selgaya4', 'numerical'),
			array('nm_penguji', 'length', 'max'=>50),
			array('no_uji, bsumbu1, bsumbu2, bsumbu3, bsumbu4, bahan_bakar', 'length', 'max'=>30),
			array('jns_kend', 'length', 'max'=>40),
			array('konsumbu', 'length', 'max'=>12),
			array('id_hasil_uji, lulus_prauji, no_kendaraan, nama_pemilik, alamat, tahun, tipe, id_daftar, numerator, jdatang', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ktlamp_kanan, ktlamp_kiri, dev_kanan, dev_kiri, selrem_sb1, selrem_sb2, selrem_sb3, selrem_sb4, selgaya1, selgaya2, ems_diesel, ems_mesin_co, ems_mesin_hc, nm_penguji, id_hasil_uji, lulus_prauji, no_uji, no_kendaraan, nama_pemilik, alamat, tahun, jns_kend, bsumbu1, bsumbu2, bsumbu3, bsumbu4, konsumbu, bahan_bakar, tipe, id_uji, id_daftar, alat, selgaya3, selgaya4, no_antrian, numerator, jdatang', 'safe', 'on'=>'search'),
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
			'ktlamp_kanan' => 'Ktlamp Kanan',
			'ktlamp_kiri' => 'Ktlamp Kiri',
			'dev_kanan' => 'Dev Kanan',
			'dev_kiri' => 'Dev Kiri',
			'selrem_sb1' => 'Selrem Sb1',
			'selrem_sb2' => 'Selrem Sb2',
			'selrem_sb3' => 'Selrem Sb3',
			'selrem_sb4' => 'Selrem Sb4',
			'selgaya' => 'Selgaya 1',
			'selkirikanan' => 'Selgaya 2',
			'ems_diesel' => 'Ems Diesel',
			'ems_mesin_co' => 'Ems Mesin Co',
			'ems_mesin_hc' => 'Ems Mesin Hc',
			'nm_penguji' => 'Nm Penguji',
			'id_hasil_uji' => 'Id Hasil Uji',
			'lulus_prauji' => 'Lulus Prauji',
			'no_uji' => 'No Uji',
			'no_kendaraan' => 'No Kendaraan',
			'nama_pemilik' => 'Nama Pemilik',
			'alamat' => 'Alamat',
			'tahun' => 'Tahun',
			'jns_kend' => 'Jns Kend',
			'bsumbu1' => 'Bsumbu1',
			'bsumbu2' => 'Bsumbu2',
			'bsumbu3' => 'Bsumbu3',
			'bsumbu4' => 'Bsumbu4',
			'konsumbu' => 'Konsumbu',
			'bahan_bakar' => 'Bahan Bakar',
			'tipe' => 'Tipe',
			'id_uji' => 'Id Uji',
			'id_daftar' => 'Id Daftar',
			'alat' => 'Alat',
			'selgaya3' => 'Selgaya 3',
			'selgaya4' => 'Selgaya 4',
			'no_antrian' => 'No Antrian',
			'numerator' => 'Numerator',
			'jdatang' => 'Jdatang',
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

		$criteria->compare('ktlamp_kanan',$this->ktlamp_kanan);
		$criteria->compare('ktlamp_kiri',$this->ktlamp_kiri);
		$criteria->compare('dev_kanan',$this->dev_kanan);
		$criteria->compare('dev_kiri',$this->dev_kiri);
		$criteria->compare('selrem_sb1',$this->selrem_sb1);
		$criteria->compare('selrem_sb2',$this->selrem_sb2);
		$criteria->compare('selrem_sb3',$this->selrem_sb3);
		$criteria->compare('selrem_sb4',$this->selrem_sb4);
		$criteria->compare('selgaya1',$this->selgaya1);
		$criteria->compare('selgaya2',$this->selgaya2);
		$criteria->compare('ems_diesel',$this->ems_diesel);
		$criteria->compare('ems_mesin_co',$this->ems_mesin_co);
		$criteria->compare('ems_mesin_hc',$this->ems_mesin_hc);
		$criteria->compare('nm_penguji',$this->nm_penguji,true);
		$criteria->compare('id_hasil_uji',$this->id_hasil_uji,true);
		$criteria->compare('lulus_prauji',$this->lulus_prauji);
		$criteria->compare('no_uji',$this->no_uji,true);
		$criteria->compare('no_kendaraan',$this->no_kendaraan,true);
		$criteria->compare('nama_pemilik',$this->nama_pemilik,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('tahun',$this->tahun,true);
		$criteria->compare('jns_kend',$this->jns_kend,true);
		$criteria->compare('bsumbu1',$this->bsumbu1,true);
		$criteria->compare('bsumbu2',$this->bsumbu2,true);
		$criteria->compare('bsumbu3',$this->bsumbu3,true);
		$criteria->compare('bsumbu4',$this->bsumbu4,true);
		$criteria->compare('konsumbu',$this->konsumbu,true);
		$criteria->compare('bahan_bakar',$this->bahan_bakar,true);
		$criteria->compare('tipe',$this->tipe,true);
		$criteria->compare('id_uji',$this->id_uji);
		$criteria->compare('id_daftar',$this->id_daftar,true);
		$criteria->compare('alat',$this->alat);
		$criteria->compare('selgaya3',$this->selgaya3);
		$criteria->compare('selgaya4',$this->selgaya4);
		$criteria->compare('no_antrian',$this->no_antrian);
		$criteria->compare('numerator',$this->numerator,true);
		$criteria->compare('jdatang',$this->jdatang,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VUjiMekanisAll the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
