<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_torneio".
 *
 * @property int $id
 * @property int $torneio_id
 * @property int $usuario_id
 * @property int $colocacao_id
 *
 * @property Colocacao $colocacao
 * @property Torneio $torneio
 * @property Usuario $usuario
 */
class UsuarioTorneio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_torneio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['torneio_id', 'usuario_id', 'colocacao_id'], 'default', 'value' => null],
            [['torneio_id', 'usuario_id', 'colocacao_id'], 'integer'],
            [['colocacao_id'], 'exist', 'skipOnError' => true, 'targetClass' => Colocacao::className(), 'targetAttribute' => ['colocacao_id' => 'id']],
            [['torneio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Torneio::className(), 'targetAttribute' => ['torneio_id' => 'id']],
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
            'torneio_id' => 'Torneio ID',
            'usuario_id' => 'Usuario ID',
            'colocacao_id' => 'Colocacao ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColocacao()
    {
        return $this->hasOne(Colocacao::className(), ['id' => 'colocacao_id']);
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
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id']);
    }
}
