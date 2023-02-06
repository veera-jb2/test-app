<?php

return [

    'roles' => ['admin', 'member'] ,
    'admin_routes' => ['dashboard','project.index','project.create','task.index','task.create','task.edit','project.invite','project.team.create','project.all_projects'],
    'member_routes' => ['dashboard','project.index','task.index','task.edit','project.all_projects']
];
