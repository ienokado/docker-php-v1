<?php
    $pdo = connect();
    $params = [
        'c_active' => ENABLED,
        'u_active' => ENABLED,
    ];

    $inner = ' INNER JOIN user u ON c.user_id = u.id';

    $where = 'u.active = :u_active AND c.active = :c_active';

    $orderby = 'c.created_at DESC';

    $results = selectAll($pdo, 'c.*, u.user_name', "comment c $inner", $where, $params, $orderby);