<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "noticia".
 *
 * @property int $id
 * @property string $banner_url
 * @property string $data_publicacao
 */
class Noticia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noticia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data_publicacao'], 'safe'],
            [['banner_url'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'banner_url' => 'Banner Url',
            'data_publicacao' => 'Data Publicacao',
        ];
    }
}
