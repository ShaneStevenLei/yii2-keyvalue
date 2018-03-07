<?php
namespace stevenlei\keyvalue\models;

use Yii;
use yii\base\UserException;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "key_value".
 *
 * @property int    $id              主键
 * @property string $key             键
 * @property string $value           值
 * @property string $memo            备注
 * @property string $status          状态：active-激活，inactive-未激活
 * @property int    $created_user_id 创建人员
 * @property int    $updated_user_id 更新人员
 * @property string $created_at      创建时间
 * @property string $updated_at      更新时间
 */
class KeyValue extends ActiveRecord
{
    const STATUS_ACTIVE   = 'active';
    const STATUS_INACTIVE = 'inactive';

    const EXPIRES_TIMES = 60 * 60 * 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'key_value';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'created_user_id', 'updated_user_id'], 'required'],
            [['value', 'memo', 'status'], 'string'],
            [['created_user_id', 'updated_user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['key'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'              => '主键',
            'key'             => '键',
            'value'           => '值',
            'memo'            => '备注',
            'status'          => '状态：active-激活，inactive-未激活',
            'created_user_id' => '创建人员',
            'updated_user_id' => '更新人员',
            'created_at'      => '创建时间',
            'updated_at'      => '更新时间',
        ];
    }

    /**
     * @param string $key
     *
     * @return string
     */
    public static function getCacheKey($key)
    {
        return 'KV_' . $key;
    }

    public static function getValue($key, $isThrowException = true)
    {
        $cacheKey = self::getCacheKey($key);
        $value    = Yii::$app->cache->get($cacheKey);
        if (!$value) {
            $kv = self::findOne([
                'key'    => $key,
                'status' => self::STATUS_ACTIVE,
            ]);

            if (!$kv) {
                if ($isThrowException) {
                    throw new UserException(sprintf("Key '%s' is not found!", $key));
                } else {
                    return null;
                }
            }

            Yii::$app->cache->set($cacheKey, $kv->value, self::EXPIRES_TIMES);
            $jsonValue = json_decode($kv->value);

            return is_null($jsonValue) ? trim($kv->value) : $jsonValue;
        } else {
            $jsonValue = json_decode($value);

            return is_null($jsonValue) ? trim($value) : $jsonValue;
        }
    }

    /**
     * @param string $key
     * @param bool   $isThrowException
     *
     * @return mixed|null|string
     * @throws \yii\base\UserException
     */
    public static function getValueAsArray($key, $isThrowException = true)
    {
        $cacheKey = self::getCacheKey($key);
        $value    = Yii::$app->cache->get($cacheKey);
        if (!$value) {
            $kv = self::findOne([
                'key'    => $key,
                'status' => self::STATUS_ACTIVE,
            ]);

            if (!$kv) {
                if ($isThrowException) {
                    throw new UserException(sprintf("Key '%s' is not found!", $key));
                } else {
                    return null;
                }
            }

            Yii::$app->cache->set($cacheKey, $kv->value, 60 * 60 * 2);
            $jsonValue = json_decode($kv->value, true);

            return is_null($jsonValue) ? trim($kv->value) : $jsonValue;
        } else {
            $jsonValue = json_decode($value, true);

            return is_null($jsonValue) ? trim($value) : $jsonValue;
        }
    }
}
