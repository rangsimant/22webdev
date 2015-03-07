<?php
/**
 * Login user with facebook
 *
 * @return void
 */

class FacebookController extends Controller 
{

    private $user;

    /**
     * @var UserRepository
     */
    protected $userRepo;

    public function __construct(User $user,FacebookRepository $userRepo)
    {
        $this->user = $user;
        $this->userRepo = $userRepo;
    }
    public function loginWithFacebook() 
    {
        // get data from input
        $code = Input::get( 'code' );

        // get fb service
        $fb = OAuth::consumer( 'Facebook' );

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {

            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken( $code );

            // Send a request with it
            $result = json_decode( $fb->request( '/me' ), true );

            $user = User::select('username','idSocial')->where('idSocial',$result['id'])->get();

            // create new account Facebook to database

            // check Available account
            if (!isset($user[0]))
            {
                $idFacebook = $result['id'];
                $first_name = $result['first_name'];
                $last_name = $result['last_name'];
                $email = $idFacebook.'@facebook.com';
                if (isset($result['email']))
                    $email = $result['email'];

                $newAccount = array(
                    'id'=>$idFacebook,
                    'username'=>$idFacebook,
                    'password'=>$idFacebook,
                    'first_name'=>$first_name,
                    'last_name'=>$last_name,
                    'email'=>$email,
                    'confirmed'=>'1',
                    'channel'=>'facebook'

                    );
                $affectedRow = $this->create($newAccount);

                $login = array(
                    'email'=>$idFacebook,
                    'password'=>$idFacebook,
                    'remember'=>'0'
                    );
            }
            else
            {
                $login = array(
                    'email'=>$user[0]->username,
                    'password'=>$user[0]->username,
                    'remember'=>'0'
                    );
                $this->user->updateAccount($result);
            }
            $this->doLogin($login);
            return Redirect::to('/');

        }
        // if not ask for permission first
        else {
            // get fb authorization
            $url = $fb->getAuthorizationUri();
            // return to facebook login url
            return Redirect::to( (String)$url );
        }

    }

    private function create($value)
    {
        $user = $this->userRepo->signup($value);
        if ($user->id) {
            if (Config::get('confide::signup_email')) {
                Mail::queueOn(
                    Config::get('confide::email_queue'),
                    Config::get('confide::email_account_confirmation'),
                    compact('user'),
                    function ($message) use ($user) {
                        $message
                            ->to($user->email, $user->username)
                            ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
                    }
                );
            }

            return Redirect::to('user/login')
                ->with('success', Lang::get('user/user.user_account_created'));
        } else {
            $error = $user->errors()->all(':message');
            return Redirect::to('user/create')
                ->withInput(Input::except('password'))
                ->with('error', $error);
        }

    }

    private function doLogin($value)
    {
        $repo = App::make('FacebookRepository');
        $input = $value;

        if ($this->userRepo->login($input)) {
            return Redirect::intended('/');
        } else {
            if ($this->userRepo->isThrottled($input)) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ($this->userRepo->existsButNotConfirmed($input)) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }
            return Redirect::to('user/login')
                ->withInput(Input::except('password'))
                ->with('error', $err_msg);
        }
    }
}