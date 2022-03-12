<?php

/**
 * This is the model class for table "v_print_hasil".
 *
 * The followings are the available columns in table 'v_print_hasil':
 * @property string $id_hasil_uji
 * @property double $ktlamp_kanan
 * @property double $ktlamp_kiri
 * @property double $dev_kanan
 * @property double $dev_kiri
 * @property double $selrem_sb1
 * @property double $selrem_sb2
 * @property double $selrem_sb3
 * @property double $selrem_sb4
 * @property double $beratgaya
 * @property double $prosen
 * @property double $selgaya1
 * @property double $selgaya2
 * @property double $selgaya3
 * @property double $selgaya4
 * @property double $ems_diesel
 * @property double $ems_mesin_co
 * @property double $ems_mesin_hc
 * @property string $nm_penguji
 * @property boolean $ujimekanis
 * @property boolean $prauji
 * @property boolean $cetak
 * @property string $no_surat
 * @property string $no_uji
 * @property string $no_kendaraan
 * @property string $nama_pemilik
 * @property string $tahun
 * @property string $no_mesin
 * @property string $no_chasis
 * @property string $jenis
 * @property string $merk
 * @property string $alamat
 * @property string $bahan_bakar
 * @property string $tipe
 * @property string $id_kendaraan
 * @property string $tgl_uji
 * @property string $nrp
 * @property string $jabatan
 * @property string $id_daftar
 * @property string $jdatang
 * @property string $jselesai
 * @property integer $no_antrian
 * @property integer $id_uji
 * @property boolean $genap
 * @property boolean $lulus
 * @property string $tgl_mati_uji
 * @property string $catatan
 * @property double $no_tl
 * @property double $no_tldim
 * @property string $no_identitas
 * @property string $karoseri_jenis
 * @property string $karoseri_bahan
 * @property string $karoseri_duduk
 * @property string $isi_silinder
 * @property string $daya_motor
 * @property string $kemjbb
 * @property string $kemjbkb
 * @property double $jbi
 * @property string $mst
 * @property double $berat_kosong
 * @property string $konsumbu
 * @property string $psumbu1
 * @property string $psumbu2
 * @property string $psumbu3
 * @property string $psumbu4
 * @property string $psumbu5
 * @property string $ukuran_panjang
 * @property string $ukuran_lebar
 * @property string $ukuran_tinggi
 * @property string $dimpanjang
 * @property string $dimlebar
 * @property string $dimtinggi
 * @property string $jsumbu1
 * @property string $jsumbu2
 * @property string $jsumbu3
 * @property string $foh
 * @property string $roh
 * @property string $kemorang
 * @property string $kembarang
 * @property string $kls_jln
 * @property string $no_regis
 * @property string $tgl_regis
 * @property string $oleh_regis
 * @property string $img_depan
 * @property string $img_belakang
 * @property string $img_kanan
 * @property string $img_kiri
 * @property string $no_tipe
 * @property string $kelurahan
 * @property string $kecamatan
 * @property string $kota
 * @property string $propinsi
 */
