<?php

/**
 * This is the model class for table "v_riwayat_hasil".
 *
 * The followings are the available columns in table 'v_riwayat_hasil':
 * @property string $id_hasil_uji
 * @property string $id_riwayat
 * @property string $no_identitas
 * @property string $nama_pemilik
 * @property string $alamat
 * @property boolean $datang
 * @property string $jdatang
 * @property string $tgl_retribusi
 * @property string $tglmati
 * @property string $tgl_uji
 * @property string $nm_uji
 * @property string $no_berkas
 * @property string $ptgs_daftar
 * @property double $b_daftar
 * @property double $b_gnt_buku
 * @property double $b_tlt_uji
 * @property double $b_total
 * @property string $numerator
 * @property string $no_antrian
 * @property string $ptgs_datang
 * @property string $ptgs_prauji
 * @property string $ptgs_smoke
 * @property string $ptgs_pitlift
 * @property string $ptgs_lampu
 * @property string $ptgs_break
 * @property string $ptgs_print_hasil
 * @property string $ptgs_penyerahan
 * @property string $jselesai
 * @property string $nm_penguji
 * @property string $nm_pengurus
 * @property string $almt_pengurus
 * @property string $no_ktp
 * @property string $perusahaan
 * @property double $lama
 * @property double $ems_diesel
 * @property double $ems_mesin_co
 * @property double $ems_mesin_hc
 * @property double $ktlamp_kanan
 * @property double $ktlamp_kiri
 * @property double $dev_kanan
 * @property double $dev_kiri
 * @property double $selrem_sb1
 * @property double $selrem_sb2
 * @property double $selgaya
 * @property double $selkirikanan
 * @property boolean $lulus
 * @property string $img1
 * @property string $img2
 */
