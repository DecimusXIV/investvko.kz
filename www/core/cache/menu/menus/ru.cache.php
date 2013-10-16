<?php  return array (
  0 => 
  array (
    'text' => 'Панель',
    'parent' => '',
    'action' => 0,
    'description' => '',
    'icon' => 'images/misc/logo_tbar.gif',
    'menuindex' => 0,
    'params' => '',
    'handler' => 'MODx.loadPage(""); return false;',
    'permissions' => 'home',
    'controller' => '',
    'namespace' => NULL,
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Панели',
        'parent' => 'dashboard',
        'action' => 53,
        'description' => 'Управление панелями и виджетами.',
        'icon' => 'images/icons/information.png',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'dashboards',
        'controller' => 'system/dashboards',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
    ),
  ),
  1 => 
  array (
    'text' => 'Сайт',
    'parent' => '',
    'action' => 0,
    'description' => '',
    'icon' => 'images/misc/logo_tbar.gif',
    'menuindex' => 1,
    'params' => '',
    'handler' => '',
    'permissions' => 'menu_site',
    'controller' => '',
    'namespace' => NULL,
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Перейти на сайт',
        'parent' => 'site',
        'action' => 0,
        'description' => 'Будет загружена главная страница сайта в новой вкладке.',
        'icon' => 'images/icons/show.gif',
        'menuindex' => 0,
        'params' => '',
        'handler' => 'MODx.preview(); return false;',
        'permissions' => '',
        'controller' => '',
        'namespace' => NULL,
        'children' => 
        array (
        ),
      ),
      1 => 
      array (
        'text' => 'Обновить сайт',
        'parent' => 'site',
        'action' => 0,
        'description' => 'Очистить кэш сайта.',
        'icon' => 'images/icons/refresh.png',
        'menuindex' => 1,
        'params' => '',
        'handler' => 'MODx.clearCache(); return false;',
        'permissions' => 'empty_cache',
        'controller' => '',
        'namespace' => NULL,
        'children' => 
        array (
        ),
      ),
      2 => 
      array (
        'text' => 'Снять блокировки',
        'parent' => 'site',
        'action' => 0,
        'description' => 'Будут сняты все блокировки со страниц сайта. Эти блокировки являются результатом того, что другие пользователи редактируют эти страницы.',
        'icon' => 'images/ext/default/grid/hmenu-unlock.png',
        'menuindex' => 2,
        'params' => '',
        'handler' => '
MODx.msg.confirm({
    title: _(\'remove_locks\')
    ,text: _(\'confirm_remove_locks\')
    ,url: MODx.config.connectors_url+\'system/remove_locks.php\'
    ,params: {
        action: \'remove\'
    }
    ,listeners: {
        \'success\': {fn:function() { Ext.getCmp("modx-resource-tree").refresh(); },scope:this}
    }
});',
        'permissions' => 'remove_locks',
        'controller' => '',
        'namespace' => NULL,
        'children' => 
        array (
        ),
      ),
      3 => 
      array (
        'text' => 'Поиск',
        'parent' => 'site',
        'action' => 54,
        'description' => 'Поиск ресурсов.',
        'icon' => 'images/icons/context_view.gif',
        'menuindex' => 3,
        'params' => '',
        'handler' => '',
        'permissions' => 'search',
        'controller' => 'search',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      4 => 
      array (
        'text' => 'Новый документ',
        'parent' => 'site',
        'action' => 55,
        'description' => 'Создать новый документ',
        'icon' => 'images/icons/folder_page_add.png',
        'menuindex' => 4,
        'params' => '',
        'handler' => '',
        'permissions' => 'new_document',
        'controller' => 'resource/create',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      5 => 
      array (
        'text' => 'Новая ссылка',
        'parent' => 'site',
        'action' => 55,
        'description' => 'Создать новую ссылку на существующий ресурс с возможностью перехода на него.',
        'icon' => 'images/icons/link_add.png',
        'menuindex' => 5,
        'params' => '&class_key=modWebLink',
        'handler' => '',
        'permissions' => 'new_weblink',
        'controller' => 'resource/create',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      6 => 
      array (
        'text' => 'Новая символическая ссылка',
        'parent' => 'site',
        'action' => 55,
        'description' => 'Создать новую символическую ссылку, которая указывает на существующий ресурс без перехода на него.',
        'icon' => 'images/icons/link_add.png',
        'menuindex' => 6,
        'params' => '&class_key=modSymLink',
        'handler' => '',
        'permissions' => 'new_symlink',
        'controller' => 'resource/create',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      7 => 
      array (
        'text' => 'Новый статический ресурс',
        'parent' => 'site',
        'action' => 55,
        'description' => 'Создать новый статический ресурс на основе файла.',
        'icon' => 'images/icons/link_add.png',
        'menuindex' => 7,
        'params' => '&class_key=modStaticResource',
        'handler' => '',
        'permissions' => 'new_static_resource',
        'controller' => 'resource/create',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      8 => 
      array (
        'text' => 'Выйти',
        'parent' => 'site',
        'action' => 0,
        'description' => 'Выйти из бэкэнда MODX.',
        'icon' => 'images/misc/logo_tbar.gif',
        'menuindex' => 8,
        'params' => '',
        'handler' => 'MODx.logout(); return false;',
        'permissions' => 'logout',
        'controller' => '',
        'namespace' => NULL,
        'children' => 
        array (
        ),
      ),
    ),
  ),
  2 => 
  array (
    'text' => 'Компоненты',
    'parent' => '',
    'action' => 0,
    'description' => '',
    'icon' => 'images/icons/plugin.gif',
    'menuindex' => 2,
    'params' => '',
    'handler' => '',
    'permissions' => 'components',
    'controller' => '',
    'namespace' => NULL,
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Отзывы',
        'parent' => 'components',
        'action' => 78,
        'description' => '',
        'icon' => '',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => '',
        'controller' => 'index',
        'namespace' => 'recall',
        'children' => 
        array (
        ),
      ),
    ),
  ),
  3 => 
  array (
    'text' => 'Безопасность',
    'parent' => '',
    'action' => 0,
    'description' => '',
    'icon' => 'images/icons/lock.gif',
    'menuindex' => 3,
    'params' => '',
    'handler' => '',
    'permissions' => 'menu_security',
    'controller' => '',
    'namespace' => NULL,
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Управление пользователями',
        'parent' => 'security',
        'action' => 56,
        'description' => 'Добавление, обновление, и назначение прав пользователям.',
        'icon' => 'images/icons/user.gif',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'view_user',
        'controller' => 'security/user',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      1 => 
      array (
        'text' => 'Контроль доступа',
        'parent' => 'security',
        'action' => 57,
        'description' => 'Управление группами пользователей, ролями, политиками доступа, шаблонами политик доступа.',
        'icon' => 'images/icons/mnu_users.gif',
        'menuindex' => 1,
        'params' => '',
        'handler' => '',
        'permissions' => 'access_permissions',
        'controller' => 'security/permission',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      2 => 
      array (
        'text' => 'Группы ресурсов',
        'parent' => 'security',
        'action' => 58,
        'description' => 'Управление принадлежностью ресурсов к группам ресурсов.',
        'icon' => '',
        'menuindex' => 2,
        'params' => '',
        'handler' => '',
        'permissions' => 'access_permissions',
        'controller' => 'security/resourcegroup/index',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      3 => 
      array (
        'text' => 'Настройка форм',
        'parent' => 'security',
        'action' => 59,
        'description' => 'Настройка внешнего вида бэкэнда.',
        'icon' => 'images/misc/logo_tbar.gif',
        'menuindex' => 3,
        'params' => '',
        'handler' => '',
        'permissions' => 'customize_forms',
        'controller' => 'security/forms',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      4 => 
      array (
        'text' => 'Перезагрузить права доступа',
        'parent' => 'security',
        'action' => 0,
        'description' => 'Перезагрузить все права доступа и очистить кэш.',
        'icon' => 'images/icons/unzip.gif',
        'menuindex' => 4,
        'params' => '',
        'handler' => 'MODx.msg.confirm({
    title: _(\'flush_access\')
    ,text: _(\'flush_access_confirm\')
    ,url: MODx.config.connectors_url+\'security/access/index.php\'
    ,params: {
        action: \'flush\'
    }
    ,listeners: {
        \'success\': {fn:function() { location.href = \'./\'; },scope:this}
    }
});',
        'permissions' => 'access_permissions',
        'controller' => '',
        'namespace' => NULL,
        'children' => 
        array (
        ),
      ),
      5 => 
      array (
        'text' => 'Завершить все сеансы',
        'parent' => 'security',
        'action' => 0,
        'description' => 'Завершить все сеансы работы пользователей и произвести принудительный выход из системы всех пользователей.',
        'icon' => 'images/icons/unzip.gif',
        'menuindex' => 5,
        'params' => '',
        'handler' => 'MODx.msg.confirm({
    title: _(\'flush_sessions\')
    ,text: _(\'flush_sessions_confirm\')
    ,url: MODx.config.connectors_url+\'security/flush.php\'
    ,params: {
        action: \'flush\'
    }
    ,listeners: {
        \'success\': {fn:function() { location.href = \'./\'; },scope:this}
    }
});',
        'permissions' => 'flush_sessions',
        'controller' => '',
        'namespace' => NULL,
        'children' => 
        array (
        ),
      ),
    ),
  ),
  4 => 
  array (
    'text' => 'Инструменты',
    'parent' => '',
    'action' => 0,
    'description' => '',
    'icon' => 'images/icons/menu_settings.gif',
    'menuindex' => 4,
    'params' => '',
    'handler' => '',
    'permissions' => 'menu_tools',
    'controller' => '',
    'namespace' => NULL,
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Импорт ресурсов',
        'parent' => 'tools',
        'action' => 60,
        'description' => 'Пакетный импорт статических ресурсов.',
        'icon' => 'images/icons/application_side_contract.png',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'import_static',
        'controller' => 'system/import',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      1 => 
      array (
        'text' => 'Импорт HTML',
        'parent' => 'tools',
        'action' => 61,
        'description' => 'Пакетный импорт HTML файлов.',
        'icon' => 'images/icons/application_side_contract.png',
        'menuindex' => 1,
        'params' => '',
        'handler' => '',
        'permissions' => 'import_static',
        'controller' => 'system/import/html',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      2 => 
      array (
        'text' => 'Наборы параметров',
        'parent' => 'tools',
        'action' => 62,
        'description' => 'Управление наборами параметров и элементами которым эти наборы параметров назначены.',
        'icon' => 'images/misc/logo_tbar.gif',
        'menuindex' => 2,
        'params' => '',
        'handler' => '',
        'permissions' => 'property_sets',
        'controller' => 'element/propertyset/index',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      3 => 
      array (
        'text' => 'Источники файлов',
        'parent' => 'tools',
        'action' => 63,
        'description' => 'Управление источниками файлов.',
        'icon' => 'images/misc/logo_tbar.gif',
        'menuindex' => 2,
        'params' => '',
        'handler' => '',
        'permissions' => 'sources',
        'controller' => 'source/index',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
    ),
  ),
  5 => 
  array (
    'text' => 'Отчёты',
    'parent' => '',
    'action' => 0,
    'description' => '',
    'icon' => 'images/icons/menu_settings16.gif',
    'menuindex' => 5,
    'params' => '',
    'handler' => '',
    'permissions' => 'menu_reports',
    'controller' => '',
    'namespace' => NULL,
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Расписание сайта',
        'parent' => 'reports',
        'action' => 64,
        'description' => 'Просмотр расписания публикаций и снятия с публикации.',
        'icon' => 'images/icons/cal.gif',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'view_document',
        'controller' => 'resource/site_schedule',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      1 => 
      array (
        'text' => 'Журнал системы управления',
        'parent' => 'reports',
        'action' => 65,
        'description' => 'Просмотр последних действий менеджеров сайта.',
        'icon' => '',
        'menuindex' => 1,
        'params' => '',
        'handler' => '',
        'permissions' => 'logs',
        'controller' => 'system/logs/index',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      2 => 
      array (
        'text' => 'Журнал ошибок',
        'parent' => 'reports',
        'action' => 66,
        'description' => 'Открыть error.log MODX.',
        'icon' => 'images/icons/comment.gif',
        'menuindex' => 2,
        'params' => '',
        'handler' => '',
        'permissions' => 'view_eventlog',
        'controller' => 'system/event',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      3 => 
      array (
        'text' => 'Информация о системе',
        'parent' => 'reports',
        'action' => 67,
        'description' => 'Просмотр информации о сервере, настройках php, информации о базе данных mysql, и многое другое.',
        'icon' => 'images/icons/logging.gif',
        'menuindex' => 3,
        'params' => '',
        'handler' => '',
        'permissions' => 'view_sysinfo',
        'controller' => 'system/info',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      4 => 
      array (
        'text' => 'О проекте',
        'parent' => 'reports',
        'action' => 68,
        'description' => 'Более подробная информация о MODX Revolution.',
        'icon' => 'images/icons/information.png',
        'menuindex' => 4,
        'params' => '',
        'handler' => '',
        'permissions' => 'about',
        'controller' => 'help',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
    ),
  ),
  6 => 
  array (
    'text' => 'Система',
    'parent' => '',
    'action' => 0,
    'description' => '',
    'icon' => 'images/misc/logo_tbar.gif',
    'menuindex' => 6,
    'params' => '',
    'handler' => '',
    'permissions' => 'menu_system',
    'controller' => '',
    'namespace' => NULL,
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Управление пакетами',
        'parent' => 'system',
        'action' => 69,
        'description' => 'Скачивание дополнительных компонентов, добавление поставщиков, и установка пакетов.',
        'icon' => 'images/icons/sysinfo.gif',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'packages',
        'controller' => 'workspaces',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      1 => 
      array (
        'text' => 'Настройки системы',
        'parent' => 'system',
        'action' => 70,
        'description' => 'Изменение и создание системных настроек.',
        'icon' => 'images/icons/sysinfo.gif',
        'menuindex' => 1,
        'params' => '',
        'handler' => '',
        'permissions' => 'settings',
        'controller' => 'system/settings',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      2 => 
      array (
        'text' => 'Управление словарями',
        'parent' => 'system',
        'action' => 71,
        'description' => 'Изменение любых языковых строк в бэкэнде MODX.',
        'icon' => 'images/icons/logging.gif',
        'menuindex' => 2,
        'params' => '',
        'handler' => '',
        'permissions' => 'lexicons',
        'controller' => 'workspaces/lexicon',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      3 => 
      array (
        'text' => 'Типы содержимого',
        'parent' => 'system',
        'action' => 72,
        'description' => 'Вы можете добавить новые типы содержимого для ресурсов,например такие как .html, .js, и т.д..',
        'icon' => 'images/icons/logging.gif',
        'menuindex' => 3,
        'params' => '',
        'handler' => '',
        'permissions' => 'content_types',
        'controller' => 'system/contenttype',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      4 => 
      array (
        'text' => 'Контексты',
        'parent' => 'system',
        'action' => 73,
        'description' => 'Управление контекстами сайта и их настройками.',
        'icon' => 'images/icons/sysinfo.gif',
        'menuindex' => 4,
        'params' => '',
        'handler' => '',
        'permissions' => 'view_context',
        'controller' => 'context',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      5 => 
      array (
        'text' => 'Действия',
        'parent' => 'system',
        'action' => 74,
        'description' => 'Управление действиями и структурой верхнего меню.',
        'icon' => 'images/icons/sysinfo.gif',
        'menuindex' => 5,
        'params' => '',
        'handler' => '',
        'permissions' => 'menus,actions',
        'controller' => 'system/action',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      6 => 
      array (
        'text' => 'Пространства имён',
        'parent' => 'system',
        'action' => 75,
        'description' => 'Управление пространствами имён. Пространства имён служат отличительным признаком между разными компонентами добавляемыми пользователями.',
        'icon' => '',
        'menuindex' => 6,
        'params' => '',
        'handler' => '',
        'permissions' => 'namespaces',
        'controller' => 'workspaces/namespace',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
    ),
  ),
  7 => 
  array (
    'text' => 'Пользователь',
    'parent' => '',
    'action' => 0,
    'description' => '',
    'icon' => 'images/icons/user_go.png',
    'menuindex' => 7,
    'params' => '',
    'handler' => '',
    'permissions' => 'menu_user',
    'controller' => '',
    'namespace' => NULL,
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Профиль',
        'parent' => 'user',
        'action' => 76,
        'description' => 'Обновить ваш профиль.',
        'icon' => '',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'change_profile',
        'controller' => 'security/profile',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
      1 => 
      array (
        'text' => 'Сообщения',
        'parent' => 'user',
        'action' => 77,
        'description' => 'Просмотр ваших сообщений и отправка новых сообщений пользователям.',
        'icon' => 'images/icons/messages.gif',
        'menuindex' => 1,
        'params' => '',
        'handler' => '',
        'permissions' => 'messages',
        'controller' => 'security/message',
        'namespace' => 'core',
        'children' => 
        array (
        ),
      ),
    ),
  ),
  8 => 
  array (
    'text' => 'Поддержка',
    'parent' => '',
    'action' => 0,
    'description' => '',
    'icon' => 'images/icons/sysinfo.gif',
    'menuindex' => 8,
    'params' => '',
    'handler' => '',
    'permissions' => 'menu_support',
    'controller' => '',
    'namespace' => NULL,
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Форум',
        'parent' => 'support',
        'action' => 0,
        'description' => 'Перейти на официальный форум MODX.',
        'icon' => 'images/icons/sysinfo.gif',
        'menuindex' => 0,
        'params' => '',
        'handler' => 'window.open("http://modx.com/forums");',
        'permissions' => '',
        'controller' => '',
        'namespace' => NULL,
        'children' => 
        array (
        ),
      ),
      1 => 
      array (
        'text' => 'База знаний',
        'parent' => 'support',
        'action' => 0,
        'description' => 'Перейти на MODX вики, где хранится документация для MODX Revolution.',
        'icon' => 'images/icons/sysinfo.gif',
        'menuindex' => 1,
        'params' => '',
        'handler' => 'window.open("http://rtfm.modx.com/");',
        'permissions' => '',
        'controller' => '',
        'namespace' => NULL,
        'children' => 
        array (
        ),
      ),
      2 => 
      array (
        'text' => 'Сообщить об ошибке',
        'parent' => 'support',
        'action' => 0,
        'description' => 'Перейти на багтрекер MODX.',
        'icon' => 'images/icons/sysinfo.gif',
        'menuindex' => 2,
        'params' => '',
        'handler' => 'window.open("http://bugs.modx.com/projects/revo/issues");',
        'permissions' => '',
        'controller' => '',
        'namespace' => NULL,
        'children' => 
        array (
        ),
      ),
      3 => 
      array (
        'text' => 'Документация по API',
        'parent' => 'support',
        'action' => 0,
        'description' => 'Документации по API MODX Revolution.',
        'icon' => 'images/icons/sysinfo.gif',
        'menuindex' => 3,
        'params' => '',
        'handler' => 'window.open("http://api.modx.com/revolution/2.2/");',
        'permissions' => '',
        'controller' => '',
        'namespace' => NULL,
        'children' => 
        array (
        ),
      ),
    ),
  ),
);