<head>
    @php
        $titles = [
            'all-users' => 'All Users List',
            'dashboard' => 'Dashboard',
            'profile-setting' => 'User Profile',
            'app-chat' => 'Chat',
            'app-calendar' => 'Calendar',
            'view-hospital' => 'All Hospitals List',
            'view-equipment-group' => 'All Equipment Groups',
            'view-equipment' => 'All Equipments',
            'view-supply-group' => 'All Supply groups',
            'view-supplies' => 'All Supplies',
            'view-staff' => 'All Staff Memebers',
            'view-report' => 'All Reports',

        ];
    @endphp

    <title>{{ $titles[Route::currentRouteName()] ?? 'Default Title' }}</title>
</head>
