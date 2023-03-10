<?php

namespace app\components;
use app\models\SyncConfig;
use yii\db\Connection;
use yii\db\Exception;

class DynamicConnection
{
    /**
     * @param $model
     * @param $dbname
     * @return Connection
     */
    public static function getConnection($model, $dbname): Connection
    {
        $dsn = SyncConfig::DB_TYPE[$model->dbType].":host=".$model->host .";dbname=".$dbname;
        return new Connection(['dsn' => $dsn, 'username' => $model->username, 'password' => $model->password]);
    }

    public static function getConnectionByModel($model)
    {
        try {
            $dsn = SyncConfig::DB_TYPE[$model->dbType].":host=".$model->host .";dbname=".$model->dbname;
            return new Connection(['dsn' => $dsn, 'username' => $model->username, 'password' => $model->password,]);
        } catch (Exception $e) {
            echo "Connection Error: ". $e->getMessage();
            return false;
        }
    }

}