<?php

/**
 * This is the model class for table "v_kendaraan".
 *
 * The followings are the available columns in table 'v_kendaraan':
 * @property string $no_uji
 * @property string $merk
 * @property string $tipe
 * @property string $tahun
 * @property string $jenis
 * @property string $awal_pakai
 * @property string $no_chasis
 * @property string $no_mesin
 * @property string $nama_pemilik
 * @property string $identitas
 * @property string $no_identitas
 * @property string $alamat
 * @property string $no_kendaraan
 * @property string $created
 * @property string $createdby
 * @property string $id_kendaraan
 * @property string $id_jns_kend
 * @property boolean $umum
 * @property string $kd_pemilik
 * @property string $tmp_lahir
 * @property string $tgl_lahir
 * @property string $kelamin
 * @property string $rt
 * @property string $rw
 * @property string $kelurahan
 * @property string $kecamatan
 * @property string $kota
 * @property string $propinsi
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
 * @property string $psumbu3
 * @property string $psumbu4
 * @property string $psumbu5
 * @property string $dydukpab1
 * @property string $dydukpab2
 * @property string $dydukpab3
 * @property string $dydukpab4
 * @property string $dydukpab5
 * @property string $dimpanjang
 * @property string $dimlebar
 * @property string $dimtinggi
 * @property string $kemjbb
 * @property string $kemjbkb
 * @property string $kemorang
 * @property string $kembarang
 * @property string $kls_jln
 * @property string $nm_type
 * @property string $nm_komersil
 * @property string $ukp
 * @property string $ukq
 * @property string $ukp2
 * @property string $konsumbu
 * @property double $jbi
 * @property double $mst
 * @property string $no_regis
 * @property string $no_tipe
 * @property string $tgl_tipe
 * @property string $oleh_tipe
 * @property string $no_rancang
 * @property string $tgl_regis
 * @property string $oleh_regis
 * @property string $tgl_rancang
 * @property string $oleh_rancang
 * @property string $tgl_terbit
 * @property string $dikeluarkan
 * @property string $pengimport
 * @property string $warna_bak
 * @property string $guna_khusus
 * @property string $tgl_mati_uji
 * @property string $no_telp
 */
