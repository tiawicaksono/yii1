<?php

/**
 * This is the model class for table "tbl_rekom".
 *
 * The followings are the available columns in table 'tbl_rekom':
 * @property string $id_kendaraan
 * @property string $tgl_rekom
 * @property string $pemilik_baru
 * @property string $alamat_baru
 * @property string $id_riwayat
 * @property string $id_retribusi
 * @property boolean $mutke
 * @property boolean $numke
 * @property boolean $mutmasuk
 * @property boolean $ubhsifat
 * @property boolean $ubhbentuk
 * @property string $id_provinsi_mutke
 * @property string $id_kota_mutke
 * @property string $id_rekom
 * @property string $nik_baru
 * @property boolean $uji_pertama
 * @property string $ket_ubah_sifat
 * @property string $ket_ubah_bentuk
 * @property integer $no_surat_mutke
 * @property integer $no_surat_numke
 * @property integer $no_surat
 * @property string $id_provinsi_mutmas
 * @property string $id_kota_mutmas
 * @property string $id_provinsi_numke
 * @property string $id_kota_numke
 * @property string $no_rekom_mutmasuk
 * @property string $tgl_rekom_mutmas
 */
class TblRekom extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_rekom';
    }

    public function primaryKey() {
        return 'id_rekom';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('no_surat_mutke, no_surat_numke, no_surat', 'numerical', 'integerOnly' => true),
            array('pemilik_baru, nik_baru', 'length', 'max' => 100),
            array('id_provinsi_mutke, id_provinsi_mutmas, id_provinsi_numke', 'length', 'max' => 2),
            array('id_kota_mutke, id_kota_mutmas, id_kota_numke', 'length', 'max' => 4),
            array('id_kendaraan, tgl_rekom, alamat_baru, id_riwayat, id_retribusi, mutke, numke, mutmasuk, ubhsifat, ubhbentuk, uji_pertama, ket_ubah_sifat, ket_ubah_bentuk, no_rekom_mutmasuk, tgl_rekom_mutmas', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_kendaraan, tgl_rekom, pemilik_baru, alamat_baru, id_riwayat, id_retribusi, mutke, numke, mutmasuk, ubhsifat, ubhbentuk, id_provinsi_mutke, id_kota_mutke, id_rekom, nik_baru, uji_pertama, ket_ubah_sifat, ket_ubah_bentuk, no_surat_mutke, no_surat_numke, no_surat, id_provinsi_mutmas, id_kota_mutmas, id_provinsi_numke, id_kota_numke, no_rekom_mutmasuk, tgl_rekom_mutmas', 'safe', 'on' => 'search'),
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
            'id_kendaraan' => 'Id Kendaraan',
            'tgl_rekom' => 'Tgl Rekom',
            'pemilik_baru' => 'Pemilik Baru',
            'alamat_baru' => 'Alamat Baru',
            'id_riwayat' => 'Id Riwayat',
            'id_retribusi' => 'Id Retribusi',
            'mutke' => 'Mutke',
            'numke' => 'Numke',
            'mutmasuk' => 'Mutmasuk',
            'ubhsifat' => 'Ubhsifat',
            'ubhbentuk' => 'Ubhbentuk',
            'id_provinsi_mutke' => 'Id Provinsi Mutke',
            'id_kota_mutke' => 'Id Kota Mutke',
            'id_rekom' => 'Id Rekom',
            'nik_baru' => 'Nik Baru',
            'uji_pertama' => 'Uji Pertama',
            'ket_ubah_sifat' => 'Ket Ubah Sifat',
            'ket_ubah_bentuk' => 'Ket Ubah Bentuk',
            'no_surat_mutke' => 'No Surat Mutke',
            'no_surat_numke' => 'No Surat Numke',
            'no_surat' => 'No Surat',
            'id_provinsi_mutmas' => 'Id Provinsi Mutmas',
            'id_kota_mutmas' => 'Id Kota Mutmas',
            'id_provinsi_numke' => 'Id Provinsi Numke',
            'id_kota_numke' => 'Id Kota Numke',
            'no_rekom_mutmasuk' => 'No Rekom Mutmasuk',
            'tgl_rekom_mutmas' => 'Tgl Rekom Mutmas',
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

        $criteria->compare('id_kendaraan', $this->id_kendaraan, true);
        $criteria->compare('tgl_rekom', $this->tgl_rekom, true);
        $criteria->compare('pemilik_baru', $this->pemilik_baru, true);
        $criteria->compare('alamat_baru', $this->alamat_baru, true);
        $criteria->compare('id_riwayat', $this->id_riwayat, true);
        $criteria->compare('id_retribusi', $this->id_retribusi, true);
        $criteria->compare('mutke', $this->mutke);
        $criteria->compare('numke', $this->numke);
        $criteria->compare('mutmasuk', $this->mutmasuk);
        $criteria->compare('ubhsifat', $this->ubhsifat);
        $criteria->compare('ubhbentuk', $this->ubhbentuk);
        $criteria->compare('id_provinsi_mutke', $this->id_provinsi_mutke, true);
        $criteria->compare('id_kota_mutke', $this->id_kota_mutke, true);
        $criteria->compare('id_rekom', $this->id_rekom, true);
        $criteria->compare('nik_baru', $this->nik_baru, true);
        $criteria->compare('uji_pertama', $this->uji_pertama);
        $criteria->compare('ket_ubah_sifat', $this->ket_ubah_sifat, true);
        $criteria->compare('ket_ubah_bentuk', $this->ket_ubah_bentuk, true);
        $criteria->compare('no_surat_mutke', $this->no_surat_mutke);
        $criteria->compare('no_surat_numke', $this->no_surat_numke);
        $criteria->compare('no_surat', $this->no_surat);
        $criteria->compare('id_provinsi_mutmas', $this->id_provinsi_mutmas, true);
        $criteria->compare('id_kota_mutmas', $this->id_kota_mutmas, true);
        $criteria->compare('id_provinsi_numke', $this->id_provinsi_numke, true);
        $criteria->compare('id_kota_numke', $this->id_kota_numke, true);
        $criteria->compare('no_rekom_mutmasuk', $this->no_rekom_mutmasuk, true);
        $criteria->compare('tgl_rekom_mutmas', $this->tgl_rekom_mutmas, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblRekom the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
