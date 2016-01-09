     <!-- Static navbar -->
      <nav class="navbar navbar-default">
             <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class=""><a href="/auth/register">Candidates</a></li>
                    <li class="upload-cv"><a href="/auth/register">Upload CV</a></li>
                </ul>
            <div> 
              <a class="nav-brand" href="/"><img class="logo-header" src="/logo.png"></img></a>
            </div>
@if (Auth::check())
            
            <ul class="nav navbar-nav navbar-right">

               @if(Auth::user()->hasRole('recruiter') or Auth::user()->hasRole('admin') )
                  <li class="header-newadvert"><a href="/new">New Advert</a></li>
                  <li class="header-myadverts"><a href="/my_adverts">My adverts</a></li>
               @endif
               @if(Auth::user()->hasRole('candidate') or Auth::user()->hasRole('admin'))
                  <li class="header-myapplications"><a href="/my_applications">My applications</a></li>
               @endif
              <li class="header-username"><a href="/user/profile">{{ Auth::user()->username }}  </a></li>
              <li class="header-logout"><a href="/auth/logout">| Logout</a></li>
            </ul>
@else
            <ul class="nav navbar-nav navbar-right">
              <li class="navbar-rightish"><a href="/auth/register">Recruiters</a></li>
            </ul>
@endif
        </div>
        @section('login-button')
            @include('includes.login-button')
        @show
      </nav> 
