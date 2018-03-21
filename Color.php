<?php

    final class Color {
        const color_list = array(
            0 => array(0, 0, 0), //白
            1 => array(0, 0, 1), //青
            2 => array(0, 1, 0), //緑
            3 => array(1, 0, 0), //赤
            4 => array(0, 1, 1), //水色
            5 => array(1, 0, 1), //紫
            6 => array(1, 1, 0), //黄色
            7 => array(1, 1, 1), // 黒
        );

        private $color_code;

        public function __construct(int $color) {
            $this->color_code = $color;
        }

        final public function get_color(): array {
            return static::color_list[$this->color_code];
        }

        final public static function get_color_distance(Color $color1, Color $color2): int {
            $distance   = 0;
            $color1_arr = $color1->get_color();
            $color2_arr = $color2->get_color();
            for ($k = 0; $k < 3; $k++) {
                if ($color1_arr[$k] !== $color2_arr[$k]) {
                    $distance++;
                }
            }

            return $distance;
        }

        final public static function mix(Color $color1, Color $color2): Color {
            $color1_arr = $color1->get_color();
            $color2_arr = $color2->get_color();
            $new_color  = array();

            for ($k = 0; $k < 3; $k++) {
                if ($color1_arr[$k] === $color2_arr[$k]) {
                    $new_color[$k] = $color1_arr[$k];
                } else {
                    if (mt_rand(0, 1) === 0) {
                        $new_color[$k] = $color1_arr[$k];
                    } else {
                        $new_color[$k] = $color2_arr[$k];
                    }
                }
            }

            $key = array_search($new_color, self::color_list);
            if ($key === false) {
                die("mix failed.");
            }

            return new Color($key);
        }
    }