<?php

    class Database {
        /** @var PDO $pdo */
        private static $pdo;

        /**
         * 個体をデータベースに保存する。
         *
         * @param int        $generation
         * @param int        $distance
         * @param Individual $individual
         */
        public static function saveIndividual(int $generation, int $distance, Individual $individual): void {
            $individual_base64 = $individual->to_base64();

            $pdo  = self::getPDO();
            $stmt = $pdo->prepare("insert into individual(exp_num,generation,distance,individual) value (?,?,?,?)");
            $stmt->bindValue(1, Experiment::getExpNum(), PDO::PARAM_INT);
            $stmt->bindValue(2, $generation, PDO::PARAM_INT);
            $stmt->bindValue(3, $distance, PDO::PARAM_INT);
            $stmt->bindValue(4, $individual_base64, PDO::PARAM_STR);

            $stmt->execute();
        }

        private static function getPDO(): PDO {
            if (self::$pdo !== null && self::$pdo instanceof PDO) {

            } else {
                self::$pdo = new PDO(DatabaseConfig::DSN, DatabaseConfig::USER, DatabaseConfig::PASS, DatabaseConfig::OPTIONS);
            }

            return self::$pdo;
        }

    }