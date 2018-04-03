<?php


class Generation {
    /** @var int $generation_count 第n世代 */
    private $generation_count;
    /** @var Individual[] $individuals この世代に属する個体 */
    private $individuals;

    public function __construct(int $generation_count, array $individuals) {
        $this->setGenerationCount($generation_count);
        $this->setIndividuals($individuals);
        mkdir(Experiment::getSavePath() . DIRECTORY_SEPARATOR . $this->getGenerationCount());
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

    /**
     * この世代で一番強い$num個体を選び、強い順に返す
     *
     * @param int $num
     * @return Individual[]
     */
    private function getElite(int $num): array {
        uasort($this->individuals, array("Individual", "sort"));
        $count = 0;
        $elites = array();
        foreach ($this->individuals as $individual) {
            if ($count < $num) {
                $elites[] = $individual;
                $count++;
            }
            if ($count === $num) {
                break;
            }
        }

        return $elites;
    }

    private function saveGeneration() {
        foreach ($this->individuals as $individual) {
            $individual->save(Experiment::getSavePath() . DIRECTORY_SEPARATOR . $this->getGenerationCount());
        }
    }

    /**
     * 新しい世代を作る
     *
     * @return Generation
     */
    public function new_generation(): Generation {
        $this->saveGeneration();

        /** @var Individual[] $elites その世代のトップ15 */
        $elites = $this->getElite(15);

        /** エリートから新世代を生成
         *  トップ5はそのまま残し、残りの10個から45個生成する。
         */
        $individuals = array();
        for ($i = 0; $i < 5; $i++) {
            $individuals[] = $elites[$i];
        }
        for ($i = 5; $i < 15; $i++) {
            for ($j = 5; $j < 15; $j++) {
                if ($i === $j) continue;
                $individuals[] = Individual::cross($elites[$i], $elites[$j]);
            }
        }

        return new Generation($this->getGenerationCount() + 1, $individuals);
    }

    public function getBestIndividual(): Individual {
        return $this->getElite(1)[0];
    }
}