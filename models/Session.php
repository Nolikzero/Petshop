<?php
namespace models;

use lib\App;

class Session extends Model
{
    public function find($id = null)
    {
        if ($id) {
            $where['Session.ID'] = $id;
        } else {
            $where = null;
        }
        $sessions = App::$db->select('Session',
            [
                '[>]SessionSpeakers' => ['Session.ID' => 'SessionId'],
                '[>]Speaker' => ['SessionSpeakers.SpeakerId' => 'ID']
            ],
            [
                'Session.ID(Session_id)',
                'Session.Name(Session_name)',
                'Session.TimeOfEvent',
                'Session.Description',
                'Speakers' => [
                    'Speaker.ID(Speaker_id)',
                    'Speaker.Name(Speaker_name)'
                ]
            ],
            $where
        );

        $result = [];
        foreach ($sessions as $session) {
            if (!isset($result[$session['Session_id']])) {
                $result[$session['Session_id']] = $session;
            }
            if($session['Speakers']['Speaker_id']) {
                $result[$session['Session_id']]['Speakers'][$session['Speakers']['Speaker_id']] = $session['Speakers'];
            }else{
                unset($result[$session['Session_id']]['Speakers']);
            }
            unset($result[$session['Session_id']]['Speakers']['Speaker_name']);
            unset($result[$session['Session_id']]['Speakers']['Speaker_id']);
        }
        return $result;
    }
}