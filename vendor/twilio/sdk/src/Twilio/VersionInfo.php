<?php


namespace Twilio;


class VersionInfo {
    const MAJOR = 6;
    const MINOR = 10;
    const PATCH = 3;

    public static function string() {
        return implode('.', array(self::MAJOR, self::MINOR, self::PATCH));
    }
}
