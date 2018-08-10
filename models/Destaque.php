<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "destaque".
 *
 * @property int $id
 * @property int $batalha_id
 * @property string $data_destaque
 * @property string $comentario
 * @property string $banner_url
 *
 * @property Batalha $batalha
 */
class Destaque extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'destaque';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['batalha_id'], 'default', 'value' => null],
            [['batalha_id'], 'integer'],
            [['data_destaque'], 'safe'],
            [['comentario'], 'string', 'max' => 500],
            [['banner_url'], 'string', 'max' => 250],
            [['batalha_id'], 'exist', 'skipOnError' => true, 'targetClass' => Batalha::className(), 'targetAttribute' => ['batalha_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'batalha_id' => 'Batalha ID',
            'data_destaque' => 'Data Destaque',
            'comentario' => 'Comentario',
            'banner_url' => 'Banner Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatalha()
    {
        return $this->hasOne(Batalha::className(), ['id' => 'batalha_id']);
    }
}
