<?php

/**
 * This is the model class for table "tbl_riwayat".
 *
 * The followings are the available columns in table 'tbl_riwayat':
 * @property string $tgl_uji
 * @property string $tempat
 * @property string $catatan
 * @property string $nama_penguji
 * @property string $id_kendaraan
 * @property string $id_rekom
 * @property string $id_hasil_uji
 * @property string $id_riwayat
 * @property string $nrp
 * @property string $tempat_tujuan
 * @property boolean $cetak
 */
class TblRiwayat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_riwayat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tempat', 'length', 'max'=>30),
			array('catatan', 'length', 'max'=>100),
			array('nama_penguji', 'length', 'max'=>120),
			array('nrp, tempat_tujuan', 'length', 'max'=>50),
			array('tgl_uji, id_kendaraan, id_rekom, id_hasil_uji, cetak', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tgl_uji, tempat, catatan, nama_penguji, id_kendaraan, id_rekom, id_hasil_uji, id_riwayat, nrp, tempat_tujuan, cetak', 'safe', 'on'=>'search'),
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
			'tgl_uji' => 'Tgl Uji',
			'tempat' => 'Tempat',
			'catatan' => 'Catatan',
			'nama_penguji' => 'Nama Penguji',
			'id_kendaraan' => 'Id Kendaraan',
			'id_rekom' => 'Id Rekom',
			'id_hasil_uji' => 'Id Hasil Uji',
			'id_riwayat' => 'Id Riwayat',
			'nrp' => 'Nrp',
			'tempat_tujuan' => 'Tempat Tujuan',
			'cetak' => 'Cetak',
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

		$criteria->compare('tgl_uji',$this->tgl_uji,true);
		$criteria->compare('tempat',$this->tempat,true);
		$criteria->compare('catatan',$this->catatan,true);
		$criteria->compare('nama_penguji',$this->nama_penguji,true);
		$criteria->compare('id_kendaraan',$this->id_kendaraan,true);
		$criteria->compare('id_rekom',$this->id_rekom,true);
		$criteria->compare('id_hasil_uji',$this->id_hasil_uji,true);
		$criteria->compare('id_riwayat',$this->id_riwayat,true);
		$criteria->compare('nrp',$this->nrp,true);
		$criteria->compare('tempat_tujuan',$this->tempat_tujuan,true);
		$criteria->compare('cetak',$this->cetak);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblRiwayat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
