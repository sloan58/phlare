<h1>{{ Lang::get('confide::confide.email.account_confirmation.subject') }}</h1>

<p>{{ Lang::get('confide::confide.email.account_confirmation.greetings', array( 'name' => $user->username)) }},</p>

<p>Please access the link below to confirm your account.  After you've confirmed your account, please follow these steps to complete your account setup:</br></br>
               1) Visit your user settings page by clicking your Username in the upper right hand corner of the screen, once logged in</br>
               2) Enter your Account Number and PIN - this will be used to authenticate you when calling into Phlare.  We recommend using your own phone number for the Account Number so it's easy to remember</br>
               3) If you'd like, fill in your first and last name.</br></br>
               Confirmation link:</p>
<a href='{{{ URL::to("user/confirm/{$user->confirmation_code}") }}}'>
    {{{ URL::to("user/confirm/{$user->confirmation_code}") }}}
</a>

<p>{{ Lang::get('confide::confide.email.account_confirmation.farewell') }}</p>
