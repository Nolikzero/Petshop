<?php
namespace models;

use lib\App;

class News extends Model
{
    public function find($id = null)
    {
        if ($id) {
            $where['News.ID'] = $id;
        } else {
            $where = null;
        }
        return App::$db->select("News",
            ["[>]Participant" => ["News.ParticipantId" => "ID"]],
            [
                'News.ID',
                "News.NewsTitle",
                "News.NewsMessage",
                "News.LikesCounter",
                "Participant" =>
                    [
                        'Participant.ID',
                        'Participant.Email',
                        'Participant.Name'
                    ]
            ],
            $where
        );
    }
}