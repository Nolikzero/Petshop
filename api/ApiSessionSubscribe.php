<?php
namespace api;

use lib\App;
use models\Model;

class ApiSessionSubscribe extends Api
{
    function exec($params = array())
    {
        // TODO: Implement exec() method.

        if (!isset($params['sessionId'])) {
            throw new \Exception('Задайте поле sessionId');
        }

        if (!isset($params['userEmail'])) {
            throw new \Exception('Задайте поле userEmail');
        }

        $sessionId = $params['sessionId'];
        $userEmail = $params['userEmail'];

        if (!App::$db->has('Session', ['ID' => $sessionId])) {
            throw new \Exception('Занятия с таким ID не существует');
        }

        $participant = App::$db->get('Participant', 'ID', ['Email' => $userEmail]);
        if (!$participant) {
            throw new \Exception('Пользователь с таким Email не существует');
        }

        $participantExist = App::$db->select('SessionParticipants',
            ['[>]Participant' => ['SessionParticipants.ParticipantId' => 'ID']],
            ['SessionParticipants.ID'],
            ['Participant.Email' => $userEmail, 'SessionParticipants.SessionId' => $sessionId]
        );

        if ($participantExist) {
            throw new \Exception('Пользователь с таким Email уже записан на лекцию');
        }

        $sessionParticipants = App::$db->query('SELECT COUNT(*) AS count, Session.places FROM SessionParticipants RIGHT JOIN Session ON Session.ID = :session_id WHERE SessionId = :session_id',
            [':session_id' => $sessionId])->fetch();

        if ($sessionParticipants['count'] >= $sessionParticipants['places']) {
            throw new \Exception('Извините, все места заняты');
        } else {
            App::$db->insert('SessionParticipants',
                [
                    'SessionId' => $sessionId,
                    'ParticipantId' => $participant
                ]
            );
            return parent::result('Вы успешно записаны на лекцию');
        }
    }
}