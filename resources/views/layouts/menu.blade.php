@if(Auth::user()->hasRole('Admin'))
<li class="{{ Request::is('home_admin*') ? 'active' : '' }}">
    <a href="{!!URL::to('home_admin')!!}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
</li>
<li class="treeview">
    <a href="">
        <i class="fa fa-users"></i><span>Users Management</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        
        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>Roles</span></a>
        </li>
        <li class="{{ Request::is('user_list*') ? 'active' : '' }}">
            <a href="{!!URL::to('user_list')!!}"><i class="fa fa-user-circle"></i><span>Users</span></a>
        </li>
        <li>
            <a  href="{!!URL::to('logActivity')!!}"><i class="fa fa-calendar"></i><span>Activity Logs</span></a>
        </li>
        <li class="{{ Request::is('pcategories*') ? 'active' : '' }}">
            <a href="{{ route('pcategories.index') }}"><i class="fa fa-edit"></i><span>Product Categories</span></a>
        </li>
        <li>
            <a href="{!! URL::to('regi') !!}"><i class="fa fa-edit"></i><span>Registrations</span></a>
        </li>
    </ul>
</li>
<li class="treeview">
    <a href="">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i><span>Report</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        
        <li class="{{ Request::is('adDay*') ? 'active' : '' }}">
            <a href="{!!URL::to('adDay')!!}"><i class="fa fa-calendar-day"></i><span>Daily</span></a>
        </li>
        <li class="{{ Request::is('adweek*') ? 'active' : '' }}">
            <a href="{!!URL::to('adweek')!!}"><i class="fa fa-calendar-week"></i><span>Weekly</span></a>
        </li>
        <li>
            <a  href="{!!URL::to('admonthly')!!}"><i class="fa fa-calendar"></i><span>Monthly</span></a>
        </li>
        <li>
            <a  href="{!!URL::to('daybtwview')!!}"><i class="fa fa-calendar"></i><span>Day Between</span></a>
        </li>
        <li class="{{ Request::is('report*') ? 'active' : '' }}">
            <a href="{!!URL::to('report')!!}"><i class="fa fa-thermometer-full"></i><span>Whole Report</span></a>
        </li>
    </ul>
</li>
<li>
    <a href="confirm_order"><i class="fa fa-cart-plus" aria-hidden="true"></i><span>Confirm Order Line</span></a>
</li>

<li class="treeview">
    <a href="">
        <i class="fa fa-door-closed"></i><span>My Shop</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        
        @endif
        {{-- @if (Auth::user()->hasRole('Seller')) --}}
        <li>
            <a href="dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
        </li>
        {{-- @endif --}}
        @if(Auth::user()->hasRole('Seller'))
        <li class="{{ Request::is('catego*') ? 'active' : '' }}">
            <a  href="{!!URL::to('catego')!!}"><i class="fa fa-cart-plus"></i><span>Add Product</span></a>
        </li>
        <li class="{{ Request::is('agreement*') ? 'active' : '' }}">
            <a  href="{!!URL::to('agreement')!!}"><i class="fa fa-building" aria-hidden="true"></i><span>My Companies</span></a>
        </li>
        <li>
         <a href="{!!URL::to('myProduct')!!}"><i class="fa fa-cart-arrow-down"></i><span>Your Products</span></a>
        </li>
        <li>
            <a href="{!! URL::to('received') !!}"><i class="fa fa-truck"></i><span>Received Orders</span><span class="badge badge-light pull-right">9</span></a>
        </li>
        <li>
            <a  href="{!!URL::to('salesreport')!!}"><i class="fa fa-newspaper-o"></i><span>Print Report</span></a>
        </li>
        <li>
            <a href="{!! URL::to('feedback') !!}"><i class="fa fa-comment-smile"></i><span>Feedback</span></a>
        </li>
        @endif
        @if(Auth::user()->hasRole('Admin'))
    </ul>
    @endif
    @if (Auth::user()->hasRole('Seller'))
    <li class="treeview">
        <a href="">
            <i class="fa fa-bullhorn" aria-hidden="true"></i><span>My Auction</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            
            <li class="{{ Request::is('my_auction*') ? 'active' : '' }}">
                <a href="{!!URL::to('my_auction')!!}"><i class="fa fa-bullhorn" aria-hidden="true"></i><span>My Auctions</span></a>
            </li>
            <li>
                <a href="{!!URL::to('approvedbid')!!}"><i class="fal fa-dna"></i><span> Pending for Auction</span></a>
            </li>
            <li class="{{ Request::is('user_list*') ? 'active' : '' }}">
                <a  href="{!!URL::to('winner')!!}"><i class="fas fa-trophy-alt"></i><span> Winners</span></a>
            </li>
            <li class="{{ Request::is('addAuction*') ? 'active' : '' }}">
                <a href="{!!URL::to('addAuction')!!}"><i class="fa fa-edit" aria-hidden="true"></i><span>Post An Auction</span></a>
            </li>
        </ul>
    </li>
    
    @endif
    {{-- <li>
        <a href="order_history"><i class="fa fa-history"></i><span>Order History</span></a>
    </li> --}}
    <li class="treeview">
        <a href="">
            <i class="fa fa-gavel" style="font-size: 15px"></i><span>Auctions</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                <a href="{!!URL::to('my_bid')!!}"><i class="fa fa-bullhorn" aria-hidden="true"></i><span>My Bids</span></a>
            </li>
            <li class="{{ Request::is('user_list*') ? 'active' : '' }}">
                <a  href="{!!URL::to('approvedbid_user')!!}"><i class="fa fa-check"></i><span>Approved Auction</span></a>
            </li>
            <li class="{{ Request::is('user_list*') ? 'active' : '' }}">
                <a  href="{!!URL::to('won_bid')!!}"><i class="fas fa-trophy-alt"></i><span> Won Package</span></a>
            </li>
            <li>
                <a href="{!! URL::to('bid_feedback') !!}"><i class="fa fa-comment-smile"></i><span>Feedback</span></a>
            </li>
            
        </ul>
    </li>
    <li>
        <a  href="{!!URL::to('user_profile')!!}"><i class="fa fa-user-alt"></i><span>Profile</span></a>
    </li>
    {{-- <li>
        <a href="my_address"><i class="fa fa-home"></i><span>My Address</span></a>
    </li> --}}
    <li>
        <a href="{!!URL::to('my_order')!!}"><i class="fa fa-edit"></i><span>My Orders</span></a>
    </li>
    <li>
        <a href="{!!URL::to('wish_list')!!}"><i class="fa fa-heart"></i><span>Wishlist</span></a>
    </li>
    <li>
        <a  href="{!!URL::to('/')!!}"><i class="fa fa-cart-plus"></i><span>Back to Shop</span></a>
    </li>
    <li>
        <a  href="{!!URL::to('change')!!}"><i class="fa fa-unlock"></i><span>Change Password </span></a>
    </li>
    <li>
        <a href="{!!URL::to('sell_with')!!}"><i class="fa fa-shopping-bag"></i><span>Sell with us</span></a>
    </li>
    
    
</ul>
<script type="application/javascript">
    /** add active class and stay opened when selected */
    var url = window.location;
    // for treeview
    $('ul.treeview-menu a').filter(function() {
        return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
</script>
