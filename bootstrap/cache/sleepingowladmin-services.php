<?php return array (
  'providers' => 
  array (
    0 => 'SleepingOwl\\Admin\\Providers\\AliasesServiceProvider',
    1 => 'Collective\\Html\\HtmlServiceProvider',
    2 => 'SleepingOwl\\Admin\\Providers\\BreadcrumbsServiceProvider',
    3 => 'SleepingOwl\\Admin\\Providers\\AdminServiceProvider',
  ),
  'eager' => 
  array (
    0 => 'SleepingOwl\\Admin\\Providers\\AliasesServiceProvider',
    1 => 'SleepingOwl\\Admin\\Providers\\AdminServiceProvider',
  ),
  'deferred' => 
  array (
    'html' => 'Collective\\Html\\HtmlServiceProvider',
    'form' => 'Collective\\Html\\HtmlServiceProvider',
    'Collective\\Html\\HtmlBuilder' => 'Collective\\Html\\HtmlServiceProvider',
    'Collective\\Html\\FormBuilder' => 'Collective\\Html\\HtmlServiceProvider',
    'sleeping_owl.breadcrumbs' => 'SleepingOwl\\Admin\\Providers\\BreadcrumbsServiceProvider',
    'SleepingOwl\\Admin\\Contracts\\Template\\Breadcrumbs' => 'SleepingOwl\\Admin\\Providers\\BreadcrumbsServiceProvider',
  ),
  'when' => 
  array (
    'Collective\\Html\\HtmlServiceProvider' => 
    array (
    ),
    'SleepingOwl\\Admin\\Providers\\BreadcrumbsServiceProvider' => 
    array (
    ),
  ),
);