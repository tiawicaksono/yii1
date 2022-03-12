<?php

/**
 * This is the model class for table "datapengujian".
 *
 * The followings are the available columns in table 'datapengujian':
 * @property integer $idx
 * @property string $statuspenerbitan
 * @property string $nouji
 * @property string $nama
 * @property string $alamat
 * @property string $noidentitaspemilik
 * @property string $nosertifikatreg
 * @property string $tglsertifikatreg
 * @property string $noregistrasikendaraan
 * @property string $norangka
 * @property string $nomesin
 * @property string $merek
 * @property string $tipe
 * @property string $jenis
 * @property string $thpembuatan
 * @property string $bahanbakar
 * @property string $isisilinder
 * @property string $dayamotorpenggerak
 * @property string $jbb
 * @property string $jbkb
 * @property string $jbi
 * @property string $jbki
 * @property string $mst
 * @property string $beratkosong
 * @property string $konfigurasisumburoda
 * @property string $ukuranban
 * @property string $panjangkendaraan
 * @property string $lebarkendaraan
 * @property string $tinggikendaraan
 * @property string $panjangbakatautangki
 * @property string $lebarbakatautangki
 * @property string $tinggibakatautangki
 * @property string $julurdepan
 * @property string $julurbelakang
 * @property string $jaraksumbu1_2
 * @property string $jaraksumbu2_3
 * @property string $jaraksumbu3_4
 * @property string $dayaangkutorang
 * @property string $dayaangkutbarang
 * @property string $kelasjalanterendah
 * @property string $fotodepansmall
 * @property string $fotobelakangsmall
 * @property string $fotokanansmall
 * @property string $fotokirismall
 * @property integer $idpetugasuji
 * @property integer $idkepaladinas
 * @property integer $iddirektur
 * @property string $kodewilayah
 * @property string $kodewilayahasal
 * @property string $huv_nomordankondisirangka
 * @property string $huv_nomordantipemotorpenggerak
 * @property string $huv_kondisitangkicorongdanpipabahanbakar
 * @property string $huv_kondisiconverterkit
 * @property string $huv_kondisidanposisipipapembuangan
 * @property string $huv_ukurandankondisiban
 * @property string $huv_kondisisistemsuspensi
 * @property string $huv_kondisisistemremutama
 * @property string $huv_kondisipenutuplampudanalatpantulcahaya
 * @property string $huv_kondisipanelinstrumentdashboard
 * @property string $huv_kondisikacaspion
 * @property string $huv_kondisispakbor
 * @property string $huv_bentukbumper
 * @property string $huv_keberadaandankondisiperlengkapan
 * @property string $huv_rancanganteknis
 * @property string $huv_keberadaandankondisifasilitastanggapdaruratuntukmobilbus
 * @property string $huv_kondisibadankacaengseltempatdudukmbarangbakmuatantertutup
 * @property string $hum_kondisipenerusdaya
 * @property string $hum_sudutbebaskemudi
 * @property string $hum_kondisiremparkir
 * @property string $hum_fungsilampudanalatpantulcahaya
 * @property string $hum_fungsipenghapuskaca
 * @property string $hum_tingkatkegelapankaca
 * @property string $hum_fungsiklakson
 * @property string $hum_kondisidanfungsisabukkeselamatan
 * @property string $hum_ukurankendaraan
 * @property string $hum_ukurantempatdudukdanbagiandalamkendaraanuntukmobilbus
 * @property string $alatuji_emisiasapbahanbakarsolar
 * @property string $alatuji_emisicobahanbakarbensin
 * @property string $alatuji_emisihcbahanbakarbensin
 * @property string $alatuji_remutamatotalgayapengereman
 * @property string $alatuji_remutamaselisihgayapengeremanrodakirikanan1
 * @property string $alatuji_remutamaselisihgayapengeremanrodakirikanan2
 * @property string $alatuji_remutamaselisihgayapengeremanrodakirikanan3
 * @property string $alatuji_remutamaselisihgayapengeremanrodakirikanan4
 * @property string $alatuji_remparkirtangan
 * @property string $alatuji_remparkirkaki
 * @property string $alatuji_kincuprodadepan
 * @property string $alatuji_tingkatkebisingan
 * @property string $alatuji_lampuutamakekuatanpancarlampukanan
 * @property string $alatuji_lampuutamakekuatanpancarlampukiri
 * @property string $alatuji_lampuutamapenyimpanganlampukanan
 * @property string $alatuji_lampuutamapenyimpanganlampukiri
 * @property string $alatuji_penunjukkecepatan
 * @property string $alatuji_kedalamanalurban
 * @property string $qrcodeurl
 * @property string $qrnoujipm133
 * @property string $masaberlakuuji
 * @property string $tgluji
 * @property boolean $statuslulusuji
 * @property string $uid
 * @property string $nokendalikartu
 * @property string $datetimepersochip
 * @property string $datetimepersovisual
 * @property string $datetimecetaksertifikat
 * @property string $datetimeupload
 * @property string $vcode
 */
