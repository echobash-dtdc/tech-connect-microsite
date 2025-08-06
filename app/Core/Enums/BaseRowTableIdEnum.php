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
            self::FEEDBACK_SUGGESTIONS => env("FEEDBACK_SUGGESTIONS"),
            self::BLOG_POSTS => env("BLOG_POSTS"),
            self::PROJECTS_INITIATIVES => env("PROJECTS_INITIATIVES"),
            self::ORGANISATION => env("ORGANISATION"),
            self::TEAM_MEMBERS => env("TEAM_MEMBERS"),
            self::EVENTS => env("EVENTS"),
            self::RESOURCES_TOOLS => env("RESOURCES_TOOLS"),
            self::LEADERSHIP_MESSAGE => env("LEADERSHIP_MESSAGE"),
            self::RELEASE_NOTES => env("RELEASE_NOTES")
        ];
    }

    public static function getFilterFieldIds(): array
    {
        return [
            self::ORGANISATION => env("ORGANISATION_ACTIVE_ROW"),
            self::LEADERSHIP_MESSAGE => env("LEADERSHIP_MESSAGE_ACTIVE_ROW")
        ];
    }

    public static function getSlugFilterField(): array
    {
        return [
            self::BLOG_POSTS => 7990,
            self::RESOURCES_TOOLS => 8005,
            self::RELEASE_NOTES => 8004
        ];
    }
}
?>