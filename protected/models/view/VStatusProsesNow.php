<?php

/**
 * This is the model class for table "v_status_proses_now".
 *
 * The followings are the available columns in table 'v_status_proses_now':
 * @property integer $no_antrian
 * @property string $id_hasil_uji
 * @property string $id_daftar
 * @property string $id_kendaraan
 * @property string $no_kendaraan
 * @property string $no_uji
 * @property string $nama_pemilik
 * @property boolean $prauji
 * @property boolean $lulus_prauji
 * @property boolean $smoke
 * @property boolean $lulus_smoke
 * @property boolean $pitlift
 * @property boolean $lulus_pitlift
 * @property boolean $lampu
 * @property boolean $lulus_lampu
 * @property boolean $break
 * @property boolean $lulus_break
 * @property string $ptgs_prauji
 * @property string $ptgs_smoke
 * @property string $ptgs_pitlift
 * @property string $ptgs_lampu
 * @property string $ptgs_break
 * @property boolean $hasil
 * @property boolean $cetak
 * @property string $jselesai
 * @property string $tgl_mati_uji
 * @property string $jdatang
 * @property string $numerator
 * @property string $nm_penguji
 * @property string $nrp
 * @property double $no_tl
 * @property string $numerator_hari
 */
class VStatusProsesNow extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_status_proses_now';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_antrian', 'numerical', 'integerOnly'=>true),
			array('no_tl', 'numerical'),
			array('no_uji, ptgs_prauji, ptgs_smoke, ptgs_pitlift, ptgs_lampu, ptgs_break, nrp', 'length', 'max'=>30),
			array('nm_penguji', 'length', 'max'=>50),
			array('id_hasil_uji, id_daftar, id_kendaraan, no_kendaraan, nama_pemilik, prauji, lulus_prauji, smoke, lulus_smoke, pitlift, lulus_pitlift, lampu, lulus_lampu, break, lulus_break, hasil, cetak, jselesai, tgl_mati_uji, jdatang, numerator, numerator_hari', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('no_antrian, id_hasil_uji, id_daftar, id_kendaraan, no_kendaraan, no_uji, nama_pemilik, prauji, lulus_prauji, smoke, lulus_smoke, pitlift, lulus_pitlift, lampu, lulus_lampu, break, lulus_break, ptgs_prauji, ptgs_smoke, ptgs_pitlift, ptgs_lampu, ptgs_break, hasil, cetak, jselesai, tgl_mati_uji, jdatang, numerator, nm_penguji, nrp, no_tl, numerator_hari', 'safe', 'on'=>'search'),
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
			'no_antrian' => 'No Antrian',
			'id_hasil_uji' => 'Id Hasil Uji',
			'id_daftar' => 'Id Daftar',
			'id_kendaraan' => 'Id Kendaraan',
			'no_kendaraan' => 'No Kendaraan',
			'no_uji' => 'No Uji',
			'nama_pemilik' => 'Nama Pemilik',
			'prauji' => 'Prauji',
			'lulus_prauji' => 'Lulus Prauji',
			'smoke' => 'Smoke',
			'lulus_smoke' => 'Lulus Smoke',
			'pitlift' => 'Pitlift',
			'lulus_pitlift' => 'Lulus Pitlift',
			'lampu' => 'Lampu',
			'lulus_lampu' => 'Lulus Lampu',
			'break' => 'Break',
			'lulus_break' => 'Lulus Break',
			'ptgs_prauji' => 'Ptgs Prauji',
			'ptgs_smoke' => 'Ptgs Smoke',
			'ptgs_pitlift' => 'Ptgs Pitlift',
			'ptgs_lampu' => 'Ptgs Lampu',
			'ptgs_break' => 'Ptgs Break',
			'hasil' => 'Hasil',
			'cetak' => 'Cetak',
			'jselesai' => 'Jselesai',
			'tgl_mati_uji' => 'Tgl Mati Uji',
			'jdatang' => 'Jdatang',
			'numerator' => 'Numerator',
			'nm_penguji' => 'Nm Penguji',
			'nrp' => 'Nrp',
			'no_tl' => 'No Tl',
			'numerator_hari' => 'Numerator Hari',
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

		$criteria->compare('no_antrian',$this->no_antrian);
		$criteria->compare('id_hasil_uji',$this->id_hasil_uji,true);
		$criteria->compare('id_daftar',$this->id_daftar,true);
		$criteria->compare('id_kendaraan',$this->id_kendaraan,true);
		$criteria->compare('no_kendaraan',$this->no_kendaraan,true);
		$criteria->compare('no_uji',$this->no_uji,true);
		$criteria->compare('nama_pemilik',$this->nama_pemilik,true);
		$criteria->compare('prauji',$this->prauji);
		$criteria->compare('lulus_prauji',$this->lulus_prauji);
		$criteria->compare('smoke',$this->smoke);
		$criteria->compare('lulus_smoke',$this->lulus_smoke);
		$criteria->compare('pitlift',$this->pitlift);
		$criteria->compare('lulus_pitlift',$this->lulus_pitlift);
		$criteria->compare('lampu',$this->lampu);
		$criteria->compare('lulus_lampu',$this->lulus_lampu);
		$criteria->compare('break',$this->break);
		$criteria->compare('lulus_break',$this->lulus_break);
		$criteria->compare('ptgs_prauji',$this->ptgs_prauji,true);
		$criteria->compare('ptgs_smoke',$this->ptgs_smoke,true);
		$criteria->compare('ptgs_pitlift',$this->ptgs_pitlift,true);
		$criteria->compare('ptgs_lampu',$this->ptgs_lampu,true);
		$criteria->compare('ptgs_break',$this->ptgs_break,true);
		$criteria->compare('hasil',$this->hasil);
		$criteria->compare('cetak',$this->cetak);
		$criteria->compare('jselesai',$this->jselesai,true);
		$criteria->compare('tgl_mati_uji',$this->tgl_mati_uji,true);
		$criteria->compare('jdatang',$this->jdatang,true);
		$criteria->compare('numerator',$this->numerator,true);
		$criteria->compare('nm_penguji',$this->nm_penguji,true);
		$criteria->compare('nrp',$this->nrp,true);
		$criteria->compare('no_tl',$this->no_tl);
		$criteria->compare('numerator_hari',$this->numerator_hari,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VStatusProsesNow the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
