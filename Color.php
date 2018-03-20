<?php

    final class Color {
        const color = array(
            0 => array(0, 0, 0), //白
            1 => array(0, 0, 1), //青
            2 => array(0, 1, 0), //緑
            3 => array(1, 0, 0), //赤
            4 => array(0, 1, 1), //水色
            5 => array(1, 0, 1), //紫
            6 => array(1, 1, 0), //黄色
            7 => array(1, 1, 1), // 黒
        );

        final public static function get_color(int $color_num): array {
            return static::color[$color_num];
        }

        final public static function get_color_distance(int $num1, int $num2): int {
            $color1 = static::color[$num1];
            $color2 = static::color[$num2];

            $distance = 0;
            foreach ($color1 as $k => $v) {
                if ($color1[$k] !== $color2[$k]) {
                    $distance++;
                }
            }

            return $distance;
        }
    }