<?php
return array(
	'controllers' => array(
		'invokables' => array(
			'MyModule\Controller\MyModule' => 'MyModule\Controller\MyModuleController'
		)
	),
	'router' => array(
		'routes' => array(
			'mymodule' => array(
				'type' => 'segment',
				'options' => array(
					'route' => '/mymodule[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id' => '[0-9]+'
					),
					'defaults' => array(
						'controller' => 'MyModule\Controller\MyModule',
						'action' => 'index'
					)
				)
			)
		)
	),
	'view_manager' => array(
		'mymodule_path_stack' => array(
			'mymodule' => __DIR__ . '/../view'
		),
	)
);