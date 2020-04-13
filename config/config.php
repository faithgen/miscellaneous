<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    /**
     * The Prefix to the gallery routes.
     */
    'prefix'      => 'api',

    /**
     * add more middlewares here if any.
     */
    'middlewares' => [
        'api',
        'bindings', //used for route model binding
    ],

    /**
     * Link to goto on successful subscription.
     */
    'success-subscription-url' => 'http://localhost:8000/subscription-success/',
];
