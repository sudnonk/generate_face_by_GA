<?php


    class Generation {
        /** @var int $generation_count 第n世代 */
        private $generation_count;
        /** @var Individual[] $individuals この世代に属する個体 */
        private $individuals;

        public function __construct(int $generation_count,array $individuals) {
            $this->setGenerationCount($generation_count);
            $this->setIndividuals($individuals);
        }

        /**
         * @param int $generation_count
         */
        private function setGenerationCount(int $generation_count): void {
            $this->generation_count = $generation_count;
        }

        /**
         * @param Individual[] $individuals
         */
        private function setIndividuals(array $individuals): void {
            $this->individuals = $individuals;
        }

        /**
         * @return int
         */
        public function getGenerationCount(): int {
            return $this->generation_count;
        }

        public function create_new_generation():Generation{



        }

    }