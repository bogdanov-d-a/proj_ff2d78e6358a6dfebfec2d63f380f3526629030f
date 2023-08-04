<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clipboard_copier_data".
 *
 * @property int $id
 * @property int $storage_id
 * @property string $name
 * @property string $value
 *
 * @property ClipboardCopierStorage $storage
 */
class ClipboardCopierData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clipboard_copier_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['storage_id', 'name', 'value'], 'required'],
            [['storage_id'], 'integer'],
            [['name', 'value'], 'string', 'max' => 255],
            [['storage_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClipboardCopierStorage::class, 'targetAttribute' => ['storage_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'storage_id' => 'Storage ID',
            'name' => 'Name',
            'value' => 'Value',
        ];
    }

    /**
     * Gets query for [[Storage]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStorage()
    {
        return $this->hasOne(ClipboardCopierStorage::class, ['id' => 'storage_id']);
    }
}
