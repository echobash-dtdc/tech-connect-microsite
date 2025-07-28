<?php

namespace App\Core\Enums;

enum BaseRowTableIdEnum: int
{
    public const FEEDBACK = "Feedback";
    public const BLOG_POSTS_BKP = "blog_posts_bkp";
    public const PROJECTS = "projects";
    public const ORGANISATION_STRUCTURE = "organisation";
    public const TEAM_MEMBERS = "team_members";
    public const EVENTS = "events";
    public const RESOURCES = "resources";

    public static function getAllTableIds(): array
    {
        return [
            self::FEEDBACK => 770,
            self::BLOG_POSTS_BKP => 769,
            self::PROJECTS => 791,
            self::ORGANISATION_STRUCTURE => 790,
            self::TEAM_MEMBERS => 761,
            self::EVENTS => 762,
            self::RESOURCES => 768
        ];
    }
}
?>