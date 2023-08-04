<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clipboard_copier_storage".
 *
 * @property int $id
 * @property string $name
 *
 * @property ClipboardCopierData[] $clipboardCopierDatas
 */
class ClipboardCopierStorage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clipboard_copier_storage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[ClipboardCopierDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClipboardCopierDatas()
    {
        return $this->hasMany(ClipboardCopierData::class, ['storage_id' => 'id']);
    }
}
