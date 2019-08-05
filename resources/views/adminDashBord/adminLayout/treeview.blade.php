<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>

    <li class="treeview">
        <a href="#">
            <i class="fas fa-flag" style="padding-right: 1pc"> </i> <span>  Governorate</span>
            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('/governorate')}}"><i  class="fas fa-eye" style="padding-right: 1pc"></i>  show Governorate</a></li>
            <li><a href="{{url('/create')}}"><i class="fas fa-plus" style="padding-right: 1pc"></i>  Add Governorate</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fas fa-city" style="padding-right: 1pc"></i> <span>Cities</span>
            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('/city')}}"><i  class="fas fa-eye" style="padding-right: 1pc"></i>  show cities</a></li>
            <li><a href="{{url('/create_city')}}"><i class="fas fa-plus" style="padding-right: 1pc"></i>  Add city</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fas fa-list-ul" style="padding-right: 1pc"></i> <span>Categories</span>
            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('/category')}}"><i  class="fas fa-eye" style="padding-right: 1pc"></i>  show Cateogoreis</a></li>
            <li><a href="{{url('/create_category')}}"><i class="fas fa-plus" style="padding-right: 1pc"></i>  Add Cateogoreis</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">

            <i class="fa fa-paste" style="padding-right: 1pc"></i> <span>Posts</span>
            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('/posts')}}"><i  class="fas fa-eye" style="padding-right: 1pc"></i>  show Posts</a></li>
            <li><a href="{{url('/create_category')}}"><i class="fas fa-plus" style="padding-right: 1pc"></i>  Add Post</a></li>
        </ul>
    </li>


    <li class="active">
        <a href='{{url('/client')}}'>
            <i class="fas fa-users" style="padding-right: 1pc"></i>  <span>  Clients</span>
        </a>
    </li>



    <li class="active">
        <a href='{{url('/contacts')}}'>
            <i class="fas fa-envelope" style="padding-right: 1pc"></i>  <span>  Contacts</span>
        </a>
    </li>

    <li class="active">
        <a href='{{url('/app_settings')}}'>
            <i class="fas fa-cogs" style="padding-right: 1pc"></i>  <span>  App Settings</span>
        </a>
    </li>

    <li class="active">
        <a href='{{url('/donations')}}'>
            <i class="fas fa-cogs" style="padding-right: 1pc"></i> <span>  Donation Requests</span>
        </a>
    </li>

    <li class="active">
        <a href='{{url('/reset')}}'>
            <i class="fal fa-hospital-user"></i> <span>  Reset Password</span>
        </a>
    </li>



</ul>