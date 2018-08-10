<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "secao".
 *
 * @property int $id
 * @property string $nome_secao
 */
class Secao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'secao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_secao'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome_secao' => 'Nome Secao',
        ];
    }
}
