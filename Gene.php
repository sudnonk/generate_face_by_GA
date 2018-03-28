<?php


    final class Gene {
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
        final public function getX(): int {
            return $this->x;
        }

        /**
         * @param int $x
         */
        final private function setX(int $x): void {
            $this->x = $x;
        }

        /**
         * @return int
         */
        final public function getY(): int {
            return $this->y;
        }

        /**
         * @param int $y
         */
        final private function setY(int $y): void {
            $this->y = $y;
        }

        /**
         * @return Color
         */
        final public function getColor(): Color {
            return $this->color;
        }

        /**
         * @param Color $color
         */
        final private function setColor(Color $color): void {
            $this->color = $color;
        }

        /**
         * @param Gene $parent1
         * @param Gene $parent2
         *
         * @return Gene
         */
        final public static function cross(Gene $parent1, Gene $parent2): Gene {
            if ($parent1->getX() !== $parent2->getX() || $parent1->getY() !== $parent2->getY()) {
                die("cross invalid.");
            }
            return new Gene($parent1->getX(), $parent1->getY(), Color::mix($parent1->getColor(), $parent2->getColor()));
        }
    }