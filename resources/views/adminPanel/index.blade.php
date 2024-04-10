<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!--==================================REMIXICONS=======================================-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
        <!--=========================================================================-->

        <link rel="stylesheet" href="{{url('assets/css/stylea.css')}}">

       
    </head>
    <body class="antialiased">
        <header class="header">
            <div class="header-container container">
                <div class="logo">
                    <a href="{{url('/')}}"> <img src="{{url('assets/images/logo-paysage.png')}}" alt="logo" class="logo-img"> </a>
                </div>
                <div class="user-auth"> 
                 
                  @auth
             <div class="header-amin__detail-name"><i class="ri-admin-fill"></i><span>{{ Auth::user()->name }}</span></div>
             <form method="POST" action="{{route('logout')}}">
                @csrf
                    <button>{{ __('Log Out') }}</button>
            </form>
            @endauth</div>
            </div>
        </header>
        <main class="main">
            <div class="main-container container">
                <div class="header-header">
                  <div class="header-header__time">
                    <div class="header-header__spec header-header__timely">date</div>
                      <div class="header-header__daily header-header__timely">Today</div>
                      <div class="header-header__mounthly header-header__timely">Mounth</div>
                      <div class="header-header__yearly header-header__timely">Year</div>
                      <div class="header-header__total header-header__timely">Total</div>
                  </div>
                   <div class="header-header__container">
                        <div class="header-block">
                            <div class="header-block_content">
                                <span>4 viewers</span>
                            </div>
                        </div>
                        <div class="header-block">
                            <div class="header-block_content">
                                <span>4 viewers</span>
                            </div>
                        </div>
                        <div class="header-block">
                            <div class="header-block_content">
                                <span>4 viewers</span>
                            </div>
                        </div>
                   </div>
                </div>
                <div class="side-side">
                    <div class="side-side__toggle">
                      <i class="ri-menu-fill"></i>
                    </div>
    
                 <div class="side-side__container">
                    <div class="side-side__close">
                        <i class="ri-close-fill"></i>
                    </div>
                    <div class="side-menu__top">
                        <div class="side-title"><span><a href="">Dashboard</a></span></div>
                        <div class="side-toggle"><i class="ri-menu-fill"></i></div>
                    </div>
                      <div class="side-menu">

                        <div class="side-menu__menu">
                            
                           <ul class="side-menu__lists">
                            {{-- <div class="side-menu__lists"> --}}
                               <li class="side-menu__icon"><i class="ri-article-fill"></i></li>
                               <li class="side-menu__list">

                                <span> <a href="{{route('card.index')}}">Card</a> </span> 
                                <ul class="side-menu__roll-lists">
                                    <li class="side-menu__list-roll__lists"> 
                                        <i class="ri-apps-fill"> </i> <a href="" class="side-menu__roll-link">index</a> 
                                    </li>

                                    <li class="side-menu__list-roll__lists"> 
                                        <i class="ri-user-fill"></i><a href="" class="side-menu__roll-link">***</a> 
                                    </li>
                                </ul>

                               </li>
                           {{-- </div> --}}
                           </ul>
                        </div>

                        <div class="side-menu__menu">
                            <ul class="side-menu__lists">
                                {{-- <div class="side-menu__lists"> --}}
                                <li class="side-menu__icon"><i class="ri-settings-3-fill"></i></li>
                                <li class="side-menu__list">
                                    <span><a href="{{route('employee.index')}}"> Employee </a></span> 
                                    <ul class="side-menu__roll-lists">
                                        <li class="side-menu__list-roll__lists"> 
                                            <i class="ri-apps-fill"></i> <a href="" class="side-menu__roll-link">category</a> 
                                        </li>
    
                                        <li class="side-menu__list-roll__lists"> 
                                            <i class="ri-user-fill"></i><a href="" class="side-menu__roll-link">user</a> 
                                        </li>
                                    </ul>
                                </li>
                                {{-- </div> --}}
                               
                            </ul>
                         </div>

                        <div class="side-menu__menu">
                            <ul class="side-menu__lists">
                                {{-- <div class="side-menu__lists"> --}}
                                <li class="side-menu__icon"><i class="ri-settings-3-fill"></i></li>
                                <li class="side-menu__list">
                                    <span>Setting</span> 
                                    <ul class="side-menu__roll-lists">
                                        <li class="side-menu__list-roll__lists"> 
                                            <i class="ri-apps-fill"></i> <a href="{{route('role.index')}}" class="side-menu__roll-link">category</a> 
                                        </li>
    
                                        <li class="side-menu__list-roll__lists"> 
                                            <i class="ri-user-fill"></i><a href="" class="side-menu__roll-link">user</a> 
                                        </li>
                                    </ul>
                                </li>
                                {{-- </div> --}}
                               
                            </ul>
                         </div>
    
                      </div>
                 </div>
                </div>
                <div class="main-main main-main__container">
                  @yield('sectionC')
                  
                </div> 

                
            </div>
        </main>
        <footer class="footer">
            <div class="footer-container container">
                <span>all right reserved ONT</span>
            </div>
        </footer>
    
        <script src="{{url('assets/js/indexa.js')}}"></script>
    </body>
</html>


