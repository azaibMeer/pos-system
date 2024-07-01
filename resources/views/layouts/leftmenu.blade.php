@if(isset(Auth::User()->user_type) && Auth::User()->user_type == 1)
<aside class="page-sidebar">
                    <div class="page-logo">
                        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                            <img src="{{url($setting->logo)}}" alt="{{$setting->name}}" aria-roledescription="logo">
                            <span class="page-logo-text mr-1">{{$setting->name ?? ''}}</span>
                        </a>
                    </div>
                    <!-- BEGIN PRIMARY NAVIGATION -->
                    <nav id="js-primary-nav" class="primary-nav" role="navigation">
                        <div class="nav-filter">
                            <div class="position-relative">
                                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                                    <i class="fal fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="info-card" style="height:6.53rem">
                            <img src="/assets/img/demo/avatars/avatar-admin.png" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
                            <div class="info-card-text">
                                <a href="#" class="d-flex align-items-center text-white">
                                    <span class="text-truncate text-truncate-sm d-inline-block">
                                        {{ucfirst(Auth::User()->name) ?? ''}}
                                    </span>
                                </a>
                                <span class="d-inline-block text-truncate text-truncate-sm">{{ Auth::user()->user_type == 1 ? 'Super Admin' : '' }}</span>
                            </div>
                            <img src="/assets/img/card-backgrounds/cover-2-lg.png" class="cover" alt="cover">
                        </div>
                        <ul id="js-nav-menu" class="nav-menu">    
                            <li>
                                <a href="#" title="Tables" data-filter-tags="tables">
                                    <i class="fal fa-th-list"></i>
                                    <span class="nav-link-text" data-i18n="nav.tables">Products</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{url('/category/list')}}" title="Basic Tables">
                                            <span class="nav-link-text" >Product Category</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/product/list')}}" title="Basic Tables">
                                            <span class="nav-link-text" >Product List</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{ request()->is('customer*') ? 'active' : '' }}">
                                <a href="{{url('/customer/list')}}" title="Tables" data-filter-tags="tables">
                                    <i class="fal fa-th-list"></i>
                                    <span class="nav-link-text" data-i18n="nav.tables">Customer</span>
                                </a> 
                            </li>
                            <li class="{{ request()->is('outlet*') ? 'active' : '' }}">
                                <a href="{{url('/outlet/list')}}" title="Tables" data-filter-tags="tables">
                                    <i class="fal fa-th-list"></i>
                                    <span class="nav-link-text" data-i18n="nav.tables">Outlet</span>
                                </a> 
                            </li>
                        </ul>
                    </nav>
                </aside>
@endif