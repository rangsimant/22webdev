<?php
/**
 * Login user with facebook
 *
 * @return void
 */

class GoogleController extends Controller 
{

    private $user;

    /**
     * @var UserRepository
     */
    protected $userRepo;

    public function __construct(User $user,GoogleRepository $userRepo)
    {
        $this->user = $user;
        $this->userRepo = $userRepo;
    }
    public function loginWithGoogle() {

        // get data from input
        $code = Input::get( 'code' );

        // get google service
        $googleService = OAuth::consumer( 'Google' );

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {

            // This was a callback request from google, get the token
            $token = $googleService->requestAccessToken( $code );

            // Send a request with it
            $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );


            $user = User::select('username','idSocial')->where('idSocial',$result['id'])->get();
            
            // create new account Google to database

            // check Available account
            if (!isset($user[0]))
            {
                $idGoogle = $result['id'];
                $first_name = $result['given_name'];
                $last_name = $result['family_name'];
                $email = $idGoogle.'@gmail.com';
                $picture = $result['picture'];
                if (isset($result['email']))
                    $email = $result['email'];

                $newAccount = array(
                    'id'=>$idGoogle,
                    'username'=>$idGoogle,
                    'password'=>$idGoogle,
                    'first_name'=>$first_name,
                    'last_name'=>$last_name,
                    'email'=>$email,
                    'confirmed'=>'1',
                    'channel'=>'google',
                    'picture'=> $picture

                    );
                $affectedRow = $this->create($newAccount);
                $message = 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
                echo $message. "<br/>";

                $login = array(
                    'email'=>$idGoogle,
                    'password'=>$idGoogle,
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

                $result['first_name'] = $result['given_name'];
                $result['last_name'] = $result['family_name'];
                $this->user->updateAccount($result);
            }
            $this->doLogin($login);
            return Redirect::to('/');

        }
        // if not ask for permission first
        else {
            // get googleService authorization
            $url = $googleService->getAuthorizationUri();

            // return to google login url
            return Redirect::to( (string)$url );
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