<?php

/**
 * This is the model class for table "tbl_proses".
 *
 * The followings are the available columns in table 'tbl_proses':
 * @property string $id_proses
 * @property string $tgl_uji
 * @property string $ptgs_datang
 * @property string $ptgs_periksa
 * @property string $ptgs_ukur
 * @property string $id_daftar
 * @property string $ptgs_penyerahan
 * @property string $ptgs_daftar
 * @property string $ptgs_validasi
 * @property string $id_retribusi
 * @property string $ptgs_print_hasil
 * @property string $ptgs_banding
 * @property string $ptgs_stiker
 * @property string $ptgs_prauji
 * @property string $ptgs_smoke
 * @property string $ptgs_pitlift
 * @property string $ptgs_lampu
 * @property string $ptgs_break
 * @property string $jam_prauji
 * @property string $jam_smoke
 * @property string $jam_pitlift
 * @property string $jam_lampu
 * @property string $jam_break
 */
class TblProses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_proses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ptgs_datang, ptgs_periksa, ptgs_ukur, ptgs_penyerahan, ptgs_daftar, ptgs_validasi, ptgs_print_hasil, ptgs_banding, ptgs_stiker', 'length', 'max'=>30),
			array('ptgs_prauji, ptgs_smoke, ptgs_pitlift, ptgs_lampu, ptgs_break', 'length', 'max'=>100),
			array('tgl_uji, id_daftar, id_retribusi, jam_prauji, jam_smoke, jam_pitlift, jam_lampu, jam_break', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_proses, tgl_uji, ptgs_datang, ptgs_periksa, ptgs_ukur, id_daftar, ptgs_penyerahan, ptgs_daftar, ptgs_validasi, id_retribusi, ptgs_print_hasil, ptgs_banding, ptgs_stiker, ptgs_prauji, ptgs_smoke, ptgs_pitlift, ptgs_lampu, ptgs_break, jam_prauji, jam_smoke, jam_pitlift, jam_lampu, jam_break', 'safe', 'on'=>'search'),
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
			'id_proses' => 'Id Proses',
			'tgl_uji' => 'Tgl Uji',
			'ptgs_datang' => 'Ptgs Datang',
			'ptgs_periksa' => 'Ptgs Periksa',
			'ptgs_ukur' => 'Ptgs Ukur',
			'id_daftar' => 'Id Daftar',
			'ptgs_penyerahan' => 'Ptgs Penyerahan',
			'ptgs_daftar' => 'Ptgs Daftar',
			'ptgs_validasi' => 'Ptgs Validasi',
			'id_retribusi' => 'Id Retribusi',
			'ptgs_print_hasil' => 'Ptgs Print Hasil',
			'ptgs_banding' => 'Ptgs Banding',
			'ptgs_stiker' => 'Ptgs Stiker',
			'ptgs_prauji' => 'Ptgs Prauji',
			'ptgs_smoke' => 'Ptgs Smoke',
			'ptgs_pitlift' => 'Ptgs Pitlift',
			'ptgs_lampu' => 'Ptgs Lampu',
			'ptgs_break' => 'Ptgs Break',
			'jam_prauji' => 'Jam Prauji',
			'jam_smoke' => 'Jam Smoke',
			'jam_pitlift' => 'Jam Pitlift',
			'jam_lampu' => 'Jam Lampu',
			'jam_break' => 'Jam Break',
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

		$criteria->compare('id_proses',$this->id_proses,true);
		$criteria->compare('tgl_uji',$this->tgl_uji,true);
		$criteria->compare('ptgs_datang',$this->ptgs_datang,true);
		$criteria->compare('ptgs_periksa',$this->ptgs_periksa,true);
		$criteria->compare('ptgs_ukur',$this->ptgs_ukur,true);
		$criteria->compare('id_daftar',$this->id_daftar,true);
		$criteria->compare('ptgs_penyerahan',$this->ptgs_penyerahan,true);
		$criteria->compare('ptgs_daftar',$this->ptgs_daftar,true);
		$criteria->compare('ptgs_validasi',$this->ptgs_validasi,true);
		$criteria->compare('id_retribusi',$this->id_retribusi,true);
		$criteria->compare('ptgs_print_hasil',$this->ptgs_print_hasil,true);
		$criteria->compare('ptgs_banding',$this->ptgs_banding,true);
		$criteria->compare('ptgs_stiker',$this->ptgs_stiker,true);
		$criteria->compare('ptgs_prauji',$this->ptgs_prauji,true);
		$criteria->compare('ptgs_smoke',$this->ptgs_smoke,true);
		$criteria->compare('ptgs_pitlift',$this->ptgs_pitlift,true);
		$criteria->compare('ptgs_lampu',$this->ptgs_lampu,true);
		$criteria->compare('ptgs_break',$this->ptgs_break,true);
		$criteria->compare('jam_prauji',$this->jam_prauji,true);
		$criteria->compare('jam_smoke',$this->jam_smoke,true);
		$criteria->compare('jam_pitlift',$this->jam_pitlift,true);
		$criteria->compare('jam_lampu',$this->jam_lampu,true);
		$criteria->compare('jam_break',$this->jam_break,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblProses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
