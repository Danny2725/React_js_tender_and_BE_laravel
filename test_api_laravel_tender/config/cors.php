<?php
return [

    /*
    |--------------------------------------------------------------------------
    | CORS Paths
    |--------------------------------------------------------------------------
    |
    | Define the paths where CORS will apply. Typically, this will be your
    | API paths, but you can adjust them as necessary. You can use wildcards.
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie', 'admin/*', '/*' ],

    /*
    |--------------------------------------------------------------------------
    | Allowed Methods
    |--------------------------------------------------------------------------
    |
    | This determines the HTTP methods that are allowed to make requests. You
    | can allow all methods by using ['*'] or specify specific methods like
    | ['GET', 'POST', 'PUT', 'DELETE'].
    |
    */

    'allowed_methods' => ['*'],  // Cho phép tất cả các phương thức HTTP

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | Here you can specify the domains that are allowed to make requests. Using
    | ['*'] will allow all origins. You can also specify specific domains such as
    | ['http://example.com'] or use patterns ['*.example.com'].
    |
    */

    'allowed_origins' => ['*'],  // Cho phép tất cả các nguồn gốc (thay '*' bằng domain cụ thể nếu cần)

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins Patterns
    |--------------------------------------------------------------------------
    |
    | Similar to "allowed_origins", but allows you to specify patterns that
    | match multiple origins. Useful for allowing subdomains with a pattern.
    |
    */

    'allowed_origins_patterns' => [],

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | These headers are allowed in the incoming requests. Use ['*'] to allow
    | all headers or specify specific headers as needed.
    |
    */

    'allowed_headers' => ['*'],  // Cho phép tất cả các headers

    /*
    |--------------------------------------------------------------------------
    | Exposed Headers
    |--------------------------------------------------------------------------
    |
    | If you need to expose specific headers to the client, you can specify them
    | here. These headers will be accessible in the client-side code.
    |
    */

    'exposed_headers' => [],

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | This value controls how long (in seconds) the results of a preflight
    | request can be cached by the browser. A value of 0 means no caching.
    |
    */

    'max_age' => 0,

    /*
    |--------------------------------------------------------------------------
    | Supports Credentials
    |--------------------------------------------------------------------------
    |
    | If you want to allow credentials (such as cookies or HTTP authentication)
    | to be included in the requests, set this value to true.
    |
    */

    'supports_credentials' => false,  // Đặt thành true nếu bạn muốn sử dụng cookies qua CORS
];

?>