<?php


    final class Gene {
        /** @var int $x */
        private $x;
        /** @var int $y */
        private $y;
        /** @var int $color_code */
        private $color_code;

        public function __construct(int $x, int $y, int $color) {
            $this->setX($x);
            $this->setY($y);
            $this->setColorCode($color);
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
    }