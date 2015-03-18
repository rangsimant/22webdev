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
            'scope'         => array('email','read_friendlists','user_online_presence'),
        ),		

        'Google' => array(
		    'client_id'     => 'Your Google client ID',
		    'client_secret' => 'Your Google Client Secret',
		    'scope'         => array('userinfo_email', 'userinfo_profile'),
		), 

	)

);