<?php

/**
 * This is the model class for table "tbl_req_bukuuji".
 *
 * The followings are the available columns in table 'tbl_req_bukuuji':
 * @property integer $id_req
 * @property string $no_seri_awal
 * @property string $no_seri_akhir
 * @property string $jumlah
 * @property string $tgl_pengajuan
 * @property string $tgl_approve
 * @property integer $status_pengajuan
 * @property integer $status_approval
 */
class TblReqBukuuji extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_req_bukuuji';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('status_pengajuan, status_approval', 'numerical', 'integerOnly' => true),
            array('no_seri_awal, no_seri_akhir', 'length', 'max' => 100),
            array('jumlah, tgl_pengajuan, tgl_approve', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_req, no_seri_awal, no_seri_akhir, jumlah, tgl_pengajuan, tgl_approve, status_pengajuan, status_approval', 'safe', 'on' => 'search'),
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
            'id_req' => 'Id Req',
            'no_seri_awal' => 'No Seri Awal',
            'no_seri_akhir' => 'No Seri Akhir',
            'jumlah' => 'Jumlah',
            'tgl_pengajuan' => 'Tgl Pengajuan',
            'tgl_approve' => 'Tgl Approve',
            'status_pengajuan' => 'Status Pengajuan',
            'status_approval' => 'Status Approval',
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

        $criteria->compare('id_req', $this->id_req);
        $criteria->compare('no_seri_awal', $this->no_seri_awal, true);
        $criteria->compare('no_seri_akhir', $this->no_seri_akhir, true);
        $criteria->compare('jumlah', $this->jumlah, true);
        $criteria->compare('tgl_pengajuan', $this->tgl_pengajuan, true);
        $criteria->compare('tgl_approve', $this->tgl_approve, true);
        $criteria->compare('status_pengajuan', $this->status_pengajuan);
        $criteria->compare('status_approval', $this->status_approval);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblReqBukuuji the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
