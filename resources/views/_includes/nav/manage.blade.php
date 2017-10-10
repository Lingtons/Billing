
<div class="columns is-fullheight p-l-10 p-t-10">
    <div class="column is-2 is-sidebar-menu is-hidden-mobile">
<aside class="menu">
  <p class="menu-label is-hidden-touch">Navigation</p>
  <ul class="menu-list">
    <li>
      <a href="{{route('manage.dashboard')}}" class="">
        <span class="icon"><i class="fa fa-home"></i></span> Dashboard
      </a>
    </li>
    <li>
      <a href="#" class="is-active">
        <span class="icon"><i class="fa fa-table"></i></span> Administration
      </a>

      <ul>
        <li>
          <a href="{{route('users.index')}}">
            <span class="icon is-small"><i class="fa fa-link"></i></span> Manage Users
          </a>
        </li>
        <li>
          <a href="{{route('permissions.index')}}">
            <span class="icon is-small"><i class="fa fa-link"></i></span> Roles &amp; Permissions
          </a>
          <ul>
          <li><a href="{{route('roles.index')}}">Roles</a></li>
          <li><a href="{{route('permissions.index')}}">Permissions</a></li>
        </ul>
        </li>
      </ul>
    </li>
    <li>
      <a href="#" class="">
        <span class="icon"><i class="fa fa-info"></i></span> About
      </a>
    </li>
  </ul>
</aside>
</div>
<div class="column is-main-content m-r-15" >
    @yield('content')
  </div>

</div>
 