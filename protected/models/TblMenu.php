<?php

/**
 * This is the model class for table "tbl_menu".
 *
 * The followings are the available columns in table 'tbl_menu':
 * @property integer $menu_id
 * @property string $menu_label
 * @property string $menu_link
 * @property string $condition
 * @property integer $parent_id
 * @property integer $menu_status
 * @property string $menu_icon
 * @property string $menu_parameter
 * @property integer $menu_sort
 * @property string $menu_condition
 */
class TblMenu extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_menu';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('parent_id, menu_status, menu_sort', 'numerical', 'integerOnly' => true),
            array('menu_label, menu_link, condition, menu_icon', 'length', 'max' => 100),
            array('menu_parameter', 'length', 'max' => 20),
            array('menu_condition', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('menu_id, menu_label, menu_link, condition, parent_id, menu_status, menu_icon, menu_parameter, menu_sort, menu_condition', 'safe', 'on' => 'search'),
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
            'menu_id' => 'Menu',
            'menu_label' => 'Menu Label',
            'menu_link' => 'Menu Link',
            'condition' => 'Condition',
            'parent_id' => 'Parent',
            'menu_status' => 'Menu Status',
            'menu_icon' => 'Menu Icon',
            'menu_parameter' => 'Menu Parameter',
            'menu_sort' => 'Menu Sort',
            'menu_condition' => 'Menu Condition',
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

        $criteria->compare('menu_id', $this->menu_id);
        $criteria->compare('menu_label', $this->menu_label, true);
        $criteria->compare('menu_link', $this->menu_link, true);
        $criteria->compare('condition', $this->condition, true);
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('menu_status', $this->menu_status);
        $criteria->compare('menu_icon', $this->menu_icon, true);
        $criteria->compare('menu_parameter', $this->menu_parameter, true);
        $criteria->compare('menu_sort', $this->menu_sort);
        $criteria->compare('menu_condition', $this->menu_condition, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblMenu the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getMenu() {
        $criteriaMenu = new CDbCriteria();
        $criteriaMenu->order = 'menu_sort ASC';
        $criteriaMenu->addInCondition('parent_id', array(0));
        $criteriaMenu->addInCondition('menu_status', array(1));
        $findAllMenu = $this->findAll($criteriaMenu);
        foreach ($findAllMenu as $dataMenu) {
            if ($dataMenu->menu_condition != NULL) {
                $conditionMenu = $dataMenu->menu_condition;
            } else {
                $result["menu"][$dataMenu->menu_id] = $dataMenu;
                $conditionMenu = NULL;
            }
            $evalMenu = sprintf("return(%s);", $conditionMenu);
            if (eval($evalMenu)) {
                $result["menu"][$dataMenu->menu_id] = $dataMenu;
            } else {
                $result["menu"][$dataMenu->menu_id] = $dataMenu;
            }
            $criteriaSubMenu = new CDbCriteria();
            $criteriaSubMenu->order = 'menu_sort ASC';
            $criteriaSubMenu->addInCondition('parent_id', array($dataMenu->menu_id));
            $criteriaSubMenu->addInCondition('menu_status', array(1));
            $findAllSubMenu = $this->findAll($criteriaSubMenu);
            foreach ($findAllSubMenu as $dataSubMenu):
                $result["sub_menu"][$dataMenu->menu_id][] = $dataSubMenu;
            endforeach;
        }
        return $result;
    }

}