class VRiwayatHasil extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_riwayat_hasil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('b_daftar, b_gnt_buku, b_tlt_uji, b_total, lama, ems_diesel, ems_mesin_co, ems_mesin_hc, ktlamp_kanan, ktlamp_kiri, dev_kanan, dev_kiri, selrem_sb1, selrem_sb2, selgaya1, selgaya2, selgaya3, selgaya4', 'numerical'),
			array('no_identitas', 'length', 'max'=>60),
			array('nama_pemilik, almt_pengurus, no_ktp', 'length', 'max'=>100),
			array('alamat', 'length', 'max'=>200),
			array('nm_uji, nm_penguji, nm_pengurus', 'length', 'max'=>50),
			array('ptgs_daftar, ptgs_datang, ptgs_prauji, ptgs_smoke, ptgs_pitlift, ptgs_lampu, ptgs_break, ptgs_print_hasil, ptgs_penyerahan', 'length', 'max'=>30),
			array('id_hasil_uji, id_riwayat, datang, jdatang, tgl_retribusi, tglmati, tgl_uji, no_berkas, numerator, no_antrian, jselesai, perusahaan, lulus, img1, img2', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_hasil_uji, id_riwayat, no_identitas, nama_pemilik, alamat, datang, jdatang, tgl_retribusi, tglmati, tgl_uji, nm_uji, no_berkas, ptgs_daftar, b_daftar, b_gnt_buku, b_tlt_uji, b_total, numerator, no_antrian, ptgs_datang, ptgs_prauji, ptgs_smoke, ptgs_pitlift, ptgs_lampu, ptgs_break, ptgs_print_hasil, ptgs_penyerahan, jselesai, nm_penguji, nm_pengurus, almt_pengurus, no_ktp, perusahaan, lama, ems_diesel, ems_mesin_co, ems_mesin_hc, ktlamp_kanan, ktlamp_kiri, dev_kanan, dev_kiri, selrem_sb1, selrem_sb2, selgaya1, selgaya2, selgaya3, selgaya4, lulus, img1, img2', 'safe', 'on'=>'search'),
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
			'id_riwayat' => 'Id Riwayat',
			'no_identitas' => 'No Identitas',
			'nama_pemilik' => 'Nama Pemilik',
			'alamat' => 'Alamat',
			'datang' => 'Datang',
			'jdatang' => 'Jdatang',
			'tgl_retribusi' => 'Tgl Retribusi',
			'tglmati' => 'Tglmati',
			'tgl_uji' => 'Tgl Uji',
			'nm_uji' => 'Nm Uji',
			'no_berkas' => 'No Berkas',
			'ptgs_daftar' => 'Ptgs Daftar',
			'b_daftar' => 'B Daftar',
			'b_gnt_buku' => 'B Gnt Buku',
			'b_tlt_uji' => 'B Tlt Uji',
			'b_total' => 'B Total',
			'numerator' => 'Numerator',
			'no_antrian' => 'No Antrian',
			'ptgs_datang' => 'Ptgs Datang',
			'ptgs_prauji' => 'Ptgs Prauji',
			'ptgs_smoke' => 'Ptgs Smoke',
			'ptgs_pitlift' => 'Ptgs Pitlift',
			'ptgs_lampu' => 'Ptgs Lampu',
			'ptgs_break' => 'Ptgs Break',
			'ptgs_print_hasil' => 'Ptgs Print Hasil',
			'ptgs_penyerahan' => 'Ptgs Penyerahan',
			'jselesai' => 'Jselesai',
			'nm_penguji' => 'Nm Penguji',
			'nm_pengurus' => 'Nm Pengurus',
			'almt_pengurus' => 'Almt Pengurus',
			'no_ktp' => 'No Ktp',
			'perusahaan' => 'Perusahaan',
			'lama' => 'Lama',
			'ems_diesel' => 'Ems Diesel',
			'ems_mesin_co' => 'Ems Mesin Co',
			'ems_mesin_hc' => 'Ems Mesin Hc',
			'ktlamp_kanan' => 'Ktlamp Kanan',
			'ktlamp_kiri' => 'Ktlamp Kiri',
			'dev_kanan' => 'Dev Kanan',
			'dev_kiri' => 'Dev Kiri',
			'selrem_sb1' => 'Selrem Sb1',
			'selrem_sb2' => 'Selrem Sb2',
			'selgaya1' => 'Selgaya 1',
			'selgaya2' => 'Selgaya 2',
			'selgaya3' => 'Selgaya 3',
			'selgaya4' => 'Selgaya 4',
			'lulus' => 'Lulus',
			'img1' => 'Img1',
			'img2' => 'Img2',
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
		$criteria->compare('id_riwayat',$this->id_riwayat,true);
		$criteria->compare('no_identitas',$this->no_identitas,true);
		$criteria->compare('nama_pemilik',$this->nama_pemilik,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('datang',$this->datang);
		$criteria->compare('jdatang',$this->jdatang,true);
		$criteria->compare('tgl_retribusi',$this->tgl_retribusi,true);
		$criteria->compare('tglmati',$this->tglmati,true);
		$criteria->compare('tgl_uji',$this->tgl_uji,true);
		$criteria->compare('nm_uji',$this->nm_uji,true);
		$criteria->compare('no_berkas',$this->no_berkas,true);
		$criteria->compare('ptgs_daftar',$this->ptgs_daftar,true);
		$criteria->compare('b_daftar',$this->b_daftar);
		$criteria->compare('b_gnt_buku',$this->b_gnt_buku);
		$criteria->compare('b_tlt_uji',$this->b_tlt_uji);
		$criteria->compare('b_total',$this->b_total);
		$criteria->compare('numerator',$this->numerator,true);
		$criteria->compare('no_antrian',$this->no_antrian,true);
		$criteria->compare('ptgs_datang',$this->ptgs_datang,true);
		$criteria->compare('ptgs_prauji',$this->ptgs_prauji,true);
		$criteria->compare('ptgs_smoke',$this->ptgs_smoke,true);
		$criteria->compare('ptgs_pitlift',$this->ptgs_pitlift,true);
		$criteria->compare('ptgs_lampu',$this->ptgs_lampu,true);
		$criteria->compare('ptgs_break',$this->ptgs_break,true);
		$criteria->compare('ptgs_print_hasil',$this->ptgs_print_hasil,true);
		$criteria->compare('ptgs_penyerahan',$this->ptgs_penyerahan,true);
		$criteria->compare('jselesai',$this->jselesai,true);
		$criteria->compare('nm_penguji',$this->nm_penguji,true);
		$criteria->compare('nm_pengurus',$this->nm_pengurus,true);
		$criteria->compare('almt_pengurus',$this->almt_pengurus,true);
		$criteria->compare('no_ktp',$this->no_ktp,true);
		$criteria->compare('perusahaan',$this->perusahaan,true);
		$criteria->compare('lama',$this->lama);
		$criteria->compare('ems_diesel',$this->ems_diesel);
		$criteria->compare('ems_mesin_co',$this->ems_mesin_co);
		$criteria->compare('ems_mesin_hc',$this->ems_mesin_hc);
		$criteria->compare('ktlamp_kanan',$this->ktlamp_kanan);
		$criteria->compare('ktlamp_kiri',$this->ktlamp_kiri);
		$criteria->compare('dev_kanan',$this->dev_kanan);
		$criteria->compare('dev_kiri',$this->dev_kiri);
		$criteria->compare('selrem_sb1',$this->selrem_sb1);
		$criteria->compare('selrem_sb2',$this->selrem_sb2);
		$criteria->compare('selgaya1',$this->selgaya1);
		$criteria->compare('selgaya2',$this->selgaya2);
		$criteria->compare('selgaya3',$this->selgaya3);
		$criteria->compare('selgaya4',$this->selgaya4);
		$criteria->compare('lulus',$this->lulus);
		$criteria->compare('img1',$this->img1,true);
		$criteria->compare('img2',$this->img2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VRiwayatHasil the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
