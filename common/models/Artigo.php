<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "artigo".
 *
 * @property integer $idartigo
 * @property string $categoria
 * @property string $nome
 * @property string $conteudo
 *
 * @property Imagem[] $imagems
 */
class Artigo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artigo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idartigo', 'categoria', 'nome', 'conteudo'], 'required'],
            [['idartigo'], 'integer'],
            [['conteudo'], 'string'],
            [['categoria', 'nome'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idartigo' => 'Idartigo',
            'categoria' => 'Categoria',
            'nome' => 'Nome',
            'conteudo' => 'Conteudo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagems()
    {
        return $this->hasMany(Imagem::className(), ['idArtigoAQuePertence' => 'idartigo']);
    }
}
