<?php

/**
 * This is the model class for table "tbl_uji".
 *
 * The followings are the available columns in table 'tbl_uji':
 * @property string $id_uji
 * @property string $nm_uji
 * @property integer $b_daftar
 * @property integer $b_tlt_daftar
 * @property integer $b_tlt_uji
 * @property integer $b_lulus
 * @property integer $b_tnd
 * @property integer $b_buku
 * @property integer $b_rusak
 */
class TblUji extends CActiveRecord
{

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_uji';
    }

    public function primaryKey()
    {
        return array('id_uji');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('b_daftar, b_tlt_daftar, b_tlt_uji, b_lulus, b_tnd, b_buku, b_rusak', 'numerical', 'integerOnly' => true),
            array('nm_uji', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_uji, nm_uji, b_daftar, b_tlt_daftar, b_tlt_uji, b_lulus, b_tnd, b_buku, b_rusak', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id_uji' => 'Id Uji',
            'nm_uji' => 'Nm Uji',
            'b_daftar' => 'B Daftar',
            'b_tlt_daftar' => 'B Tlt Daftar',
            'b_tlt_uji' => 'B Tlt Uji',
            'b_lulus' => 'B Lulus',
            'b_tnd' => 'B Tnd',
            'b_buku' => 'B Buku',
            'b_rusak' => 'B Rusak',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id_uji', $this->id_uji, true);
        $criteria->compare('nm_uji', $this->nm_uji, true);
        $criteria->compare('b_daftar', $this->b_daftar);
        $criteria->compare('b_tlt_daftar', $this->b_tlt_daftar);
        $criteria->compare('b_tlt_uji', $this->b_tlt_uji);
        $criteria->compare('b_lulus', $this->b_lulus);
        $criteria->compare('b_tnd', $this->b_tnd);
        $criteria->compare('b_buku', $this->b_buku);
        $criteria->compare('b_rusak', $this->b_rusak);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblUji the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function getPemakaianBukuUji()
    {
        $criteria = new CDbCriteria();
        $criteria->addInCondition('id_uji', array(1, 4, 5, 7, 8));
        $criteria->order = "id_uji ASC";
        $dataUji = $this->findAll($criteria);
        return $dataUji;
    }

    public function getUjiReribusi()
    {
        $criteria_uji = new CDbCriteria();
        // $criteria_uji->addNotInCondition('id_uji', array(9, 20));
        $criteria_uji->addCondition('urut <> 0');
        $criteria_uji->order = 'urut asc';
        $tbl_uji = $this->findAll($criteria_uji);
        return $tbl_uji;
    }

    public function getEditRetribusi()
    {
        $criteria_uji = new CDbCriteria();
        $criteria_uji->addNotInCondition('id_uji', array(9, 20));
        $criteria_uji->order = 'nm_uji asc';
        $tbl_uji = $this->findAll($criteria_uji);
        return $tbl_uji;
    }
}
