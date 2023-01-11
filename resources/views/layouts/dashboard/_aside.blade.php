<!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <img src="{{asset('dashboard/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel d-flex">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <div class="image">
            <img src="{{asset('dashboard/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <span href="#" class="">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</span>
          </div>
        </a>
        <ul class="dropdown-menu" style="width:170px;">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{asset('dashboard/img/user2-160x160.jpg')}}" style="height:50px;width:50px" class="" alt="User Image">
                    <p class="mt-3 bold" style="font-size: 1.5rem">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</p>
                    <small class="pr-2 pl-2">Member since {{auth()->user()->created_at}}</small>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-left">
                      <!-- <a href="" class="btn btn-default btn-flat">Sign out</a> -->
                       <form action="{{ route('dashboard.logout') }}" method="get">
                            @csrf
                            <input type="submit" value="sign out" class="btn btn-default btn-flat">
                       </form>
                    </div>
                  </li>
        </ul>
        </div>
        <ol class="sidebar-menu" data-widget="">
            @if(auth()->user()->hasPermission('categories-read'))
            <li>
                <a href="{{route('dashboard.categories.index')}}"><i class="fa fa-th"></i><span> Categories</span></a>
            </li>
            @endif
        </ol>
        <ol class="sidebar-menu" data-widget="">
            @if(auth()->user()->hasPermission('products-read'))
            <li>
                <a href="{{route('dashboard.products.index')}}"><i class="fa fa-th"></i><span> Products</span></a>
            </li>
            @endif
        </ol>
        <ol class="sidebar-menu" data-widget="">
            @if(auth()->user()->hasPermission('clients-read'))
            <li>
                <a href="{{route('dashboard.clients.index')}}"><i class="fa fa-th"></i><span> Clients</span></a>
            </li>
            @endif
        </ol>
        <ol class="sidebar-menu" data-widget="">
            @if(auth()->user()->hasPermission('users-read'))
            <li>
                <a href="{{route('dashboard.users.index')}}"><i class="fa fa-th"></i><span> @lang('site.users')</span></a>
            </li>
            @endif
        </ol>
      <!-- /.sidebar -->
    </aside>

<div class="content-wrapper">
