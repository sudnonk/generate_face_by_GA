<?php


    /**
     * 個体をランダムに$num体生成する
     *
     * @param int $num 作成する個体の数
     *
     * @return Individual[] 個体の入った配列
     */
    function generate_random_individual(int $num): array {
        $individuals = array();
        for ($i = 0; $i < $num; $i++) {
            $genes = array();
            for ($x = 0; $x < Individual::width; $x++) {
                for ($y = 0; $y < Individual::height; $y++) {
                    /** @var int $color */
                    $color   = mt_rand(0, 7);
                    $genes[] = new Gene($x, $y, $color);
                }
            }

            $individuals[] = new Individual($genes);
        }

        return $individuals;
    }