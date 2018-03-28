<?php

    class Individual {
        /** @var Gene[] $genes */
        private $genes;

        /** @var int width */
        const width = 256;
        /** @var int  height */
        const height = 256;

        /**
         * Individual constructor.
         *
         * @param Gene[] $genes array(0=>Gene,1=>Gene,...65535=>Gene);
         */
        public function __construct(array $genes) {
            $this->setGenes($genes);
        }

        /**
         * @param array $genes
         */
        private function setGenes(array $genes) {
            if (count($genes) !== self::width * self::height) {
                die("invalid individual.");
            }

            $this->genes = $genes;
        }

        /**
         * @return Gene[]
         */
        protected function getGenes(): array {
            return $this->genes;
        }

        /**
         * @return resource
         */
        public function to_image() {
            /** @var resource $img */
            $img = imagecreate(self::width, self::height);

            /** @var array $color_ids */
            $color_ids = Color::getColorIds($img);
            foreach ($this->genes as $gene) {
                /** @var int $color_code */
                $color_code = $gene->getColorCode();
                /** @var int $color_id */
                $color_id = $color_ids[$color_code];

                imagesetpixel($img, $gene->getX(), $gene->getY(), $color_id);
            }

            return $img;
        }

        public function getDistance() {
            /** @var Individual $goal */
            $goal     = Goal::getGoal();
            $distance = 0;

        }

    }