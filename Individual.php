<?php

    class Individual {
        /** @var Gene[] $genes */
        private $genes;

        /** @var int width */
        const width = 256;
        /** @var int  height */
        const height = 256;

        /** @var int $distance この個体の性能 */
        private $distance = 0;

        /**
         * Individual constructor.
         *
         * @param Gene[] $genes array(0=>Gene,1=>Gene,...65535=>Gene);
         */
        public function __construct(array $genes) {
            $this->setGenes($genes);
            $this->setDistance($this->calcDistance());
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
         * @return int
         */
        private function calcDistance() {
            /** @var Individual $goal */
            $goal = Goal::getGoal();
            /** @var int $distance 距離 */
            $distance = 0;

            for ($i = 0; $i < Individual::width * Individual::height; $i++) {
                $goal_gene = $goal->getGene($i);
                $self_gene = $this->getGene($i);
                $distance  += Color::get_color_distance($goal_gene->getColorCode(), $self_gene->getColorCode());
            }

            return $distance;
        }

        /**
         * @param int $distance
         */
        private function setDistance(int $distance) {
            $this->distance = $distance;
        }

        /**
         * @param int $num
         *
         * @return Gene
         */
        public function getGene(int $num): Gene {
            return $this->genes[$num];
        }

        /**
         * @return int
         */
        public function getDistance(): int {
            return $this->distance;
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
    }