class VPrintHasil extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_print_hasil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_antrian, id_uji', 'numerical', 'integerOnly'=>true),
			array('ktlamp_kanan, ktlamp_kiri, dev_kanan, dev_kiri, selrem_sb1, selrem_sb2, selrem_sb3, selrem_sb4, beratgaya, prosen, selgaya1, selgaya2, selgaya3, selgaya4, ems_diesel, ems_mesin_co, ems_mesin_hc, no_tl, no_tldim, jbi, berat_kosong', 'numerical'),
			array('nm_penguji', 'length', 'max'=>50),
			array('no_surat, no_uji, bahan_bakar, nrp, jabatan, karoseri_jenis, karoseri_bahan, karoseri_duduk, isi_silinder, daya_motor, kemjbb, kemjbkb, mst, psumbu1, psumbu2, psumbu3, psumbu4, psumbu5, ukuran_panjang, ukuran_lebar, ukuran_tinggi, dimpanjang, dimlebar, dimtinggi, jsumbu1, jsumbu2, jsumbu3, foh, roh, kemorang, kembarang, kls_jln', 'length', 'max'=>30),
			array('konsumbu', 'length', 'max'=>12),
			array('no_regis, no_tipe', 'length', 'max'=>200),
			array('oleh_regis', 'length', 'max'=>100),
			array('id_hasil_uji, ujimekanis, prauji, cetak, no_kendaraan, nama_pemilik, tahun, no_mesin, no_chasis, jenis, merk, alamat, tipe, id_kendaraan, tgl_uji, id_daftar, jdatang, jselesai, genap, lulus, tgl_mati_uji, catatan, no_identitas, tgl_regis, img_depan, img_belakang, img_kanan, img_kiri, kelurahan, kecamatan, kota, propinsi', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_hasil_uji, ktlamp_kanan, ktlamp_kiri, dev_kanan, dev_kiri, selrem_sb1, selrem_sb2, selrem_sb3, selrem_sb4, beratgaya, prosen, selgaya1, selgaya2, selgaya3, selgaya4, ems_diesel, ems_mesin_co, ems_mesin_hc, nm_penguji, ujimekanis, prauji, cetak, no_surat, no_uji, no_kendaraan, nama_pemilik, tahun, no_mesin, no_chasis, jenis, merk, alamat, bahan_bakar, tipe, id_kendaraan, tgl_uji, nrp, jabatan, id_daftar, jdatang, jselesai, no_antrian, id_uji, genap, lulus, tgl_mati_uji, catatan, no_tl, no_tldim, no_identitas, karoseri_jenis, karoseri_bahan, karoseri_duduk, isi_silinder, daya_motor, kemjbb, kemjbkb, jbi, mst, berat_kosong, konsumbu, psumbu1, psumbu2, psumbu3, psumbu4, psumbu5, ukuran_panjang, ukuran_lebar, ukuran_tinggi, dimpanjang, dimlebar, dimtinggi, jsumbu1, jsumbu2, jsumbu3, foh, roh, kemorang, kembarang, kls_jln, no_regis, tgl_regis, oleh_regis, img_depan, img_belakang, img_kanan, img_kiri, no_tipe, kelurahan, kecamatan, kota, propinsi', 'safe', 'on'=>'search'),
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
			'ktlamp_kanan' => 'Ktlamp Kanan',
			'ktlamp_kiri' => 'Ktlamp Kiri',
			'dev_kanan' => 'Dev Kanan',
			'dev_kiri' => 'Dev Kiri',
			'selrem_sb1' => 'Selrem Sb1',
			'selrem_sb2' => 'Selrem Sb2',
			'selrem_sb3' => 'Selrem Sb3',
			'selrem_sb4' => 'Selrem Sb4',
			'beratgaya' => 'Beratgaya',
			'prosen' => 'Prosen',
			'selgaya1' => 'Selgaya1',
			'selgaya2' => 'Selgaya2',
			'selgaya3' => 'Selgaya3',
			'selgaya4' => 'Selgaya4',
			'ems_diesel' => 'Ems Diesel',
			'ems_mesin_co' => 'Ems Mesin Co',
			'ems_mesin_hc' => 'Ems Mesin Hc',
			'nm_penguji' => 'Nm Penguji',
			'ujimekanis' => 'Ujimekanis',
			'prauji' => 'Prauji',
			'cetak' => 'Cetak',
			'no_surat' => 'No Surat',
			'no_uji' => 'No Uji',
			'no_kendaraan' => 'No Kendaraan',
			'nama_pemilik' => 'Nama Pemilik',
			'tahun' => 'Tahun',
			'no_mesin' => 'No Mesin',
			'no_chasis' => 'No Chasis',
			'jenis' => 'Jenis',
			'merk' => 'Merk',
			'alamat' => 'Alamat',
			'bahan_bakar' => 'Bahan Bakar',
			'tipe' => 'Tipe',
			'id_kendaraan' => 'Id Kendaraan',
			'tgl_uji' => 'Tgl Uji',
			'nrp' => 'Nrp',
			'jabatan' => 'Jabatan',
			'id_daftar' => 'Id Daftar',
			'jdatang' => 'Jdatang',
			'jselesai' => 'Jselesai',
			'no_antrian' => 'No Antrian',
			'id_uji' => 'Id Uji',
			'genap' => 'Genap',
			'lulus' => 'Lulus',
			'tgl_mati_uji' => 'Tgl Mati Uji',
			'catatan' => 'Catatan',
			'no_tl' => 'No Tl',
			'no_tldim' => 'No Tldim',
			'no_identitas' => 'No Identitas',
			'karoseri_jenis' => 'Karoseri Jenis',
			'karoseri_bahan' => 'Karoseri Bahan',
			'karoseri_duduk' => 'Karoseri Duduk',
			'isi_silinder' => 'Isi Silinder',
			'daya_motor' => 'Daya Motor',
			'kemjbb' => 'Kemjbb',
			'kemjbkb' => 'Kemjbkb',
			'jbi' => 'Jbi',
			'mst' => 'Mst',
			'berat_kosong' => 'Berat Kosong',
			'konsumbu' => 'Konsumbu',
			'psumbu1' => 'Psumbu1',
			'psumbu2' => 'Psumbu2',
			'psumbu3' => 'Psumbu3',
			'psumbu4' => 'Psumbu4',
			'psumbu5' => 'Psumbu5',
			'ukuran_panjang' => 'Ukuran Panjang',
			'ukuran_lebar' => 'Ukuran Lebar',
			'ukuran_tinggi' => 'Ukuran Tinggi',
			'dimpanjang' => 'Dimpanjang',
			'dimlebar' => 'Dimlebar',
			'dimtinggi' => 'Dimtinggi',
			'jsumbu1' => 'Jsumbu1',
			'jsumbu2' => 'Jsumbu2',
			'jsumbu3' => 'Jsumbu3',
			'foh' => 'Foh',
			'roh' => 'Roh',
			'kemorang' => 'Kemorang',
			'kembarang' => 'Kembarang',
			'kls_jln' => 'Kls Jln',
			'no_regis' => 'No Regis',
			'tgl_regis' => 'Tgl Regis',
			'oleh_regis' => 'Oleh Regis',
			'img_depan' => 'Img Depan',
			'img_belakang' => 'Img Belakang',
			'img_kanan' => 'Img Kanan',
			'img_kiri' => 'Img Kiri',
			'no_tipe' => 'No Tipe',
			'kelurahan' => 'Kelurahan',
			'kecamatan' => 'Kecamatan',
			'kota' => 'Kota',
			'propinsi' => 'Propinsi',
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
		$criteria->compare('ktlamp_kanan',$this->ktlamp_kanan);
		$criteria->compare('ktlamp_kiri',$this->ktlamp_kiri);
		$criteria->compare('dev_kanan',$this->dev_kanan);
		$criteria->compare('dev_kiri',$this->dev_kiri);
		$criteria->compare('selrem_sb1',$this->selrem_sb1);
		$criteria->compare('selrem_sb2',$this->selrem_sb2);
		$criteria->compare('selrem_sb3',$this->selrem_sb3);
		$criteria->compare('selrem_sb4',$this->selrem_sb4);
		$criteria->compare('beratgaya',$this->beratgaya);
		$criteria->compare('prosen',$this->prosen);
		$criteria->compare('selgaya1',$this->selgaya1);
		$criteria->compare('selgaya2',$this->selgaya2);
		$criteria->compare('selgaya3',$this->selgaya3);
		$criteria->compare('selgaya4',$this->selgaya4);
		$criteria->compare('ems_diesel',$this->ems_diesel);
		$criteria->compare('ems_mesin_co',$this->ems_mesin_co);
		$criteria->compare('ems_mesin_hc',$this->ems_mesin_hc);
		$criteria->compare('nm_penguji',$this->nm_penguji,true);
		$criteria->compare('ujimekanis',$this->ujimekanis);
		$criteria->compare('prauji',$this->prauji);
		$criteria->compare('cetak',$this->cetak);
		$criteria->compare('no_surat',$this->no_surat,true);
		$criteria->compare('no_uji',$this->no_uji,true);
		$criteria->compare('no_kendaraan',$this->no_kendaraan,true);
		$criteria->compare('nama_pemilik',$this->nama_pemilik,true);
		$criteria->compare('tahun',$this->tahun,true);
		$criteria->compare('no_mesin',$this->no_mesin,true);
		$criteria->compare('no_chasis',$this->no_chasis,true);
		$criteria->compare('jenis',$this->jenis,true);
		$criteria->compare('merk',$this->merk,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('bahan_bakar',$this->bahan_bakar,true);
		$criteria->compare('tipe',$this->tipe,true);
		$criteria->compare('id_kendaraan',$this->id_kendaraan,true);
		$criteria->compare('tgl_uji',$this->tgl_uji,true);
		$criteria->compare('nrp',$this->nrp,true);
		$criteria->compare('jabatan',$this->jabatan,true);
		$criteria->compare('id_daftar',$this->id_daftar,true);
		$criteria->compare('jdatang',$this->jdatang,true);
		$criteria->compare('jselesai',$this->jselesai,true);
		$criteria->compare('no_antrian',$this->no_antrian);
		$criteria->compare('id_uji',$this->id_uji);
		$criteria->compare('genap',$this->genap);
		$criteria->compare('lulus',$this->lulus);
		$criteria->compare('tgl_mati_uji',$this->tgl_mati_uji,true);
		$criteria->compare('catatan',$this->catatan,true);
		$criteria->compare('no_tl',$this->no_tl);
		$criteria->compare('no_tldim',$this->no_tldim);
		$criteria->compare('no_identitas',$this->no_identitas,true);
		$criteria->compare('karoseri_jenis',$this->karoseri_jenis,true);
		$criteria->compare('karoseri_bahan',$this->karoseri_bahan,true);
		$criteria->compare('karoseri_duduk',$this->karoseri_duduk,true);
		$criteria->compare('isi_silinder',$this->isi_silinder,true);
		$criteria->compare('daya_motor',$this->daya_motor,true);
		$criteria->compare('kemjbb',$this->kemjbb,true);
		$criteria->compare('kemjbkb',$this->kemjbkb,true);
		$criteria->compare('jbi',$this->jbi);
		$criteria->compare('mst',$this->mst,true);
		$criteria->compare('berat_kosong',$this->berat_kosong);
		$criteria->compare('konsumbu',$this->konsumbu,true);
		$criteria->compare('psumbu1',$this->psumbu1,true);
		$criteria->compare('psumbu2',$this->psumbu2,true);
		$criteria->compare('psumbu3',$this->psumbu3,true);
		$criteria->compare('psumbu4',$this->psumbu4,true);
		$criteria->compare('psumbu5',$this->psumbu5,true);
		$criteria->compare('ukuran_panjang',$this->ukuran_panjang,true);
		$criteria->compare('ukuran_lebar',$this->ukuran_lebar,true);
		$criteria->compare('ukuran_tinggi',$this->ukuran_tinggi,true);
		$criteria->compare('dimpanjang',$this->dimpanjang,true);
		$criteria->compare('dimlebar',$this->dimlebar,true);
		$criteria->compare('dimtinggi',$this->dimtinggi,true);
		$criteria->compare('jsumbu1',$this->jsumbu1,true);
		$criteria->compare('jsumbu2',$this->jsumbu2,true);
		$criteria->compare('jsumbu3',$this->jsumbu3,true);
		$criteria->compare('foh',$this->foh,true);
		$criteria->compare('roh',$this->roh,true);
		$criteria->compare('kemorang',$this->kemorang,true);
		$criteria->compare('kembarang',$this->kembarang,true);
		$criteria->compare('kls_jln',$this->kls_jln,true);
		$criteria->compare('no_regis',$this->no_regis,true);
		$criteria->compare('tgl_regis',$this->tgl_regis,true);
		$criteria->compare('oleh_regis',$this->oleh_regis,true);
		$criteria->compare('img_depan',$this->img_depan,true);
		$criteria->compare('img_belakang',$this->img_belakang,true);
		$criteria->compare('img_kanan',$this->img_kanan,true);
		$criteria->compare('img_kiri',$this->img_kiri,true);
		$criteria->compare('no_tipe',$this->no_tipe,true);
		$criteria->compare('kelurahan',$this->kelurahan,true);
		$criteria->compare('kecamatan',$this->kecamatan,true);
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('propinsi',$this->propinsi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VPrintHasil the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
