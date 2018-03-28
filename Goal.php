<?php

    class Goal {
        /** @var Individual $goal */
        private static $goal;

        private function __construct() {
            $goal_img = imagecreatefrompng("goal.png");
            if (imagesx($goal_img) === Individual::width && imagesy($goal_img) === Individual::height) {
                for ($x = 0; $x < Individual::width; $x++) {
                    for ($y = 0; $y < Individual::height; $y++) {
                        $color = imagecolorat($goal_img, $x, $y);
                        $r     = ($color >> 16) & 0xFF;
                        $g     = ($color >> 8) & 0xFF;
                        $b     = $color & 0xFF;

                        var_dump($r, $g, $b);
                        echo "<br>";
                    }
                }
            } else {
                die("goal image invalid.");
            }
        }

        /**
         * @return Individual
         */
        public static function getGoal() {
            if (self::$goal !== null && self::$goal instanceof Individual) {

            } else {
                self::$goal = new Goal();
            }

            return self::$goal;
        }
    }