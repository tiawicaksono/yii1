<?php

/**
 * This is the model class for table "tbl_buku".
 *
 * The followings are the available columns in table 'tbl_buku':
 * @property string $keterangan
 * @property string $petugas
 * @property string $id_retribusi
 * @property string $no_seri
 * @property boolean $cetak
 * @property string $tgl_cetak
 * @property string $id_buku
 */
class TblBuku extends CActiveRecord {

    public $no_kendaraan;
    public $no_uji;
    public $merk;
    public $tahun;
    public $umum;
    public $nm_komersil;
    public $jumlah;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_buku';
    }

    public function primaryKey() {
        return array('id_buku');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('keterangan, petugas', 'length', 'max' => 50),
            array('no_seri', 'length', 'max' => 30),
            array('id_retribusi, cetak, tgl_cetak', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('jumlah, umum, nm_komersil, merk, tahun, no_kendaraan, no_uji, keterangan, petugas, id_retribusi, no_seri, cetak, tgl_cetak, id_buku', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'retribusi_rel' => array(self::BELONGS_TO, 'TblRetribusi', 'id_retribusi')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'keterangan' => 'Keterangan',
            'petugas' => 'Petugas',
            'id_retribusi' => 'Id Retribusi',
            'no_seri' => 'No Seri',
            'cetak' => 'Cetak',
            'tgl_cetak' => 'Tgl Cetak',
            'id_buku' => 'Id Buku',
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

        $criteria->compare('keterangan', $this->keterangan, true);
        $criteria->compare('petugas', $this->petugas, true);
        $criteria->compare('id_retribusi', $this->id_retribusi, true);
        $criteria->compare('no_seri', $this->no_seri, true);
        $criteria->compare('cetak', $this->cetak);
        $criteria->compare('tgl_cetak', $this->tgl_cetak, true);
        $criteria->compare('id_buku', $this->id_buku, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblBuku the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function criteriaCountBukuUji($tgl) {
        $criteria = new CDbCriteria();
//        $criteria->with = array('retribusi_rel','retribusi_rel.kendaraan_rel');
        $criteria->join = "JOIN tbl_retribusi tr USING(id_retribusi) JOIN tbl_kendaraan tk USING(id_kendaraan) JOIN tbl_type tt USING(id_kendaraan)";
        $criteria->addCondition("tgl_cetak = TO_DATE('" . $tgl . "', 'DD-Mon-YY') ");
        $criteria->addInCondition('id_uji', array(1, 4, 5, 7, 8));
        $data = $this->count($criteria);
        return $data;
    }

    public function criteriaReportUjiPertama($tgl, $idUji) {
        $criteria = new CDbCriteria();
//        $criteria->with = array('retribusi_rel','retribusi_rel.kendaraan_rel');
        $criteria->join = "JOIN tbl_retribusi tr USING(id_retribusi) JOIN tbl_kendaraan tk USING(id_kendaraan) JOIN tbl_type tt USING(id_kendaraan)";
        $criteria->addCondition("tgl_cetak = TO_DATE('" . $tgl . "', 'DD-Mon-YY') ");
        $criteria->addInCondition("id_uji", array($idUji));
        return $criteria;
    }

    public function reportUjiPertama($tgl) {
        $criteria = $this->criteriaReportUjiPertama($tgl, 8);
        $criteria->select = "tk.no_kendaraan, tk.no_uji, tk.merk, tk.tahun, tk.umum, tt.nm_komersil";
        $criteria->order = "tk.no_uji ASC";
        $data = $this->findAll($criteria);
        return $data;
    }

    public function countReportUjiPertama($tgl) {
        $criteria = $this->criteriaReportUjiPertama($tgl, 8);
        $criteria->select = "REPLACE(tt.nm_komersil, ' ', '') AS nm_komersil, COUNT(tk.no_kendaraan) AS jumlah";
        $criteria->group = "tt.nm_komersil";
        $data = $this->findAll($criteria);
        return $data;
    }

}
