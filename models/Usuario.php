<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property int $perfil_id
 * @property string $login
 * @property string $senha
 * @property string $email
 * @property string $foto_url
 *
 * @property Ranking[] $rankings
 * @property Perfil $perfil
 * @property UsuarioBatalha[] $usuarioBatalhas
 * @property UsuarioTorneio[] $usuarioTorneios
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perfil_id'], 'default', 'value' => null],
            [['perfil_id'], 'integer'],
            [['login', 'senha'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 75],
            [['foto_url'], 'string', 'max' => 150],
            [['perfil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['perfil_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'perfil_id' => 'Perfil ID',
            'login' => 'Login',
            'senha' => 'Senha',
            'email' => 'Email',
            'foto_url' => 'Foto Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRankings()
    {
        return $this->hasMany(Ranking::className(), ['usuario_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['id' => 'perfil_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioBatalhas()
    {
        return $this->hasMany(UsuarioBatalha::className(), ['usuario_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioTorneios()
    {
        return $this->hasMany(UsuarioTorneio::className(), ['usuario_id' => 'id']);
    }
}
