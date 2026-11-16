<?php
return [
    'GET' => [
        '/'                 => ['MahasiswaController', 'index'],
        '/mahasiswa'        => ['MahasiswaController', 'index'],
        '/mahasiswa/create' => ['MahasiswaController', 'create'],
        '/mahasiswa/edit/{id}'   => ['MahasiswaController', 'edit'],
    ],
    'POST' => [
        '/mahasiswa'        => ['MahasiswaController', 'store'],
        '/mahasiswa/update/{id}' => ['MahasiswaController', 'update'],
        '/mahasiswa/delete/{id}' => ['MahasiswaController', 'destroy'],
    ]
];