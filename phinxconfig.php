<?php
    return [
        "paths" => [
            "migrations" => "db/migrations"
        ],
        "environments" => [
            "default_migration_table" => "phinxlog",
            "default_database" => "dev",
            "dev" => [
                "adapter" => "mysql",
                "host" => "localhost",
                "name" => "racc",
                "user" => "root",
                "pass" => "",
                "port" => 3306
            ]
        ]
    ];