<?php
namespace api;

use lib\App;
use models\Model;

class ApiPostNews extends Api
{
    function exec($params = array())
    {
        // TODO: Implement exec() method.

        if (!isset($params['newsTitle'])) {
            throw new \Exception('Задайте поле newsTitle');
        }

        if (!isset($params['newsMessage'])) {
            throw new \Exception('Задайте поле newsMessage');
        }

        if (!isset($params['userEmail'])) {
            throw new \Exception('Задайте поле userEmail');
        }

        $newsTitle = $params['newsTitle'];
        $newsMessage = $params['newsMessage'];
        $userEmail = $params['userEmail'];


        $participant = App::$db->get('Participant', 'ID', ['Email' => $userEmail]);
        if (!$participant) {
            throw new \Exception('Пользователь с таким Email не существует');
        }

        $participantExist = App::$db->select('News',
            ['[>]Participant' => ['News.ParticipantId' => 'ID']],
            ['News.ID'],
            ['Participant.Email' => $userEmail]
        );

        if ($participantExist) {
            throw new \Exception('Пользователь с таким Email уже создавал новость');
        }


        if (App::$db->has('News', ['NewsTitle' => $newsTitle])) {
            throw new \Exception('Новость с таким названием уже существует');
        } else {
            App::$db->insert('News',
                [
                    'NewsTitle' => $newsTitle,
                    'NewsMessage' => $newsMessage,
                    'ParticipantId' => $participant
                ]
            );
            return parent::result('Новость успешно добавлена');
        }
    }
}