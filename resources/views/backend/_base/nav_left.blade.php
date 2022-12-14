@php
    if(Auth::guard('user')->check()){
        $username   = Auth::guard('user')->user()->display_name;
        $role       = Auth::guard('user')->user()->userRole->name;
    } else if(Auth::check()) {
        $username   = Auth::user()->display_name;
        $role       = Auth::user()->adminRole->name;
    } else {
        $username   = '- anonymous -';
        $role       = '- no login-';
    }
@endphp
<aside class="main-sidebar elevation-1 sidebar-light-secondary">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <span class="brand-text">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('img/backend/adminlte/avatar.png')}}" class="img-circle">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{$username}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul id="nav-left" class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">
                {{-- Use this if you need navigation header label. <li class="nav-header">MAIN NAVIGATION</li> --}}
                @if($role == 'super_admin')
                    <li class="nav-item has-treeview" id="tree_superadmins">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p> @lang('label.superAdmin')<i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li id="create_superadmin" class="nav-item">
                                <a href="{{route('admin.superadmin.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('label.createNew')</p>
                                </a>
                            </li>
                            <li id="list_superadmin" class="nav-item">
                                <a href="{{route('admin.superadmin.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('label.list')</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if($role == 'admin' || $role == 'super_admin')
                    {{-- Admin --}}
                    <li class="nav-item has-treeview" id="tree_admins">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p> @lang('label.admin') <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li id="create_admin" class="nav-item">
                                <a href="{{route('admin.admins.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('label.createNew')</p>
                                </a>
                            </li>
                            <li id="list_admin" class="nav-item">
                                <a href="{{route('admin.admins.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('label.list')</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Company --}}
                    <li class="nav-item has-treeview" id="tree_companies">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p> @lang('label.company')<i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li id="create_company" class="nav-item">
                                <a href="{{route('admin.company.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('label.createNew')</p>
                                </a>
                            </li>
                            <li id="list_company" class="nav-item">
                                <a href="{{route('admin.company.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('label.list')</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Employee --}}
                    <li class="nav-item has-treeview" id="tree_admins">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p> @lang('label.real_estate_company_employee') <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li id="create_admin" class="nav-item">
                                <a href="{{route('admin.user.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('label.createNew')</p>
                                </a>
                            </li>
                            <li id="list_admin" class="nav-item">
                                <a href="{{route('admin.user.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('label.list')</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Approval --}}
                    <li class="nav-item has-treeview" id="tree_approvals">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-check-double"></i>
                            <p> @lang('label.company_approval_list')<i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li id="list_approval" class="nav-item">
                                <a href="{{route('admin.approval.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('label.list')</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    {{-- Property --}}
                    <li class="nav-item has-treeview" id="tree_propertys">
                        <a href="#" class="nav-link">
                            <i class="fas fa-landmark nav-icon"></i>
                            <p> @lang('label.property')<i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li id="list_property" class="nav-item">
                                <a href="{{route('admin.property.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('label.createNew')</p>
                                </a>
                            </li>
                            <li id="list_property" class="nav-item">
                                <a href="{{route('admin.property.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('label.list')</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if($role == 'admin' || $role == 'super_admin')
                <li class="nav-item has-treeview" id="tree_members">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p> @lang('label.wish_open_store') <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li id="create_member" class="nav-item">
                            <a href="{{route('admin.member.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('label.createNew')</p>
                            </a>
                        </li>
                        <li id="list_member" class="nav-item">
                            <a href="{{route('admin.member.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('label.list')</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if($role == 'company_admin')
                    <li class="nav-item">
                        <a href="{{route('admin.company.edit', Auth::user()->company->id)}}" class="nav-link">
                            <i class="fas fa-building nav-icon"></i>
                            <p>@lang('label.company')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.company.user.index', Auth::user()->company->id)}}" class="nav-link">
                            <i class="fas fa-users nav-icon"></i>
                            <p>@lang('label.user')</p>
                        </a>
                    </li>
                @endif

                @if($role == 'super_admin')
                <li class="nav-item has-treeview" id="tree_project">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p> @lang('label.operation_history') <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li id="create_project" class="nav-item">
                            <a href="{{route('admin.log-superadmin-activities.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('label.superAdmin')</p>
                            </a>
                        </li>
                        <li id="create_project" class="nav-item">
                            <a href="{{route('admin.log-admin-activities.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('label.admin')</p>
                            </a>
                        </li>
                        <li id="create_project" class="nav-item">
                            <a href="{{route('admin.log-user-activities.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('label.user')</p>
                            </a>
                        </li>
                        <li id="list_project" class="nav-item">
                            <a href="{{route('admin.log-user-fail.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('label.login_fail')</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if(Auth::guard('user')->check())
                    <li class="nav-item">
                        <a href="{{route('userowner-edit')}}" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>@lang('label.my_account')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('company.payment.edit')}}" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>@lang('label.edit_company_payment_details')</p>
                        </a>
                    </li>
                    {{-- Property --}}
                    <li class="nav-item has-treeview" id="tree_propertys">
                        <a href="#" class="nav-link">
                            <i class="fas fa-landmark nav-icon"></i>
                            <p> @lang('label.property')<i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- @if (Auth::user()->properties->isNotEmpty())
                                <li id="create_property" class="nav-item">
                                    <a href="{{route('company.property.show', Auth::user()->properties[0]->id)}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('label.detail_page')</p>
                                    </a>
                                </li>
                            @endif --}}
                            <li id="list_property" class="nav-item">
                                <a href="{{route('company.property.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('label.createNew')</p>
                                </a>
                            </li>
                            <li id="list_property" class="nav-item">
                                <a href="{{route('company.property.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('label.list')</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- END PROPERTY --}}
                    {{-- Customer Inquiry --}}
                    <li class="nav-item has-treeview" id="tree_customer_inquiries">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-question"></i>
                            <p> @lang('label.customer_inquiry') <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li id="create_customer_inquiry" class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('label.createNew')</p>
                                </a>
                            </li>
                            <li id="list_customer_inquiry" class="nav-item">
                                <a href="{{route('inquiry.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@lang('label.list')</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('companyowner-edit')}}" class="nav-link">
                            <i class="fas fa-building nav-icon"></i>
                            <p>@lang('label.company')</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