class Datapengujian extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'datapengujian';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('statuspenerbitan, nouji, nama, alamat, nosertifikatreg, tglsertifikatreg, noregistrasikendaraan, norangka, nomesin, merek, tipe, jenis, thpembuatan, bahanbakar, isisilinder, dayamotorpenggerak, jbb, jbkb, jbi, jbki, mst, beratkosong, konfigurasisumburoda, ukuranban, panjangkendaraan, lebarkendaraan, tinggikendaraan, panjangbakatautangki, lebarbakatautangki, tinggibakatautangki, julurdepan, julurbelakang, jaraksumbu1_2, dayaangkutorang, dayaangkutbarang, kelasjalanterendah, kodewilayah, kodewilayahasal, tgluji', 'required'),
			array('idpetugasuji, idkepaladinas, iddirektur', 'numerical', 'integerOnly'=>true),
			array('statuspenerbitan, huv_nomordankondisirangka, huv_nomordantipemotorpenggerak, huv_kondisitangkicorongdanpipabahanbakar, huv_kondisiconverterkit, huv_kondisidanposisipipapembuangan, huv_ukurandankondisiban, huv_kondisisistemsuspensi, huv_kondisisistemremutama, huv_kondisipenutuplampudanalatpantulcahaya, huv_kondisipanelinstrumentdashboard, huv_kondisikacaspion, huv_kondisispakbor, huv_bentukbumper, huv_keberadaandankondisiperlengkapan, huv_rancanganteknis, huv_keberadaandankondisifasilitastanggapdaruratuntukmobilbus, huv_kondisibadankacaengseltempatdudukmbarangbakmuatantertutup, hum_kondisipenerusdaya, hum_sudutbebaskemudi, hum_kondisiremparkir, hum_fungsilampudanalatpantulcahaya, hum_fungsipenghapuskaca, hum_tingkatkegelapankaca, hum_fungsiklakson, hum_kondisidanfungsisabukkeselamatan, hum_ukurankendaraan, hum_ukurantempatdudukdanbagiandalamkendaraanuntukmobilbus', 'length', 'max'=>1),
			array('tglsertifikatreg, masaberlakuuji, tgluji', 'length', 'max'=>8),
			array('kodewilayah, kodewilayahasal', 'length', 'max'=>5),
			array('qrcodeurl, vcode', 'length', 'max'=>32),
			array('datetimepersochip, datetimepersovisual, datetimecetaksertifikat, datetimeupload', 'length', 'max'=>14),
			array('noidentitaspemilik, jaraksumbu2_3, jaraksumbu3_4, fotodepansmall, fotobelakangsmall, fotokanansmall, fotokirismall, alatuji_emisiasapbahanbakarsolar, alatuji_emisicobahanbakarbensin, alatuji_emisihcbahanbakarbensin, alatuji_remutamatotalgayapengereman, alatuji_remutamaselisihgayapengeremanrodakirikanan1, alatuji_remutamaselisihgayapengeremanrodakirikanan2, alatuji_remutamaselisihgayapengeremanrodakirikanan3, alatuji_remutamaselisihgayapengeremanrodakirikanan4, alatuji_remparkirtangan, alatuji_remparkirkaki, alatuji_kincuprodadepan, alatuji_tingkatkebisingan, alatuji_lampuutamakekuatanpancarlampukanan, alatuji_lampuutamakekuatanpancarlampukiri, alatuji_lampuutamapenyimpanganlampukanan, alatuji_lampuutamapenyimpanganlampukiri, alatuji_penunjukkecepatan, alatuji_kedalamanalurban, qrnoujipm133, statuslulusuji, uid, nokendalikartu', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idx, statuspenerbitan, nouji, nama, alamat, noidentitaspemilik, nosertifikatreg, tglsertifikatreg, noregistrasikendaraan, norangka, nomesin, merek, tipe, jenis, thpembuatan, bahanbakar, isisilinder, dayamotorpenggerak, jbb, jbkb, jbi, jbki, mst, beratkosong, konfigurasisumburoda, ukuranban, panjangkendaraan, lebarkendaraan, tinggikendaraan, panjangbakatautangki, lebarbakatautangki, tinggibakatautangki, julurdepan, julurbelakang, jaraksumbu1_2, jaraksumbu2_3, jaraksumbu3_4, dayaangkutorang, dayaangkutbarang, kelasjalanterendah, fotodepansmall, fotobelakangsmall, fotokanansmall, fotokirismall, idpetugasuji, idkepaladinas, iddirektur, kodewilayah, kodewilayahasal, huv_nomordankondisirangka, huv_nomordantipemotorpenggerak, huv_kondisitangkicorongdanpipabahanbakar, huv_kondisiconverterkit, huv_kondisidanposisipipapembuangan, huv_ukurandankondisiban, huv_kondisisistemsuspensi, huv_kondisisistemremutama, huv_kondisipenutuplampudanalatpantulcahaya, huv_kondisipanelinstrumentdashboard, huv_kondisikacaspion, huv_kondisispakbor, huv_bentukbumper, huv_keberadaandankondisiperlengkapan, huv_rancanganteknis, huv_keberadaandankondisifasilitastanggapdaruratuntukmobilbus, huv_kondisibadankacaengseltempatdudukmbarangbakmuatantertutup, hum_kondisipenerusdaya, hum_sudutbebaskemudi, hum_kondisiremparkir, hum_fungsilampudanalatpantulcahaya, hum_fungsipenghapuskaca, hum_tingkatkegelapankaca, hum_fungsiklakson, hum_kondisidanfungsisabukkeselamatan, hum_ukurankendaraan, hum_ukurantempatdudukdanbagiandalamkendaraanuntukmobilbus, alatuji_emisiasapbahanbakarsolar, alatuji_emisicobahanbakarbensin, alatuji_emisihcbahanbakarbensin, alatuji_remutamatotalgayapengereman, alatuji_remutamaselisihgayapengeremanrodakirikanan1, alatuji_remutamaselisihgayapengeremanrodakirikanan2, alatuji_remutamaselisihgayapengeremanrodakirikanan3, alatuji_remutamaselisihgayapengeremanrodakirikanan4, alatuji_remparkirtangan, alatuji_remparkirkaki, alatuji_kincuprodadepan, alatuji_tingkatkebisingan, alatuji_lampuutamakekuatanpancarlampukanan, alatuji_lampuutamakekuatanpancarlampukiri, alatuji_lampuutamapenyimpanganlampukanan, alatuji_lampuutamapenyimpanganlampukiri, alatuji_penunjukkecepatan, alatuji_kedalamanalurban, qrcodeurl, qrnoujipm133, masaberlakuuji, tgluji, statuslulusuji, uid, nokendalikartu, datetimepersochip, datetimepersovisual, datetimecetaksertifikat, datetimeupload, vcode', 'safe', 'on'=>'search'),
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
			'idx' => 'Idx',
			'statuspenerbitan' => 'Statuspenerbitan',
			'nouji' => 'Nouji',
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'noidentitaspemilik' => 'Noidentitaspemilik',
			'nosertifikatreg' => 'Nosertifikatreg',
			'tglsertifikatreg' => 'Tglsertifikatreg',
			'noregistrasikendaraan' => 'Noregistrasikendaraan',
			'norangka' => 'Norangka',
			'nomesin' => 'Nomesin',
			'merek' => 'Merek',
			'tipe' => 'Tipe',
			'jenis' => 'Jenis',
			'thpembuatan' => 'Thpembuatan',
			'bahanbakar' => 'Bahanbakar',
			'isisilinder' => 'Isisilinder',
			'dayamotorpenggerak' => 'Dayamotorpenggerak',
			'jbb' => 'Jbb',
			'jbkb' => 'Jbkb',
			'jbi' => 'Jbi',
			'jbki' => 'Jbki',
			'mst' => 'Mst',
			'beratkosong' => 'Beratkosong',
			'konfigurasisumburoda' => 'Konfigurasisumburoda',
			'ukuranban' => 'Ukuranban',
			'panjangkendaraan' => 'Panjangkendaraan',
			'lebarkendaraan' => 'Lebarkendaraan',
			'tinggikendaraan' => 'Tinggikendaraan',
			'panjangbakatautangki' => 'Panjangbakatautangki',
			'lebarbakatautangki' => 'Lebarbakatautangki',
			'tinggibakatautangki' => 'Tinggibakatautangki',
			'julurdepan' => 'Julurdepan',
			'julurbelakang' => 'Julurbelakang',
			'jaraksumbu1_2' => 'Jaraksumbu1 2',
			'jaraksumbu2_3' => 'Jaraksumbu2 3',
			'jaraksumbu3_4' => 'Jaraksumbu3 4',
			'dayaangkutorang' => 'Dayaangkutorang',
			'dayaangkutbarang' => 'Dayaangkutbarang',
			'kelasjalanterendah' => 'Kelasjalanterendah',
			'fotodepansmall' => 'Fotodepansmall',
			'fotobelakangsmall' => 'Fotobelakangsmall',
			'fotokanansmall' => 'Fotokanansmall',
			'fotokirismall' => 'Fotokirismall',
			'idpetugasuji' => 'Idpetugasuji',
			'idkepaladinas' => 'Idkepaladinas',
			'iddirektur' => 'Iddirektur',
			'kodewilayah' => 'Kodewilayah',
			'kodewilayahasal' => 'Kodewilayahasal',
			'huv_nomordankondisirangka' => 'Huv Nomordankondisirangka',
			'huv_nomordantipemotorpenggerak' => 'Huv Nomordantipemotorpenggerak',
			'huv_kondisitangkicorongdanpipabahanbakar' => 'Huv Kondisitangkicorongdanpipabahanbakar',
			'huv_kondisiconverterkit' => 'Huv Kondisiconverterkit',
			'huv_kondisidanposisipipapembuangan' => 'Huv Kondisidanposisipipapembuangan',
			'huv_ukurandankondisiban' => 'Huv Ukurandankondisiban',
			'huv_kondisisistemsuspensi' => 'Huv Kondisisistemsuspensi',
			'huv_kondisisistemremutama' => 'Huv Kondisisistemremutama',
			'huv_kondisipenutuplampudanalatpantulcahaya' => 'Huv Kondisipenutuplampudanalatpantulcahaya',
			'huv_kondisipanelinstrumentdashboard' => 'Huv Kondisipanelinstrumentdashboard',
			'huv_kondisikacaspion' => 'Huv Kondisikacaspion',
			'huv_kondisispakbor' => 'Huv Kondisispakbor',
			'huv_bentukbumper' => 'Huv Bentukbumper',
			'huv_keberadaandankondisiperlengkapan' => 'Huv Keberadaandankondisiperlengkapan',
			'huv_rancanganteknis' => 'Huv Rancanganteknis',
			'huv_keberadaandankondisifasilitastanggapdaruratuntukmobilbus' => 'Huv Keberadaandankondisifasilitastanggapdaruratuntukmobilbus',
			'huv_kondisibadankacaengseltempatdudukmbarangbakmuatantertutup' => 'Huv Kondisibadankacaengseltempatdudukmbarangbakmuatantertutup',
			'hum_kondisipenerusdaya' => 'Hum Kondisipenerusdaya',
			'hum_sudutbebaskemudi' => 'Hum Sudutbebaskemudi',
			'hum_kondisiremparkir' => 'Hum Kondisiremparkir',
			'hum_fungsilampudanalatpantulcahaya' => 'Hum Fungsilampudanalatpantulcahaya',
			'hum_fungsipenghapuskaca' => 'Hum Fungsipenghapuskaca',
			'hum_tingkatkegelapankaca' => 'Hum Tingkatkegelapankaca',
			'hum_fungsiklakson' => 'Hum Fungsiklakson',
			'hum_kondisidanfungsisabukkeselamatan' => 'Hum Kondisidanfungsisabukkeselamatan',
			'hum_ukurankendaraan' => 'Hum Ukurankendaraan',
			'hum_ukurantempatdudukdanbagiandalamkendaraanuntukmobilbus' => 'Hum Ukurantempatdudukdanbagiandalamkendaraanuntukmobilbus',
			'alatuji_emisiasapbahanbakarsolar' => 'Alatuji Emisiasapbahanbakarsolar',
			'alatuji_emisicobahanbakarbensin' => 'Alatuji Emisicobahanbakarbensin',
			'alatuji_emisihcbahanbakarbensin' => 'Alatuji Emisihcbahanbakarbensin',
			'alatuji_remutamatotalgayapengereman' => 'Alatuji Remutamatotalgayapengereman',
			'alatuji_remutamaselisihgayapengeremanrodakirikanan1' => 'Alatuji Remutamaselisihgayapengeremanrodakirikanan1',
			'alatuji_remutamaselisihgayapengeremanrodakirikanan2' => 'Alatuji Remutamaselisihgayapengeremanrodakirikanan2',
			'alatuji_remutamaselisihgayapengeremanrodakirikanan3' => 'Alatuji Remutamaselisihgayapengeremanrodakirikanan3',
			'alatuji_remutamaselisihgayapengeremanrodakirikanan4' => 'Alatuji Remutamaselisihgayapengeremanrodakirikanan4',
			'alatuji_remparkirtangan' => 'Alatuji Remparkirtangan',
			'alatuji_remparkirkaki' => 'Alatuji Remparkirkaki',
			'alatuji_kincuprodadepan' => 'Alatuji Kincuprodadepan',
			'alatuji_tingkatkebisingan' => 'Alatuji Tingkatkebisingan',
			'alatuji_lampuutamakekuatanpancarlampukanan' => 'Alatuji Lampuutamakekuatanpancarlampukanan',
			'alatuji_lampuutamakekuatanpancarlampukiri' => 'Alatuji Lampuutamakekuatanpancarlampukiri',
			'alatuji_lampuutamapenyimpanganlampukanan' => 'Alatuji Lampuutamapenyimpanganlampukanan',
			'alatuji_lampuutamapenyimpanganlampukiri' => 'Alatuji Lampuutamapenyimpanganlampukiri',
			'alatuji_penunjukkecepatan' => 'Alatuji Penunjukkecepatan',
			'alatuji_kedalamanalurban' => 'Alatuji Kedalamanalurban',
			'qrcodeurl' => 'Qrcodeurl',
			'qrnoujipm133' => 'Qrnoujipm133',
			'masaberlakuuji' => 'Masaberlakuuji',
			'tgluji' => 'Tgluji',
			'statuslulusuji' => 'Statuslulusuji',
			'uid' => 'Uid',
			'nokendalikartu' => 'Nokendalikartu',
			'datetimepersochip' => 'Datetimepersochip',
			'datetimepersovisual' => 'Datetimepersovisual',
			'datetimecetaksertifikat' => 'Datetimecetaksertifikat',
			'datetimeupload' => 'Datetimeupload',
			'vcode' => 'Vcode',
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

		$criteria->compare('idx',$this->idx);
		$criteria->compare('statuspenerbitan',$this->statuspenerbitan,true);
		$criteria->compare('nouji',$this->nouji,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('noidentitaspemilik',$this->noidentitaspemilik,true);
		$criteria->compare('nosertifikatreg',$this->nosertifikatreg,true);
		$criteria->compare('tglsertifikatreg',$this->tglsertifikatreg,true);
		$criteria->compare('noregistrasikendaraan',$this->noregistrasikendaraan,true);
		$criteria->compare('norangka',$this->norangka,true);
		$criteria->compare('nomesin',$this->nomesin,true);
		$criteria->compare('merek',$this->merek,true);
		$criteria->compare('tipe',$this->tipe,true);
		$criteria->compare('jenis',$this->jenis,true);
		$criteria->compare('thpembuatan',$this->thpembuatan,true);
		$criteria->compare('bahanbakar',$this->bahanbakar,true);
		$criteria->compare('isisilinder',$this->isisilinder,true);
		$criteria->compare('dayamotorpenggerak',$this->dayamotorpenggerak,true);
		$criteria->compare('jbb',$this->jbb,true);
		$criteria->compare('jbkb',$this->jbkb,true);
		$criteria->compare('jbi',$this->jbi,true);
		$criteria->compare('jbki',$this->jbki,true);
		$criteria->compare('mst',$this->mst,true);
		$criteria->compare('beratkosong',$this->beratkosong,true);
		$criteria->compare('konfigurasisumburoda',$this->konfigurasisumburoda,true);
		$criteria->compare('ukuranban',$this->ukuranban,true);
		$criteria->compare('panjangkendaraan',$this->panjangkendaraan,true);
		$criteria->compare('lebarkendaraan',$this->lebarkendaraan,true);
		$criteria->compare('tinggikendaraan',$this->tinggikendaraan,true);
		$criteria->compare('panjangbakatautangki',$this->panjangbakatautangki,true);
		$criteria->compare('lebarbakatautangki',$this->lebarbakatautangki,true);
		$criteria->compare('tinggibakatautangki',$this->tinggibakatautangki,true);
		$criteria->compare('julurdepan',$this->julurdepan,true);
		$criteria->compare('julurbelakang',$this->julurbelakang,true);
		$criteria->compare('jaraksumbu1_2',$this->jaraksumbu1_2,true);
		$criteria->compare('jaraksumbu2_3',$this->jaraksumbu2_3,true);
		$criteria->compare('jaraksumbu3_4',$this->jaraksumbu3_4,true);
		$criteria->compare('dayaangkutorang',$this->dayaangkutorang,true);
		$criteria->compare('dayaangkutbarang',$this->dayaangkutbarang,true);
		$criteria->compare('kelasjalanterendah',$this->kelasjalanterendah,true);
		$criteria->compare('fotodepansmall',$this->fotodepansmall,true);
		$criteria->compare('fotobelakangsmall',$this->fotobelakangsmall,true);
		$criteria->compare('fotokanansmall',$this->fotokanansmall,true);
		$criteria->compare('fotokirismall',$this->fotokirismall,true);
		$criteria->compare('idpetugasuji',$this->idpetugasuji);
		$criteria->compare('idkepaladinas',$this->idkepaladinas);
		$criteria->compare('iddirektur',$this->iddirektur);
		$criteria->compare('kodewilayah',$this->kodewilayah,true);
		$criteria->compare('kodewilayahasal',$this->kodewilayahasal,true);
		$criteria->compare('huv_nomordankondisirangka',$this->huv_nomordankondisirangka,true);
		$criteria->compare('huv_nomordantipemotorpenggerak',$this->huv_nomordantipemotorpenggerak,true);
		$criteria->compare('huv_kondisitangkicorongdanpipabahanbakar',$this->huv_kondisitangkicorongdanpipabahanbakar,true);
		$criteria->compare('huv_kondisiconverterkit',$this->huv_kondisiconverterkit,true);
		$criteria->compare('huv_kondisidanposisipipapembuangan',$this->huv_kondisidanposisipipapembuangan,true);
		$criteria->compare('huv_ukurandankondisiban',$this->huv_ukurandankondisiban,true);
		$criteria->compare('huv_kondisisistemsuspensi',$this->huv_kondisisistemsuspensi,true);
		$criteria->compare('huv_kondisisistemremutama',$this->huv_kondisisistemremutama,true);
		$criteria->compare('huv_kondisipenutuplampudanalatpantulcahaya',$this->huv_kondisipenutuplampudanalatpantulcahaya,true);
		$criteria->compare('huv_kondisipanelinstrumentdashboard',$this->huv_kondisipanelinstrumentdashboard,true);
		$criteria->compare('huv_kondisikacaspion',$this->huv_kondisikacaspion,true);
		$criteria->compare('huv_kondisispakbor',$this->huv_kondisispakbor,true);
		$criteria->compare('huv_bentukbumper',$this->huv_bentukbumper,true);
		$criteria->compare('huv_keberadaandankondisiperlengkapan',$this->huv_keberadaandankondisiperlengkapan,true);
		$criteria->compare('huv_rancanganteknis',$this->huv_rancanganteknis,true);
		$criteria->compare('huv_keberadaandankondisifasilitastanggapdaruratuntukmobilbus',$this->huv_keberadaandankondisifasilitastanggapdaruratuntukmobilbus,true);
		$criteria->compare('huv_kondisibadankacaengseltempatdudukmbarangbakmuatantertutup',$this->huv_kondisibadankacaengseltempatdudukmbarangbakmuatantertutup,true);
		$criteria->compare('hum_kondisipenerusdaya',$this->hum_kondisipenerusdaya,true);
		$criteria->compare('hum_sudutbebaskemudi',$this->hum_sudutbebaskemudi,true);
		$criteria->compare('hum_kondisiremparkir',$this->hum_kondisiremparkir,true);
		$criteria->compare('hum_fungsilampudanalatpantulcahaya',$this->hum_fungsilampudanalatpantulcahaya,true);
		$criteria->compare('hum_fungsipenghapuskaca',$this->hum_fungsipenghapuskaca,true);
		$criteria->compare('hum_tingkatkegelapankaca',$this->hum_tingkatkegelapankaca,true);
		$criteria->compare('hum_fungsiklakson',$this->hum_fungsiklakson,true);
		$criteria->compare('hum_kondisidanfungsisabukkeselamatan',$this->hum_kondisidanfungsisabukkeselamatan,true);
		$criteria->compare('hum_ukurankendaraan',$this->hum_ukurankendaraan,true);
		$criteria->compare('hum_ukurantempatdudukdanbagiandalamkendaraanuntukmobilbus',$this->hum_ukurantempatdudukdanbagiandalamkendaraanuntukmobilbus,true);
		$criteria->compare('alatuji_emisiasapbahanbakarsolar',$this->alatuji_emisiasapbahanbakarsolar,true);
		$criteria->compare('alatuji_emisicobahanbakarbensin',$this->alatuji_emisicobahanbakarbensin,true);
		$criteria->compare('alatuji_emisihcbahanbakarbensin',$this->alatuji_emisihcbahanbakarbensin,true);
		$criteria->compare('alatuji_remutamatotalgayapengereman',$this->alatuji_remutamatotalgayapengereman,true);
		$criteria->compare('alatuji_remutamaselisihgayapengeremanrodakirikanan1',$this->alatuji_remutamaselisihgayapengeremanrodakirikanan1,true);
		$criteria->compare('alatuji_remutamaselisihgayapengeremanrodakirikanan2',$this->alatuji_remutamaselisihgayapengeremanrodakirikanan2,true);
		$criteria->compare('alatuji_remutamaselisihgayapengeremanrodakirikanan3',$this->alatuji_remutamaselisihgayapengeremanrodakirikanan3,true);
		$criteria->compare('alatuji_remutamaselisihgayapengeremanrodakirikanan4',$this->alatuji_remutamaselisihgayapengeremanrodakirikanan4,true);
		$criteria->compare('alatuji_remparkirtangan',$this->alatuji_remparkirtangan,true);
		$criteria->compare('alatuji_remparkirkaki',$this->alatuji_remparkirkaki,true);
		$criteria->compare('alatuji_kincuprodadepan',$this->alatuji_kincuprodadepan,true);
		$criteria->compare('alatuji_tingkatkebisingan',$this->alatuji_tingkatkebisingan,true);
		$criteria->compare('alatuji_lampuutamakekuatanpancarlampukanan',$this->alatuji_lampuutamakekuatanpancarlampukanan,true);
		$criteria->compare('alatuji_lampuutamakekuatanpancarlampukiri',$this->alatuji_lampuutamakekuatanpancarlampukiri,true);
		$criteria->compare('alatuji_lampuutamapenyimpanganlampukanan',$this->alatuji_lampuutamapenyimpanganlampukanan,true);
		$criteria->compare('alatuji_lampuutamapenyimpanganlampukiri',$this->alatuji_lampuutamapenyimpanganlampukiri,true);
		$criteria->compare('alatuji_penunjukkecepatan',$this->alatuji_penunjukkecepatan,true);
		$criteria->compare('alatuji_kedalamanalurban',$this->alatuji_kedalamanalurban,true);
		$criteria->compare('qrcodeurl',$this->qrcodeurl,true);
		$criteria->compare('qrnoujipm133',$this->qrnoujipm133,true);
		$criteria->compare('masaberlakuuji',$this->masaberlakuuji,true);
		$criteria->compare('tgluji',$this->tgluji,true);
		$criteria->compare('statuslulusuji',$this->statuslulusuji);
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('nokendalikartu',$this->nokendalikartu,true);
		$criteria->compare('datetimepersochip',$this->datetimepersochip,true);
		$criteria->compare('datetimepersovisual',$this->datetimepersovisual,true);
		$criteria->compare('datetimecetaksertifikat',$this->datetimecetaksertifikat,true);
		$criteria->compare('datetimeupload',$this->datetimeupload,true);
		$criteria->compare('vcode',$this->vcode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Datapengujian the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
