<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modo_jogo".
 *
 * @property int $id
 * @property string $modo_jogo
 */
class ModoJogo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modo_jogo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modo_jogo'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modo_jogo' => 'Modo Jogo',
        ];
    }
}
