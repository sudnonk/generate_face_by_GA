<?php

    final class Color {
        public const color_list = array(
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

        /**
         * Color constructor.
         *
         * @param int $color
         */
        public function __construct(int $color) {
            $this->setColorCode($color);
        }

        /**
         * @return array
         */
        final public function getColor(): array {
            return static::color_list[$this->color_code];
        }

        /**
         * @param int $color_code
         */
        final private function setColorCode(int $color_code) {
            $this->color_code = $color_code;
        }

        /**
         * @return int
         */
        final public function getColorCode(): int {
            return $this->color_code;
        }

        /**
         * @param int $color1
         * @param int $color2
         *
         * @return int
         */
        final public static function get_color_distance(int $color1, int $color2): int {
            $distance   = 0;
            $color1_arr = self::color_list[$color1];
            $color2_arr = self::color_list[$color2];
            for ($k = 0; $k < 3; $k++) {
                if ($color1_arr[$k] !== $color2_arr[$k]) {
                    $distance++;
                }
            }

            return $distance;
        }

        /**
         * @param int $color1
         * @param int $color2
         *
         * @return int
         */
        final public static function mix(int $color1, int $color2): int {
            $color1_arr = self::color_list[$color1];
            $color2_arr = self::color_list[$color2];
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

            return $key;
        }

        /**
         * @param int $color_code
         *
         * @return bool
         */
        final public static function is_valid_color_code(int $color_code): bool {
            return (isset(self::color_list[$color_code]));
        }

        /**
         * @param int $color
         *
         * @return int
         */
        public static function getR(int $color): int {
            if (!self::is_valid_color_code($color)) die("invalid color code.");
            return (self::color_list[$color][0] === 0) ? 0 : 255;
        }

        /**
         * @param int $color
         *
         * @return int
         */
        public static function getG(int $color): int {
            if (!self::is_valid_color_code($color)) die("invalid color code.");
            return (self::color_list[$color][1] === 0) ? 0 : 255;
        }

        /**
         * @param int $color
         *
         * @return int
         */
        public static function getB(int $color): int {
            if (!self::is_valid_color_code($color)) die("invalid color code.");
            return (self::color_list[$color][2] === 0) ? 0 : 255;
        }

        /**
         * @param resource $img
         *
         * @return array
         */
        public static function getColorIds($img): array {
            $color_ids = [];
            foreach (self::color_list as $color_code => $color_arr) {
                $color_ids[$color_code] = imagecolorallocate($img, Color::getR($color_code), Color::getG($color_code), Color::getB($color_code));
            }

            return $color_ids;
        }
    }