class VKendaraan extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'v_kendaraan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('jbi, mst', 'numerical'),
            array('no_uji, merk, tipe, tahun, jenis, no_chasis, no_mesin, identitas, createdby, kd_pemilik, kelamin, rt, rw, warna, isi_silinder, daya_motor, bahan_bakar, ukuran_panjang, ukuran_lebar, ukuran_tinggi, bagian_belakang, bagian_depan, bagian_jterendah, karoseri_jenis, karoseri_bahan, karoseri_duduk, karoseri_berdiri, jsumbu1, jsumbu2, jsumbu3, jsumbu4, bsumbu1, bsumbu2, bsumbu3, bsumbu4, bsumbu5, psumbu1, psumbu2, psumbu3, psumbu4, psumbu5, dydukpab1, dydukpab2, dydukpab3, dydukpab4, dydukpab5, dimpanjang, dimlebar, dimtinggi, kemjbb, kemjbkb, kemorang, kembarang, kls_jln, ukp, ukq, ukp2, konsumbu', 'length', 'max' => 30),
            array('nama_pemilik, tmp_lahir, kelurahan, kecamatan, kota, propinsi, nm_type, nm_komersil, oleh_tipe, oleh_regis, oleh_rancang, dikeluarkan, pengimport, warna_bak, guna_khusus', 'length', 'max' => 100),
            array('no_identitas', 'length', 'max' => 60),
            array('alamat, no_regis, no_tipe, no_rancang', 'length', 'max' => 200),
            array('no_kendaraan', 'length', 'max' => 12),
            array('created', 'length', 'max' => 20),
            array('awal_pakai, id_kendaraan, id_jns_kend, umum, tgl_lahir, tgl_tipe, tgl_regis, tgl_rancang, tgl_terbit, tgl_mati_uji, no_telp', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('no_uji, merk, tipe, tahun, jenis, awal_pakai, no_chasis, no_mesin, nama_pemilik, identitas, no_identitas, alamat, no_kendaraan, created, createdby, id_kendaraan, id_jns_kend, umum, kd_pemilik, tmp_lahir, tgl_lahir, kelamin, rt, rw, kelurahan, kecamatan, kota, propinsi, warna, isi_silinder, daya_motor, bahan_bakar, ukuran_panjang, ukuran_lebar, ukuran_tinggi, bagian_belakang, bagian_depan, bagian_jterendah, karoseri_jenis, karoseri_bahan, karoseri_duduk, karoseri_berdiri, jsumbu1, jsumbu2, jsumbu3, jsumbu4, bsumbu1, bsumbu2, bsumbu3, bsumbu4, bsumbu5, psumbu1, psumbu2, psumbu3, psumbu4, psumbu5, dydukpab1, dydukpab2, dydukpab3, dydukpab4, dydukpab5, dimpanjang, dimlebar, dimtinggi, kemjbb, kemjbkb, kemorang, kembarang, kls_jln, nm_type, nm_komersil, ukp, ukq, ukp2, konsumbu, jbi, mst, no_regis, no_tipe, tgl_tipe, oleh_tipe, no_rancang, tgl_regis, oleh_regis, tgl_rancang, oleh_rancang, tgl_terbit, dikeluarkan, pengimport, warna_bak, guna_khusus, tgl_mati_uji, no_telp', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'no_uji' => 'No Uji',
            'merk' => 'Merk',
            'tipe' => 'Tipe',
            'tahun' => 'Tahun',
            'jenis' => 'Jenis',
            'awal_pakai' => 'Awal Pakai',
            'no_chasis' => 'No Chasis',
            'no_mesin' => 'No Mesin',
            'nama_pemilik' => 'Nama Pemilik',
            'identitas' => 'Identitas',
            'no_identitas' => 'No Identitas',
            'alamat' => 'Alamat',
            'no_kendaraan' => 'No Kendaraan',
            'created' => 'Created',
            'createdby' => 'Createdby',
            'id_kendaraan' => 'Id Kendaraan',
            'id_jns_kend' => 'Id Jns Kend',
            'umum' => 'Umum',
            'kd_pemilik' => 'Kd Pemilik',
            'tmp_lahir' => 'Tmp Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'kelamin' => 'Kelamin',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'kelurahan' => 'Kelurahan',
            'kecamatan' => 'Kecamatan',
            'kota' => 'Kota',
            'propinsi' => 'Propinsi',
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
            'psumbu3' => 'Psumbu3',
            'psumbu4' => 'Psumbu4',
            'psumbu5' => 'Psumbu5',
            'dydukpab1' => 'Dydukpab1',
            'dydukpab2' => 'Dydukpab2',
            'dydukpab3' => 'Dydukpab3',
            'dydukpab4' => 'Dydukpab4',
            'dydukpab5' => 'Dydukpab5',
            'dimpanjang' => 'Dimpanjang',
            'dimlebar' => 'Dimlebar',
            'dimtinggi' => 'Dimtinggi',
            'kemjbb' => 'Kemjbb',
            'kemjbkb' => 'Kemjbkb',
            'kemorang' => 'Kemorang',
            'kembarang' => 'Kembarang',
            'kls_jln' => 'Kls Jln',
            'nm_type' => 'Nm Type',
            'nm_komersil' => 'Nm Komersil',
            'ukp' => 'Ukp',
            'ukq' => 'Ukq',
            'ukp2' => 'Ukp2',
            'konsumbu' => 'Konsumbu',
            'jbi' => 'Jbi',
            'mst' => 'Mst',
            'no_regis' => 'No Regis',
            'no_tipe' => 'No Tipe',
            'tgl_tipe' => 'Tgl Tipe',
            'oleh_tipe' => 'Oleh Tipe',
            'no_rancang' => 'No Rancang',
            'tgl_regis' => 'Tgl Regis',
            'oleh_regis' => 'Oleh Regis',
            'tgl_rancang' => 'Tgl Rancang',
            'oleh_rancang' => 'Oleh Rancang',
            'tgl_terbit' => 'Tgl Terbit',
            'dikeluarkan' => 'Dikeluarkan',
            'pengimport' => 'Pengimport',
            'warna_bak' => 'Warna Bak',
            'guna_khusus' => 'Guna Khusus',
            'tgl_mati_uji' => 'Tgl Mati Uji',
            'no_telp' => 'No Telp',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('no_uji', $this->no_uji, true);
        $criteria->compare('merk', $this->merk, true);
        $criteria->compare('tipe', $this->tipe, true);
        $criteria->compare('tahun', $this->tahun, true);
        $criteria->compare('jenis', $this->jenis, true);
        $criteria->compare('awal_pakai', $this->awal_pakai, true);
        $criteria->compare('no_chasis', $this->no_chasis, true);
        $criteria->compare('no_mesin', $this->no_mesin, true);
        $criteria->compare('nama_pemilik', $this->nama_pemilik, true);
        $criteria->compare('identitas', $this->identitas, true);
        $criteria->compare('no_identitas', $this->no_identitas, true);
        $criteria->compare('alamat', $this->alamat, true);
        $criteria->compare('no_kendaraan', $this->no_kendaraan, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('createdby', $this->createdby, true);
        $criteria->compare('id_kendaraan', $this->id_kendaraan, true);
        $criteria->compare('id_jns_kend', $this->id_jns_kend, true);
        $criteria->compare('umum', $this->umum);
        $criteria->compare('kd_pemilik', $this->kd_pemilik, true);
        $criteria->compare('tmp_lahir', $this->tmp_lahir, true);
        $criteria->compare('tgl_lahir', $this->tgl_lahir, true);
        $criteria->compare('kelamin', $this->kelamin, true);
        $criteria->compare('rt', $this->rt, true);
        $criteria->compare('rw', $this->rw, true);
        $criteria->compare('kelurahan', $this->kelurahan, true);
        $criteria->compare('kecamatan', $this->kecamatan, true);
        $criteria->compare('kota', $this->kota, true);
        $criteria->compare('propinsi', $this->propinsi, true);
        $criteria->compare('warna', $this->warna, true);
        $criteria->compare('isi_silinder', $this->isi_silinder, true);
        $criteria->compare('daya_motor', $this->daya_motor, true);
        $criteria->compare('bahan_bakar', $this->bahan_bakar, true);
        $criteria->compare('ukuran_panjang', $this->ukuran_panjang, true);
        $criteria->compare('ukuran_lebar', $this->ukuran_lebar, true);
        $criteria->compare('ukuran_tinggi', $this->ukuran_tinggi, true);
        $criteria->compare('bagian_belakang', $this->bagian_belakang, true);
        $criteria->compare('bagian_depan', $this->bagian_depan, true);
        $criteria->compare('bagian_jterendah', $this->bagian_jterendah, true);
        $criteria->compare('karoseri_jenis', $this->karoseri_jenis, true);
        $criteria->compare('karoseri_bahan', $this->karoseri_bahan, true);
        $criteria->compare('karoseri_duduk', $this->karoseri_duduk, true);
        $criteria->compare('karoseri_berdiri', $this->karoseri_berdiri, true);
        $criteria->compare('jsumbu1', $this->jsumbu1, true);
        $criteria->compare('jsumbu2', $this->jsumbu2, true);
        $criteria->compare('jsumbu3', $this->jsumbu3, true);
        $criteria->compare('jsumbu4', $this->jsumbu4, true);
        $criteria->compare('bsumbu1', $this->bsumbu1, true);
        $criteria->compare('bsumbu2', $this->bsumbu2, true);
        $criteria->compare('bsumbu3', $this->bsumbu3, true);
        $criteria->compare('bsumbu4', $this->bsumbu4, true);
        $criteria->compare('bsumbu5', $this->bsumbu5, true);
        $criteria->compare('psumbu1', $this->psumbu1, true);
        $criteria->compare('psumbu2', $this->psumbu2, true);
        $criteria->compare('psumbu3', $this->psumbu3, true);
        $criteria->compare('psumbu4', $this->psumbu4, true);
        $criteria->compare('psumbu5', $this->psumbu5, true);
        $criteria->compare('dydukpab1', $this->dydukpab1, true);
        $criteria->compare('dydukpab2', $this->dydukpab2, true);
        $criteria->compare('dydukpab3', $this->dydukpab3, true);
        $criteria->compare('dydukpab4', $this->dydukpab4, true);
        $criteria->compare('dydukpab5', $this->dydukpab5, true);
        $criteria->compare('dimpanjang', $this->dimpanjang, true);
        $criteria->compare('dimlebar', $this->dimlebar, true);
        $criteria->compare('dimtinggi', $this->dimtinggi, true);
        $criteria->compare('kemjbb', $this->kemjbb, true);
        $criteria->compare('kemjbkb', $this->kemjbkb, true);
        $criteria->compare('kemorang', $this->kemorang, true);
        $criteria->compare('kembarang', $this->kembarang, true);
        $criteria->compare('kls_jln', $this->kls_jln, true);
        $criteria->compare('nm_type', $this->nm_type, true);
        $criteria->compare('nm_komersil', $this->nm_komersil, true);
        $criteria->compare('ukp', $this->ukp, true);
        $criteria->compare('ukq', $this->ukq, true);
        $criteria->compare('ukp2', $this->ukp2, true);
        $criteria->compare('konsumbu', $this->konsumbu, true);
        $criteria->compare('jbi', $this->jbi);
        $criteria->compare('mst', $this->mst);
        $criteria->compare('no_regis', $this->no_regis, true);
        $criteria->compare('no_tipe', $this->no_tipe, true);
        $criteria->compare('tgl_tipe', $this->tgl_tipe, true);
        $criteria->compare('oleh_tipe', $this->oleh_tipe, true);
        $criteria->compare('no_rancang', $this->no_rancang, true);
        $criteria->compare('tgl_regis', $this->tgl_regis, true);
        $criteria->compare('oleh_regis', $this->oleh_regis, true);
        $criteria->compare('tgl_rancang', $this->tgl_rancang, true);
        $criteria->compare('oleh_rancang', $this->oleh_rancang, true);
        $criteria->compare('tgl_terbit', $this->tgl_terbit, true);
        $criteria->compare('dikeluarkan', $this->dikeluarkan, true);
        $criteria->compare('pengimport', $this->pengimport, true);
        $criteria->compare('warna_bak', $this->warna_bak, true);
        $criteria->compare('guna_khusus', $this->guna_khusus, true);
        $criteria->compare('tgl_mati_uji', $this->tgl_mati_uji, true);
        $criteria->compare('no_telp', $this->no_telp, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VKendaraan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getDataKendaraan($noUjiKendaraan) {
        $noUjiKendaraan = strtolower($noUjiKendaraan);
        $criteria = new CDbCriteria;
        $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%".$noUjiKendaraan."%'),' ','') "
                . "OR replace(LOWER(no_kendaraan),' ','') like replace(LOWER('".$noUjiKendaraan."'),' ','') "
                . "OR replace(LOWER(no_mesin),' ','') like replace(LOWER('".$noUjiKendaraan."'),' ','') "
                . "OR replace(LOWER(no_chasis),' ','') like replace(LOWER('".$noUjiKendaraan."'),' ',''))");
        $data = $this->find($criteria);
        return $data;
    }
}
