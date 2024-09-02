<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Post 1",
            "slug" => "post-1",
            "author" => "John Doe",
            "date" => "2022-01-01",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel sollicitudin ligula, in pulvinar felis. Proin condimentum libero ut neque molestie, ac pulvinar velit consectetur. Nullam at enim in nisi consectetur semper vel vel neque.",
        ],
        [
            "title" => "Post 2",
            "slug" => "post-2",
            "author" => "Jane Smith",
            "date" => "2022-02-01",
            "content" => "Morbi facilisis, dui sed tristique pellentesque, nunc neque posuere diam, non placerat nisi ex id nulla. Integer malesuada velit vel tellus malesuada, et placerat velit bibendum. Nulla facilisi. Sed tincidunt neque non odio bibendum, vel imperdiet velit semper.",
        ],
        [
            "title" => "Post 3",
            "slug" => "post-3",
            "author" => "Mike Johnson",
            "date" => "2022-03-01",
            "content" => "Duis ac ante id est placerat faucibus. Sed vel sapien vel eros consectetur consectetur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis sed orci at velit elementum consectetur vel ac nisi.",
        ]
    ];

    public static function getAllPosts()
    {
        return collect(self::$blog_posts);
    }

    public static function findPosts($slug)
    {
        $posts = static::getAllPosts();

        return $posts->firstWhere('slug', $slug);
    }
}
