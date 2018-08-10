<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "torneio".
 *
 * @property int $id
 * @property int $modo_jogo_id
 * @property int $sessao_id
 * @property string $data_inicio
 * @property string $data_fim
 * @property string $regras
 * @property string $banner
 *
 * @property Batalha[] $batalhas
 * @property UsuarioTorneio[] $usuarioTorneios
 */
class Torneio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'torneio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modo_jogo_id', 'sessao_id'], 'default', 'value' => null],
            [['modo_jogo_id', 'sessao_id'], 'integer'],
            [['data_inicio', 'data_fim'], 'safe'],
            [['regras'], 'string', 'max' => 200],
            [['banner'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modo_jogo_id' => 'Modo Jogo ID',
            'sessao_id' => 'Sessao ID',
            'data_inicio' => 'Data Inicio',
            'data_fim' => 'Data Fim',
            'regras' => 'Regras',
            'banner' => 'Banner',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatalhas()
    {
        return $this->hasMany(Batalha::className(), ['torneio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioTorneios()
    {
        return $this->hasMany(UsuarioTorneio::className(), ['torneio_id' => 'id']);
    }
}
