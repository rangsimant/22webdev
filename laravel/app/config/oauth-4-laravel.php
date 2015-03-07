<?php
return array( 

    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    'storage' => 'Session', 

    /**
     * Consumers
     */
    'consumers' => array(

        /**
         * Facebook
         */
        'Facebook' => array(
            'client_id'     => '599818006801093',
            'client_secret' => '9e2ea858c35150511d9cad5b546b570b',
            'scope'         => array('email'),
        ),
        /**  
         * Google
         */ 
        'Google' => array(
            'client_id'     => '143048644270-rb42vvfh9v64quagq1vm1b398vp7tktm.apps.googleusercontent.com',
            'client_secret' => 'qO49uLxN5dVw6jQdnJZikFxl',
            'scope'         => array('userinfo_email', 'userinfo_profile'),
        ),        

    )

);