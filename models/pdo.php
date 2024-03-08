<?php
    /**
     * 1 connect
     * truy van => nhieu, 1, field
     * CRUD
     * input: sql
     * output: array (lien ket, khong lien ket) / String / Number
     *  */
    $host = '';
    $port = ;
    $db_name = '';
    $username = '';
    $password = '';
    $conn = null;
    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$db_name;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOExeption $e) {
        die("Loi ket noi db: ".$e->getMessage());
    }

    // Thực hiện câu lệnh truy vấn để lấy nhiều records trong database
    // Trả ra array chứa nhiều phần tử
    // Nếu không hiểu thì có thể test function trước khi làm
    function laynhieuhang($sql) {
        global $conn;
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $results = $stmt -> fetchAll();
        return $results;
    }

    // Thực hiện câu lệnh truy vấn để lấy 1 record (1 hàng) trong database
    // Trả ra array chứa một phần tử
    // Nếu không hiểu thì có thể test function trước khi làm
    function laymothang($sql) {
        global $conn;
        try {
            // func_get_args(): return a list elements of arrays
            // array_slice($a, 0): return a array that contains elements from position 0
            // array_slice($a, 0): return a array that contains elements from position 0
            $sql_agrs = array_slice(func_get_args(), 1);
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_agrs);
            $stmt -> setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt -> fetch();
            return $row;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
    }

    // Thêm, sửa và xóa
    function thaydoidulieu($sql) {
        global $conn;
        try {
            $sql_args = array_slice(func_get_args(), 1);
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
    }
?>