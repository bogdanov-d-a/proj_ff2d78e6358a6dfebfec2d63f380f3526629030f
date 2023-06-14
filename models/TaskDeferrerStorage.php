<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task_deferrer_storage".
 *
 * @property int $id
 * @property string $name
 *
 * @property TaskDeferrerData[] $taskDeferrerDatas
 */
class TaskDeferrerStorage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_deferrer_storage';
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
     * Gets query for [[TaskDeferrerDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTaskDeferrerDatas()
    {
        return $this->hasMany(TaskDeferrerData::class, ['storage_id' => 'id']);
    }
}
