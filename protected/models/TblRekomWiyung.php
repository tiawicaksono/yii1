<?php

/**
 * This is the model class for table "tbl_rekom".
 *
 * The followings are the available columns in table 'tbl_rekom':
 * @property string $id_kendaraan
 * @property string $tgl_rekom
 * @property string $pemilik_baru
 * @property string $alamat_baru
 * @property string $keterangan
 * @property string $id_riwayat
 * @property string $id_retribusi
 * @property boolean $mutke
 * @property boolean $numke
 * @property boolean $lprusak
 * @property boolean $ubhsifat
 * @property boolean $proses
 * @property string $nosurat
 * @property string $tempat
 * @property string $tmp_tujuan
 * @property string $id_rekom
 * @property string $kd_kota
 * @property string $nik_baru
 * @property string $confirm
 * @property boolean $disetujui
 */
class TblRekom extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_rekom';
    }
    
    public function primaryKey() {
        return array('id_rekom');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pemilik_baru, nik_baru', 'length', 'max' => 100),
            array('alamat_baru', 'length', 'max' => 200),
            array('kd_kota', 'length', 'max' => 30),
            array('confirm', 'length', 'max' => 20),
            array('id_kendaraan, tgl_rekom, keterangan, id_riwayat, id_retribusi, mutke, numke, lprusak, ubhsifat, proses, nosurat, tempat, tmp_tujuan, disetujui', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_kendaraan, tgl_rekom, pemilik_baru, alamat_baru, keterangan, id_riwayat, id_retribusi, mutke, numke, lprusak, ubhsifat, proses, nosurat, tempat, tmp_tujuan, id_rekom, kd_kota, nik_baru, confirm, disetujui', 'safe', 'on' => 'search'),
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
            'keterangan' => 'Keterangan',
            'id_riwayat' => 'Id Riwayat',
            'id_retribusi' => 'Id Retribusi',
            'mutke' => 'Mutke',
            'numke' => 'Numke',
            'lprusak' => 'Lprusak',
            'ubhsifat' => 'Ubhsifat',
            'proses' => 'Proses',
            'nosurat' => 'Nosurat',
            'tempat' => 'Tempat',
            'tmp_tujuan' => 'Tmp Tujuan',
            'id_rekom' => 'Id Rekom',
            'kd_kota' => 'Kd Kota',
            'nik_baru' => 'Nik Baru',
            'confirm' => 'Confirm',
            'disetujui' => 'Disetujui',
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
        $criteria->compare('keterangan', $this->keterangan, true);
        $criteria->compare('id_riwayat', $this->id_riwayat, true);
        $criteria->compare('id_retribusi', $this->id_retribusi, true);
        $criteria->compare('mutke', $this->mutke);
        $criteria->compare('numke', $this->numke);
        $criteria->compare('lprusak', $this->lprusak);
        $criteria->compare('ubhsifat', $this->ubhsifat);
        $criteria->compare('proses', $this->proses);
        $criteria->compare('nosurat', $this->nosurat, true);
        $criteria->compare('tempat', $this->tempat, true);
        $criteria->compare('tmp_tujuan', $this->tmp_tujuan, true);
        $criteria->compare('id_rekom', $this->id_rekom, true);
        $criteria->compare('kd_kota', $this->kd_kota, true);
        $criteria->compare('nik_baru', $this->nik_baru, true);
        $criteria->compare('confirm', $this->confirm, true);
        $criteria->compare('disetujui', $this->disetujui);

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
