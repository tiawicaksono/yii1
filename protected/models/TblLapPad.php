<?php

/**
 * This is the model class for table "tbl_lap_pad".
 *
 * The followings are the available columns in table 'tbl_lap_pad':
 * @property string $tgl_pad
 * @property string $b_daftar
 * @property string $b_buku
 * @property string $b_denda
 * @property integer $jum_kend
 * @property integer $no_sts
 * @property string $stts_kirim
 */
class TblLapPad extends CActiveRecord {

    public $total_bdaftar;
    public $total_bbuku;
    public $total_bdenda;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_lap_pad';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('jum_kend, no_sts', 'numerical', 'integerOnly' => true),
            array('b_daftar, b_buku, b_denda, stts_kirim', 'length', 'max' => 30),
            array('tgl_pad', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('total_bdaftar,total_bbuku,total_bdenda,tgl_pad, b_daftar, b_buku, b_denda, jum_kend, no_sts, stts_kirim', 'safe', 'on' => 'search'),
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
            'tgl_pad' => 'Tgl Pad',
            'b_daftar' => 'B Daftar',
            'b_buku' => 'B Buku',
            'b_denda' => 'B Denda',
            'jum_kend' => 'Jum Kend',
            'no_sts' => 'No Sts',
            'stts_kirim' => 'Stts Kirim',
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

        $criteria->compare('tgl_pad', $this->tgl_pad, true);
        $criteria->compare('b_daftar', $this->b_daftar, true);
        $criteria->compare('b_buku', $this->b_buku, true);
        $criteria->compare('b_denda', $this->b_denda, true);
        $criteria->compare('jum_kend', $this->jum_kend);
        $criteria->compare('no_sts', $this->no_sts);
        $criteria->compare('stts_kirim', $this->stts_kirim, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblLapPad the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function totalRetribusiPerHari($tgl) {
        $query = "SELECT (b_jbb_kurang::numeric)+(b_jbb_lebih::numeric)+(b_denda::numeric)+(b_buku::numeric)+(b_buku_hilang::numeric)+(b_buku_rusak::numeric)+(b_plat_uji::numeric)+(b_tanda_uji::numeric)+(b_rekom::numeric)+(b_gandengan_tempelan::numeric) as total FROM tbl_lap_pad WHERE "
                . "tgl_pad = TO_DATE('" . $tgl . "', 'DD-Mon-YY')";
        return Yii::app()->db->createCommand($query)->queryRow();
    }
    
    public function totalKendaraanPerHari($tgl){
        $query = "SELECT jum_kend as total FROM tbl_lap_pad WHERE tgl_pad = TO_DATE('" . $tgl . "', 'DD-Mon-YY')";
        return Yii::app()->db->createCommand($query)->queryRow();
    }
}
