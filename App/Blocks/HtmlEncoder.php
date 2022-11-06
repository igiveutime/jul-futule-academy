<?php

namespace App\Blocks;

class HtmlEncoder
{
    public const DEFAULT_CHARSET = 'UTF-8';

    public static function encodeRow(?string $row, string $charset = self::DEFAULT_CHARSET): ?string
    {
        return htmlentities($row, ENT_QUOTES, $charset);
    }

    public static function encodeUrl(?string $url): ?string
    {
        return urlencode($url);
    }
}
