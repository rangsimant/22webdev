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
            'scope'         => array('email','user_friends'),
            // 'scope'         => array('email','user_friends','user_education_history','manage_notifications','read_mailbox','read_page_mailboxes'),
        ),
        /**  
         * Google
         */ 
        'Google' => array(
            'client_id'     => '143048644270-6uag6b9n25pabor0hktkl4456eee8l8n.apps.googleusercontent.com',
            'client_secret' => 'YZS_2F_xd50ChIji9qXL3gzQ',
            'scope'         => array('userinfo_email', 'userinfo_profile'),
        ),        

    )

);