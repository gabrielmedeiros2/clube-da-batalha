<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "batalha".
 *
 * @property int $id
 * @property int $torneio_id
 * @property string $placar
 * @property string $replay
 * @property int $wo
 * @property int $round
 *
 * @property Torneio $torneio
 * @property Destaque[] $destaques
 * @property UsuarioBatalha[] $usuarioBatalhas
 */
class Batalha extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'batalha';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['torneio_id', 'wo', 'round'], 'default', 'value' => null],
            [['torneio_id', 'wo', 'round'], 'integer'],
            [['placar'], 'string', 'max' => 3],
            [['replay'], 'string', 'max' => 30],
            [['torneio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Torneio::className(), 'targetAttribute' => ['torneio_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'torneio_id' => 'Torneio ID',
            'placar' => 'Placar',
            'replay' => 'Replay',
            'wo' => 'Wo',
            'round' => 'Round',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTorneio()
    {
        return $this->hasOne(Torneio::className(), ['id' => 'torneio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDestaques()
    {
        return $this->hasMany(Destaque::className(), ['batalha_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioBatalhas()
    {
        return $this->hasMany(UsuarioBatalha::className(), ['batalha_id' => 'id']);
    }
}
