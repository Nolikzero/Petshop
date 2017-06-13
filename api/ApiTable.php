<?php
namespace api;

use lib\App;
use models\Model;

class ApiTable extends Api
{
    function exec($params = array())
    {
        // TODO: Implement exec() method.

        if (!isset($params['table'])) {
            throw new \Exception('Задайте поле table');
        }

        $id = null;

        if (isset($params['id']) && $params['id'] > 0) {
            $id = $params['id'];
        }

        /** @var Model $model */
        if(isset(App::$config['api']['route']['models'][$params['table']])) {
            $modelName = App::$config['api']['route']['models'][$params['table']];
            $model = new $modelName();
        }
        if (isset($model) && $model instanceof Model) {
            $sth = $model->find($id);
            if (empty($sth)) {
                if ($id) {
                    throw new \Exception('Записи с таким id не существует');
                } else {
                    throw new \Exception('Записей в данной таблице не найдено');
                }
            } else {
                return parent::result('', $sth);
            }
        } else {
            throw new \Exception('Таблицы с таким именем не существует');
        }
    }
}