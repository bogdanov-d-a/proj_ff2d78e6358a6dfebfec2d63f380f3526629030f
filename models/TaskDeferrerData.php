<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task_deferrer_data".
 *
 * @property int $id
 * @property int $storage_id
 * @property string $text
 * @property string $date
 * @property int $defer_days
 *
 * @property TaskDeferrerStorage $storage
 */
class TaskDeferrerData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_deferrer_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['storage_id', 'text', 'date', 'defer_days'], 'required'],
            [['storage_id', 'defer_days'], 'integer'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['storage_id'], 'exist', 'skipOnError' => true, 'targetClass' => TaskDeferrerStorage::class, 'targetAttribute' => ['storage_id' => 'id']],
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
            'text' => 'Text',
            'date' => 'Date',
            'defer_days' => 'Defer Days',
        ];
    }

    /**
     * Gets query for [[Storage]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStorage()
    {
        return $this->hasOne(TaskDeferrerStorage::class, ['id' => 'storage_id']);
    }
}
