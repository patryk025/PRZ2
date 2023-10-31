<?php

return [
    'attributes' => [
        'name' => 'Nazwisko i imię',
        'email' => 'E-mail',
        'roles' => 'Role',
        'email_verified_at' => 'E-mail zweryfikowany',
        'created_at' => 'utworzono',
    ],
    'actions' => [
        'assign_admin_role' => 'Ustaw rolę admina',
        'remove_admin_role' => 'Odbierz rolę admina',
        'assign_worker_role' => 'Ustaw rolę pracownika',
        'remove_worker_role' => 'Odbierz rolę pracownika',
    ],
    'messages' => [
        'successes' => [
            'admin_role_assigned' => 'Ustawiono rolę admina dla :user',
            'admin_role_removed' => 'Odebrano rolę admina :user',
            'worker_role_assigned' => 'Ustawiono rolę pracownika :user',
            'worker_role_removed' => 'Odebrano rolę pracownika :user',
        ]
    ],
];