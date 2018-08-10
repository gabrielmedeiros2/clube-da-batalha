<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_batalha".
 *
 * @property int $id
 * @property int $usuario_id
 * @property int $batalha_id
 * @property int $vencedor
 *
 * @property Batalha $batalha
 * @property Usuario $usuario
 */
class UsuarioBatalha extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_batalha';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario_id', 'batalha_id', 'vencedor'], 'default', 'value' => null],
            [['usuario_id', 'batalha_id', 'vencedor'], 'integer'],
            [['batalha_id'], 'exist', 'skipOnError' => true, 'targetClass' => Batalha::className(), 'targetAttribute' => ['batalha_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario_id' => 'Usuario ID',
            'batalha_id' => 'Batalha ID',
            'vencedor' => 'Vencedor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatalha()
    {
        return $this->hasOne(Batalha::className(), ['id' => 'batalha_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id']);
    }
}
