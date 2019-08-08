<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'EasyClinical',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>e</b>Clinical',

    'logo_mini' => '<b>e</b>Cli',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        [
            'text' => 'HOME',
            'url'  => 'home',
            'icon' => 'home',
        ],
        'CONFIGURAÇÔES',
        [
            'text' => 'Receita',
            'url'  => 'config/receita',
            'icon' => 'book',
        ],
        'CADASTROS',
        [//Usuários
            'text' => 'Usuários',
            'icon' => 'user-circle',
            'role'    => 'superadministrator',
            'submenu' => [
                [
                    'text' => 'Novo',
                    'url'  => 'admin/usuarios/novo',
                ],
                [
                    'text' => 'Editar',
                    'url'  => 'admin/usuarios',
                ],
                [//Permissões
                    'text' => 'Permissões',
                    'icon' => 'unlock',
                    'role'    => 'superadministrator',
                    'submenu' => [
                        [
                            'text' => 'Novo',
                            'url'  => 'admin/permissao/novo',
                        ],
                        [
                            'text' => 'Editar',
                            'url'  => 'admin/permissao',
                        ],
                    ],
                ],
            ],
        ],
        [//Profissional
            'text' => 'Profissional',
            'icon' => 'user-md',
            'role'    => 'superadministrator',
            'submenu' => [
                [
                    'text' => 'Novo',
                    'url'  => 'admin/profissional/novo',
                ],
                [
                    'text' => 'Editar',
                    'url'  => 'admin/profissional',
                ],
                [//Especialidade
                    'text' => 'Especialidade',
                    'icon' => 'graduation-cap',
                    'role'    => 'superadministrator',
                    'submenu' => [
                        [
                            'text' => 'Novo',
                            'url'  => 'admin/especialidade/novo',
                        ],
                        [
                            'text' => 'Editar',
                            'url'  => 'admin/especialidade',
                        ],
                    ],
                ],
                [//Área de Atuação
                    'text' => 'Área de Atuação',
                    'icon' => 'hotel ',
                    'role'    => 'superadministrator',
                    'submenu' => [
                        [
                            'text' => 'Novo',
                            'url'  => 'admin/area-atuacao/novo',
                        ],
                        [
                            'text' => 'Editar',
                            'url'  => 'admin/area-atuacao',
                        ],
                    ],
                ],
            ],
        ],
        [//Paciente
            'text' => 'Paciente',
            'icon' => 'ambulance',
            'role'    => 'superadministrator',
            'url'  => 'admin/pacientes',
        ],
        [//Exame
            'text' => 'Exame',
            'icon' => 'heartbeat',
            'role'    => 'superadministrator',
            'submenu' => [
                [
                    'text' => 'Novo',
                    'url'  => 'admin/exame/novo',
                ],
                [
                    'text' => 'Editar',
                    'url'  => 'admin/exame',
                ],
            ],
        ],
        [//Medicamento
            'text' => 'Medicamento',
            'icon' => 'medkit',
            'role'    => 'superadministrator',
            'submenu' => [
                [
                    'text' => 'Novo',
                    'url'  => 'admin/medicamento/novo',
                ],
                [
                    'text' => 'Editar',
                    'url'  => 'admin/medicamento',
                ],
            ],
        ],
        'OPERAÇÔES',
        [//Atendimento
            'text' => 'Atendimento',
            'icon' => 'phone',
            'role'    => 'atendente',
            'submenu' => [
                [
                    'text' => 'Agendar Consulta/Retorno',
                    'url'  => 'clinica/agenda-consulta',
                ],
                [
                    'text' => 'Agendar Exame',
                    'url'  => 'clinica/agenda-consulta',
                ],
            ],
        ],
        [//Médico
            'text' => 'Espaço Médico',
            'icon' => 'stethoscope',
            'role'    => 'medico',
            'submenu' => [
                [
                    'text' => 'Histórico Paciente',
                    'url'  => 'medico/historico-paciente',
                ],
                [
                    'text' => 'Solicitar Exame',
                    'url'  => 'medico/solicitar-exame',
                ],
                [
                    'text' => 'Acompanhamento Médico',
                    'url'  => 'medico/acompanhamento-medico',
                ],
                [
                    'text' => 'Emitir Receita',
                    'url'  => 'medico/emitir-receita',
                ],
            ],
        ],
        [//Farmácia
            'text' => 'Farmácia',
            'icon' => 'hospital-o',
            'role'    => 'farmaceutico',
            'url'  => 'clinica/farmacia',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        //App\Filters\MenuFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
