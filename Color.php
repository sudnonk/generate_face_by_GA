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
         * @param Color $color1
         * @param Color $color2
         *
         * @return int
         */
        final public static function get_color_distance(Color $color1, Color $color2): int {
            $distance   = 0;
            $color1_arr = $color1->getColor();
            $color2_arr = $color2->getColor();
            for ($k = 0; $k < 3; $k++) {
                if ($color1_arr[$k] !== $color2_arr[$k]) {
                    $distance++;
                }
            }

            return $distance;
        }

        /**
         * @param Color $color1
         * @param Color $color2
         *
         * @return Color
         */
        final public static function mix(Color $color1, Color $color2): Color {
            $color1_arr = $color1->getColor();
            $color2_arr = $color2->getColor();
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

        /**
         * @param Color $color
         *
         * @return int
         */
        public static function getR(Color $color): int {
            return ($color->getColor()[0] === 0) ? 0 : 255;
        }

        /**
         * @param Color $color
         *
         * @return int
         */
        public static function getG(Color $color): int {
            return ($color->getColor()[1] === 0) ? 0 : 255;
        }

        /**
         * @param Color $color
         *
         * @return int
         */
        public static function getB(Color $color): int {
            return ($color->getColor()[2] === 0) ? 0 : 255;
        }

        /**
         * @param resource $img
         *
         * @return array
         */
        public static function getColorIds($img): array {
            $color_ids = [];
            foreach (self::color_list as $color_code => $color_arr) {
                $color_obj              = new Color($color_code);
                $color_ids[$color_code] = imagecolorallocate($img, Color::getR($color_obj), Color::getG($color_obj), Color::getB($color_obj));
            }

            return $color_ids;
        }
    }