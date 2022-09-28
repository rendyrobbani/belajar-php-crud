<?php

namespace RendyRobbani\PHP\Belajar\CRUD\Config;

class DatabaseConfig
{
    /**
     * @var array|null
     */
    private static ?array $config = null;

    /**
     * @return array|null
     */
    public static function getConfig(): ?array
    {
        if (self::$config == null) {
            self::$config = [];
            $filename = __DIR__ . '/../../resources/config/database.env';
            $contents = explode("\n", file_get_contents($filename));
            foreach ($contents as $content) {
                if (str_contains($content, '=') && !str_contains($content, '#')) {
                    $key = trim(substr($content, 0, strpos($content, '=')));
                    $val = trim(substr($content, strpos($content, '=') + 1));
                    self::$config[$key] = $val;
                }
            }
        }
        return self::$config;
    }
}
