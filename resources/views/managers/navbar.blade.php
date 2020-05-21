<link rel="dns-prefetch" href="//fonts.gstatic.com">
<script src="{{ asset('js/app.js') }}" defer></script>
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/chart')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/managers')}}">Managers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/userList')}}">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/manager/managerPage')}}">Your profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/book')}}">Books</a>
      </li>
      <li class="dropdown">
                                <h4 class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Welcome  {{ Auth::user()->username }} <span class="caret"></span>
                                </h4>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div>
                                    @if(Auth::user()->avatar)
                                    <img  style=" vertical-align: middle; width: 80px;height: 80px;border-radius: 50%;" src="/images/{{Auth::user()->avatar}}" alt="avatar"> 
                                    @else
                                    <img  style=" vertical-align: middle; width: 80px;height: 80px;border-radius: 50%;" src="/images/avatar.png" alt="avatar"> 
                                    @endif
                                </div>
                            </li>
    </ul>
  </div>
</nav>