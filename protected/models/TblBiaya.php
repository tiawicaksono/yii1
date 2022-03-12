<?php

/**
 * This is the model class for table "tbl_biaya".
 *
 * The followings are the available columns in table 'tbl_biaya':
 * @property integer $id_biaya
 * @property double $b_pertama
 * @property double $b_penetapan_lulus_uji
 * @property double $b_plat_uji
 * @property double $b_tnd_samping
 * @property double $b_buku
 * @property double $b_mutasi_keluar
 * @property double $b_numpang_uji
 * @property double $b_ubah_sifat_fungsi
 * @property double $b_ubah_bentuk
 * @property double $b_admin
 * @property double $b_tlt_uji
 * @property double $b_tlt_daftar
 */
class TblBiaya extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_biaya';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('b_pertama, b_penetapan_lulus_uji, b_plat_uji, b_tnd_samping, b_buku, b_mutasi_keluar, b_numpang_uji, b_ubah_sifat_fungsi, b_ubah_bentuk, b_admin, b_tlt_uji, b_tlt_daftar', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_biaya, b_pertama, b_penetapan_lulus_uji, b_plat_uji, b_tnd_samping, b_buku, b_mutasi_keluar, b_numpang_uji, b_ubah_sifat_fungsi, b_ubah_bentuk, b_admin, b_tlt_uji, b_tlt_daftar', 'safe', 'on'=>'search'),
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
			'id_biaya' => 'Id Biaya',
			'b_pertama' => 'B Pertama',
			'b_penetapan_lulus_uji' => 'B Penetapan Lulus Uji',
			'b_plat_uji' => 'B Plat Uji',
			'b_tnd_samping' => 'B Tnd Samping',
			'b_buku' => 'B Buku',
			'b_mutasi_keluar' => 'B Mutasi Keluar',
			'b_numpang_uji' => 'B Numpang Uji',
			'b_ubah_sifat_fungsi' => 'B Ubah Sifat Fungsi',
			'b_ubah_bentuk' => 'B Ubah Bentuk',
			'b_admin' => 'B Admin',
			'b_tlt_uji' => 'B Tlt Uji',
			'b_tlt_daftar' => 'B Tlt Daftar',
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

		$criteria->compare('id_biaya',$this->id_biaya);
		$criteria->compare('b_pertama',$this->b_pertama);
		$criteria->compare('b_penetapan_lulus_uji',$this->b_penetapan_lulus_uji);
		$criteria->compare('b_plat_uji',$this->b_plat_uji);
		$criteria->compare('b_tnd_samping',$this->b_tnd_samping);
		$criteria->compare('b_buku',$this->b_buku);
		$criteria->compare('b_mutasi_keluar',$this->b_mutasi_keluar);
		$criteria->compare('b_numpang_uji',$this->b_numpang_uji);
		$criteria->compare('b_ubah_sifat_fungsi',$this->b_ubah_sifat_fungsi);
		$criteria->compare('b_ubah_bentuk',$this->b_ubah_bentuk);
		$criteria->compare('b_admin',$this->b_admin);
		$criteria->compare('b_tlt_uji',$this->b_tlt_uji);
		$criteria->compare('b_tlt_daftar',$this->b_tlt_daftar);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblBiaya the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
