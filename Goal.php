<?php

    class Goal {
        /** @var Individual $goal */
        private static $goal;

        private function __construct() {
            $goal_img = imagecreatefrompng("goal.png");
            if (imagesx($goal_img) === Individual::width && imagesy($goal_img) === Individual::height) {
                /** @var Gene[] $genes */
                $genes = array();
                for ($x = 0; $x < Individual::width; $x++) {
                    for ($y = 0; $y < Individual::height; $y++) {
                        $color = imagecolorat($goal_img, $x, $y);
                        if ($color === 1) {
                            $color_code = 0;
                        } else {
                            $color_code = 7;
                        }

                        $genes[] = new Gene($x, $y, $color_code);
                    }
                }

                self::$goal = new Individual($genes);
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