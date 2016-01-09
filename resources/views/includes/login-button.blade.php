@if (! Auth::check())            
<div class="login-button pull-right span6">
                <a href="/auth/login" class="btn btn-info btn-md">
                    <span class="glyphicon glyphicon-log-in"></span>
                    Log In</a>
            </div> 
@endif   
