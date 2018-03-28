<?php

    class Goal {
        /** @var Gene[] $genes */
        private static $genes;

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
            if (
                self::$genes !== null &&
                count(self::$genes) === Individual::width * Individual::height &&
                self::$genes[0] instanceof Gene
            ) {

            } else {
                self::setGenes(self::imgToGenes());
            }

            return new Individual(self::$genes);
        }

        private static function setGenes(array $genes) {
            self::$genes = $genes;
        }

        private static function imgToGenes(): array {
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