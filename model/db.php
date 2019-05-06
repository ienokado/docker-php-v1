<?php

    function connect() {
        try {
            $pdo = new PDO(
                'mysql:host='. MYSQL_HOST. ';dbname='. MYSQL_DBNAME. ';charset=utf8',
                MYSQL_USER,
                MYSQL_PASSWORD,
                [PDO::ATTR_EMULATE_PREPARES => false]
            );
        } catch (PDOException $e) {
            return false;
        }

        return $pdo;
    }

    function selectOne($pdo, $select, $table, $where = null, $params = [], $orderby = null, $limit = null, $offset = null) {
        $sql = "SELECT
                    $select
                FROM
                    $table";
        // WHERE句
        if (!is_null($where)) {
            $sql .= " WHERE $where";
        }

        // ORDER BY
        if (!is_null($orderby)) {
            $sql .= " ORDER BY $orderby";
        }

        $stmt = $pdo->prepare($sql);
        if (count($params) > 0) {
            foreach ($params as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
        }

        if (!$stmt) {
            return false;
        }

        $stmt->execute();

        return $stmt->fetch();
    }

    function selectAll($pdo, $select, $table, $where = null, $params = [], $orderby = null, $limit = null, $offset = null) {
        $sql = "SELECT
                    $select
                FROM
                    $table";
        // WHERE句
        if (!is_null($where)) {
            $sql .= " WHERE $where";
        }

        // ORDER BY
        if (!is_null($orderby)) {
            $sql .= " ORDER BY $orderby";
        }

        $stmt = $pdo->prepare($sql);
        if (count($params) > 0) {
            foreach ($params as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
        }

        if (!$stmt) {
            return false;
        }

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function upsert($pdo, $table, $values, $where = null, $where_params = []) {
        // 編集
        if (isset($values['id'])) {
            $set_params = null;

            $count = 0;
            foreach ($values as $key => $value) {
                $value = is_numeric($value) ? (int) $value : "'$value'";
                $set_params[] = "$key = $value";
            }

            $update_value_string = implode(', ', $set_params);

            $sql = "UPDATE
                        $table
                    SET
                        $update_value_string
                    WHERE
                        $where";
        // 新規登録
        } else {
            $keys = array_keys($values);
            $insert_keys_string = implode(', ', $keys);

            $insert_value_string = implode(', ', $values);

            $sql = "INSERT INTO
                        $table ($insert_keys_string)
                    VALUES
                        ($insert_value_string)";
        }

        $stmt = $pdo->prepare($sql);

        if (!$stmt) {
            return false;
        }

        if (count($where_params) > 0) {
            foreach ($where_params as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
        }

        $stmt->execute();
    }

    function delete($pdo, $table, $values, $where, $where_params) {
        // TODO:削除処理
        $sql = "DELETE FROM
                    $table
                WHERE
                    $where";

        $stmt = $pdo->prepare($sql);

        if (count($where_params) > 0) {
            foreach ($where_params as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
        }

        $stmt->execute();
    }