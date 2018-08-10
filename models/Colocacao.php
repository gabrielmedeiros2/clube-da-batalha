<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "colocacao".
 *
 * @property int $id
 * @property string $nome_colocacao
 *
 * @property UsuarioTorneio[] $usuarioTorneios
 */
class Colocacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'colocacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_colocacao'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome_colocacao' => 'Nome Colocacao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioTorneios()
    {
        return $this->hasMany(UsuarioTorneio::className(), ['colocacao_id' => 'id']);
    }
}
