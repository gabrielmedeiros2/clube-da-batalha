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
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $repetirSenha;
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
            [['login', 'senha', 'email', 'repetirSenha'], 'required'],            
            [['perfil_id'], 'integer'],
            [['login', 'senha'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 75],
            [['email'], 'email'],
            [['foto_url'], 'string', 'max' => 150],
            [['perfil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['perfil_id' => 'id']],
            [['senha'], 'compare', 'compareAttribute'=>'repetirSenha']
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
            'repetirSenha' => 'Repita sua senha'
        ];
    }

    public function afterValidate() {
        $this->senha = strtoupper(md5($this->senha));
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
    
    //Autenticação
    
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $usuario = Usuario::findOne(['id'=>$id]);        
        return isset($usuario) ? new static($usuario) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $usuario = Usuario::find()->all();
        foreach ($usuario as $user) {
            if (strcasecmp($user->login, $username) === 0) {                
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return false;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->senha === strtoupper(md5($password));
    }
}
