<?php
$config = array(
    '0' => array(
        'name' => 'Database',
        'type' => 'database',
        'config' => array(
            'hostname' => '127.0.0.1',
            'username' => 'administrator',
            'password' => 'asdfjkl;',
        ),
    ),
    '1' => array(
        'name' => 'Redis',
        'type' => 'redis',
        'config' => array(
            'host' => '192.168.200.125',
            'port' => '6379'
        ),
    ),
//    '2' => array(
//        'name' => '[Data Service] search_all_product',
//        'type' => 'api_curl_get',
//        'config' => array(
//            'url' => 'http://staging-data-service-api.truecorp.co.th/api/v1/mcp/product/search_all_product?thai_id=1341800066789',
//            'params' => array(),
//            'method' => 'get',
//        ),
//    ),
//    '3' => array(
//        'name' => '[Data Service] search_ccbs_invoice',
//        'type' => 'api_curl_get',
//        'config' => array(
//            'url' => 'http://staging-data-service-api.truecorp.co.th/api/v1/mcp/invoice/search_ccbs_invoice?service_number=0802340009',
//            'params' => array(),
//            'method' => 'get',
//        ),
//    ),
//    '4' => array(
//        'name' => '[Data Service] search_tru_invoice',
//        'type' => 'api_curl_get',
//        'config' => array(
//            'url' => 'http://staging-data-service-api.truecorp.co.th/api/v1/mcp/invoice/search_tru_invoice?service_number=029900600',
//            'params' => array(),
//            'method' => 'get',
//        ),
//    ),
//    '5' => array(
//        'name' => '[Data Service] search_tru_invoice',
//        'type' => 'api_curl_get',
//        'config' => array(
//            'url' => 'http://staging-data-service-api.truecorp.co.th/api/v1/mcp/invoice/search_tru_invoice?service_number=029900600I',
//            'params' => array(),
//            'method' => 'get',
//        ),
//    ),
//    '5' => array(
//        'name' => '[Data Service] Om api',
//        'type' => 'test_wsdl',
//        'config' => array(
//            'url' => 'http://172.19.136.56/ccbomws/services/OrderWs?WSDL',
//            'find_word' => 'ccbomws',
//        )
//    )
);
