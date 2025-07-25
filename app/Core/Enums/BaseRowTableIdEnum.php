<?php

namespace App\Core\Enums;

enum BaseRowTableIdEnum: int
{
    public const FEEDBACK = "Feedback";
    public const BLOG_POSTS_BKP = "blog_posts_bkp";
    public const PROJECTS = "projects";
    public static function getAllTableIds(): array
    {
        return [
            self::FEEDBACK => 779,
            self::BLOG_POSTS_BKP => 777,
            self::PROJECTS => 791,
        ];
    }
}
?>