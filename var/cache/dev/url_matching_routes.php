<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/authors' => [[['_route' => 'author', '_controller' => 'App\\Controller\\AuthorController::getAuthors'], null, ['GET' => 0], null, false, false, null]],
        '/api/books' => [
            [['_route' => 'book', '_controller' => 'App\\Controller\\BookController::getBooks'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'createBook', '_controller' => 'App\\Controller\\BookController::createBook'], null, ['POST' => 0], null, false, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api/(?'
                    .'|authors/([^/]++)(*:66)'
                    .'|books/([^/]++)(?'
                        .'|(*:90)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        66 => [[['_route' => 'detailAuthor', '_controller' => 'App\\Controller\\AuthorController::getDetailAuthor'], ['id'], ['GET' => 0], null, false, true, null]],
        90 => [
            [['_route' => 'detailBook', '_controller' => 'App\\Controller\\BookController::getDetailBook'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'deleteBook', '_controller' => 'App\\Controller\\BookController::DeleteBook'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'updateBook', '_controller' => 'App\\Controller\\BookController::updateBook'], ['id'], ['PUT' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
