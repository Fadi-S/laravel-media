<?php

namespace App;

class Permission
{
    public static function permissions() {
    	return [
    		'Test Group 1' => [
    			'id' => 1,
    			'permissions' => [
    				'Test1' => 1,
    				'Test2' => 2
    			]
    		],
    	
    		'Test Group 2' => [
    			'id' => 2,
    			'permissions' => [
    				'Test1' => 3,
    				'Test2' => 4
    			]
    		]
    	
    	];
    }
}
