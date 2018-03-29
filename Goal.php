<?php

    class Goal {
        /** @var Individual $goal */
        private static $goal;

        /**
         * Goal constructor.
         * Block new Goal();
         */
        private function __construct() {
        }

        /**
         * For singleton.
         *
         * @return Individual
         */
        public static function getGoal() {
            var_dump(20, self::$goal);
            if (self::$goal !== null && self::$goal instanceof Individual) {

            } else {
                $back = debug_backtrace();
                foreach ($back as $v) {
                    var_dump($v["file"], $v["function"], $v["class"]);
                }

                self::setGoal(self::imgToGenes());
            }

            return self::$goal;
        }

        /**
         * @param Gene[] $genes
         */
        private static function setGoal(array $genes) {
            self::$goal = new Individual($genes);
            var_dump(37, self::$goal);
        }

        /**
         * @return Gene[]
         */
        private static function imgToGenes(): array {
            echo "imgToGenes called.\n";
            $goal_img = imagecreatefrompng("goal.png");
            if (imagesx($goal_img) === Individual::width && imagesy($goal_img) === Individual::height) {
                /** @var Gene[] $genes */
                $genes = array();
                for ($x = 0; $x < Individual::width; $x++) {
                    for ($y = 0; $y < Individual::height; $y++) {
                        $color = imagecolorat($goal_img, $x, $y);
                        if ($color === 1) {
                            $color_code = 7;
                        } else {
                            $color_code = 0;
                        }

                        $genes[] = new Gene($x, $y, $color_code);
                    }
                }

                return $genes;
            } else {
                die("goal image invalid.");
            }
        }
    }