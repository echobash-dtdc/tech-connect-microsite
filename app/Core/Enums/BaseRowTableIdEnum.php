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

    public static function getAllTableIds(): array
    {
        return [
            self::FEEDBACK_SUGGESTIONS => 807,
            self::BLOG_POSTS => 812,
            self::PROJECTS_INITIATIVES => 809,
            self::ORGANISATION => 813,
            self::TEAM_MEMBERS => 810,
            self::EVENTS => 805,
            self::RESOURCES_TOOLS => 811
        ];
    }

    public static function getFilterFieldIds(): array
    {
        return [
            self::ORGANISATION => 7982
        ];
    }

    public static function getSlugFilterField(): array
    {
        return [
            self::BLOG_POSTS => 7606,
            self::RESOURCES_TOOLS => 7605
        ];
    }
}
?>