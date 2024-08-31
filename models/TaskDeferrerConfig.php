<?php

namespace app\models;

use app\helpers\Utils;
use DateTime;
use Yii;

/**
 * This is the model class for table "task_deferrer_config".
 *
 * @property int $id
 * @property string $key
 * @property string $value
 */
class TaskDeferrerConfig extends \yii\db\ActiveRecord
{
    public const KEY_TODAY = 'today';

    public static function today(): DateTime
    {
        return DateTime::createFromFormat(Utils::DATE_FORMAT, self::getValue(self::KEY_TODAY));
    }

    public static function getValue(string $key): string
    {
        return TaskDeferrerConfig::findOne(['key' => $key])->value;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_deferrer_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'value'], 'required'],
            [['key', 'value'], 'string', 'max' => 255],
            [['key'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
        ];
    }
}
