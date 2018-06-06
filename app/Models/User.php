<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['gender',
        'birthdate',
        'firstname',
        'lastname',
        'email',
        'telephone',
        'password',
        'confirmation_code',
        'auto_created',
        'confirmed',
        'facebook_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password',
        'confirmation_code',
        'confirmed',
        'remember_token',
        'token'];


    protected $dates = ['created_at',
        'updated_at',
        'trial_ends_at',
        'subscription_ends_at'];


    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function ownsAdvert($id)
    {
        return Advert::whereId($id)->where('user_id', $this->id)->exists();
    }

    public function ownsAdvertBySlug(string $slug)
    {
        return Advert::whereSlug($slug)->where('user_id', $this->id)->exists();
    }

    public function getFirstAdvertForUser($userid){
        return Advert::where('user_id', $userid)->first();
    }

    public function hasAdvertsCredits($id = NULL)
    {
        return $this->__hasCredit($id, 'adverts_credit');
    }

    public function hasPremiumCredits($id = NULL)
    {
        return $this->__hasCredit($id, 'premium_credit');
    }

    private function __hasCredit($id = NULL, $field)
    {
        $id = $id == NULL ? \Auth::user()->id : $id;

        $user = self::find($id);

        if ($user == NULL) return false;

        return $user->$field >= 1 ? true : false;
    }

    public function hasStripeAccount($id = NULL)
    {
        $id = $id == NULL ? \Auth::user()->id : $id;

        $user = self::find($id);

        if ($user == NULL) return false;

        return $user->stripe_customer_id == NULL ? false : true;
    }

    public function incrementQuantity(PaymentPackages $product)
    {
        if ($product->type == 'advert')
            $this->adverts_credit += $product->quantity;

        if ($product->type == 'premium')
            $this->premium_credit += $product->quantity;

        return $this->save();
    }

    public function decrementAdvertsCredit(Job $job)
    {
        if (!$job->paid) {
            $this->adverts_credit--;
            $job->paid = 1;
            $job->save();
        }

        return $this->save();
    }

    /**
     * @param $userData
     * @return static
     *
     */
    public function findByUsernameOrCreate($userData)
    {

        return User::firstOrCreate([
                                       'username' => $userData->name,
                                       'email'    => $userData->email,
                                   ]);
    }

    public static function newUser(string $firstname, string $lastname, string $email, string $password)
    {
        return User::create([
                                'firstname'         => $firstname,
                                'lastname'          => $lastname,
                                'email'             => $email,
                                'password'          => bcrypt($password),
                                'confirmation_code' => str_random(30),
                            ]);
    }

    public function updateUser(array $data)
    {
        //checking that the email is unique
        if ($this->email != $data['email']) {
            $alreadyTaken = static::whereEmail($data['email'])->exists();

            if ($alreadyTaken) return false;
        }

        $this->username  = $data['username'];
        $this->email     = $data['email'];
        $this->telephone = $data['telephone'];

        return $this->save();
    }

    /**
     * Confirm the user.
     *
     * @return void
     */
    public function confirmEmail()
    {
        if ($this->confirmed == 0) {
            $this->confirmed = -1;
            $this->save();
            return;
        }

        if ($this->confirmed == -1) {
            $this->confirmed         = true;
            $this->confirmation_code = null;
            $this->save();
        }
    }

    public function hasConfirmedAccount()
    {
       return $this->confirmed == true;
    }

    public function generateForgottenToken()
    {
        $this->forgotten_token = str_random(30);
        $this->save();
    }

    public function confirmResetPassword(array $data)
    {
        $this->password        = bcrypt($data['password']);
        $this->forgotten_token = NULL;
        $this->save();
    }


    public static function getUserFromToken($token)
    {
        return User::where('forgotten_token', $token)->first();
    }


    public function isMandatoryProfileInComplete() : bool
    {
        return ($this->gender == null) or ($this->birthdate == null) or ($this->telephone == null);
    }

    public function isAdmin()
    {
        return $this->is_admin == 1;
    }
}
