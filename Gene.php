<?php


    final class Gene {
        /** @var int $color_code */
        private $color_code;

        public function __construct(int $color) {
            $this->setColorCode($color);
        }

        /**
         * @return int
         */
        final public function getColorCode(): int {
            return $this->color_code;
        }

        /**
         * @param int $color
         */
        final private function setColorCode(int $color): void {
            $this->color_code = $color;
        }

        /**
         * @param Gene $parent1
         * @param Gene $parent2
         *
         * @return Gene
         */
        final public static function cross(Gene $parent1, Gene $parent2): Gene {
            return new Gene(Color::mix($parent1->getColorCode(), $parent2->getColorCode()));
        }
    }