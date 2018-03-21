<?php


    class Gene {
        /** @var int $x */
        private $x;
        /** @var int $y */
        private $y;
        /** @var Color $color */
        private $color;

        public function __construct(int $x, int $y, Color $color) {
            $this->setX($x);
            $this->setY($y);
            $this->setColor($color);
        }

        /**
         * @return int
         */
        public function getX(): int {
            return $this->x;
        }

        /**
         * @param int $x
         */
        private function setX(int $x): void {
            $this->x = $x;
        }

        /**
         * @return int
         */
        public function getY(): int {
            return $this->y;
        }

        /**
         * @param int $y
         */
        private function setY(int $y): void {
            $this->y = $y;
        }

        /**
         * @return Color
         */
        public function getColor(): Color {
            return $this->color;
        }

        /**
         * @param Color $color
         */
        private function setColor(Color $color): void {
            $this->color = $color;
        }

        /**
         * @param Gene $parent1
         * @param Gene $parent2
         *
         * @return Gene
         */
        public static function cross(Gene $parent1, Gene $parent2): Gene {
            if ($parent1->getX() !== $parent2->getX() || $parent1->getY() !== $parent2->getY()) {
                die("cross invalid.");
            }
            return new Gene($parent1->getX(), $parent1->getY(), Color::mix($parent1->getColor(), $parent2->getColor()));
        }
    }