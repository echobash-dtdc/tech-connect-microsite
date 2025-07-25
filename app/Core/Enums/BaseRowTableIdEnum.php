<?php

namespace App\Core\Enums;

enum BaseRowTableIdEnum: int
{
    public const FEEDBACK = "Feedback";
    public const BLOG_POSTS_BKP = "blog_posts_bkp";
    public const TEAM_MEMBERS = "team_members";
    public const EVENTS = "events";

    public static function getAllTableIds(): array
    {
        return [
            self::FEEDBACK => 770,
            self::BLOG_POSTS_BKP => 769,
            self::TEAM_MEMBERS => 761,
            self::EVENTS => 762
        ];
    }
}
?>