<?php

namespace App\Core\Enums;

enum BaseRowTableIdEnum: int
{
    public const FEEDBACK_SUGGESTIONS = "feedback_suggestions";
    public const BLOG_POSTS = "blog_posts";
    public const PROJECTS_INITIATIVES = "projects_initiatives";
    public const ORGANISATION = "organisation";
    public const TEAM_MEMBERS = "team_members";
    public const EVENTS = "events";
    public const RESOURCES_TOOLS = "resources_tools";
    public const LEADERSHIP_MESSAGE = "leadership_message";
    public const RELEASE_NOTES = "release_notes";
    public static function getAllTableIds(): array
    {
        return [
            self::FEEDBACK_SUGGESTIONS => 764,
            self::BLOG_POSTS => 769,
            self::PROJECTS_INITIATIVES => 766,
            self::ORGANISATION => 771,
            self::TEAM_MEMBERS => 767,
            self::EVENTS => 762,
            self::RESOURCES_TOOLS => 768,
            self::LEADERSHIP_MESSAGE => 776,
            self::RELEASE_NOTES => 775
        ];
    }

    public static function getFilterFieldIds(): array
    {
        return [
            self::ORGANISATION => 7585,
            self::LEADERSHIP_MESSAGE => 7615
        ];
    }

    public static function getSlugFilterField(): array
    {
        return [
            self::BLOG_POSTS => 7606,
            self::RESOURCES_TOOLS => 7605,
            self::RELEASE_NOTES => 7619
        ];
    }
}
?>