<head>
    @php
        $titles = [
            'all-users' => 'All Users List',
            'dashboard' => 'Dashboard',
            'profile-setting' => 'User Profile',
            'app-chat' => 'Chat',
            'app-calendar' => 'Calendar',
            'view-hospital' => 'All Hospitals List',

        ];
    @endphp

    <title>{{ $titles[Route::currentRouteName()] ?? 'Default Title' }}</title>
</head>
