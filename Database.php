<?php

    class Database {
        /** @var PDO $pdo */
        private static $pdo;

        public function saveIndividual(int $generation, int $distance, bool $is_elite, Individual $individual): void {
            $individual_serial = serialize($individual);

            $pdo  = self::getPDO();
            $stmt = $pdo->prepare("insert into individual(generation,exp_num,distance,is_elite,individual) value (?,?,?,?,?)");
            $stmt->bindValue(1, $generation, PDO::PARAM_INT);
            $stmt->bindValue(2, Experiment::getExpNum(), PDO::PARAM_INT);
            $stmt->bindValue(3, $distance, PDO::PARAM_INT);
            $stmt->bindValue(4, $is_elite, PDO::PARAM_INT);
            $stmt->bindValue(5, $individual_serial, PDO::PARAM_STR);

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