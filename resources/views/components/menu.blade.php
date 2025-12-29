<x-bt-nav :items="[
    [
        'category' => 'Main Menu',
        'items' => [
            [
                'label' => 'Dashboard',
                'icon' => 'home',
                'routeName' => 'dashboard',
            ],
            [
                'label' => 'Users',
                'icon' => 'users',
                'children' => [
                    [
                        'label' => 'Users Table',
                        'routeName' => 'users.table',
                    ],
                ],
            ],
        ],
    ],
]" sidebar-bind="!sidebarOpen" :hideCategories="true" :singleOpenExpanded="true" :withnavigate="true" />
