<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('admin.dashboard') ? '' : 'collapsed' }}" href="{{ route('admin.dashboard') }}">
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('admin.section.index') ? '' : 'collapsed' }}" href="{{ route('admin.section.index') }}">
                <span>Section</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('admin.page.index') ? '' : 'collapsed' }}" href="{{ route('admin.page.index') }}">
                <span>Pages</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('category.create') || Request::url() == route('category.index') ? '' : 'collapsed' }}" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
                <span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="category-nav" class="nav-content collapse {{ Request::url() == route('category.create') || Request::url() == route('category.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('category.create') }}" class="{{ Request::url() == route('category.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.index') }}" class="{{ Request::url() == route('category.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List Category</span>
                    </a>
                </li>
            </ul>
        </li>





        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('subcategory.create') || Request::url() == route('subcategory.index') ? '' : 'collapsed' }}" data-bs-target="#subcategory-nav" data-bs-toggle="collapse" href="#">
                <span>Sub Categories</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="subcategory-nav" class="nav-content collapse {{ Request::url() == route('subcategory.create') || Request::url() == route('subcategory.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('subcategory.create') }}" class="{{ Request::url() == route('subcategory.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Sub-Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('subcategory.index') }}" class="{{ Request::url() == route('subcategory.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List Sub-Category</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('best-forex-broker-sub-category.create') || Request::url() == route('best-forex-broker-sub-category.index') ? '' : 'collapsed' }}" data-bs-target="#bestForexBrokerSubCategory-nav" data-bs-toggle="collapse" href="#">
                <span>Best Forex Brokers</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="bestForexBrokerSubCategory-nav" class="nav-content collapse {{ Request::url() == route('best-forex-broker-sub-category.create') || Request::url() == route('best-forex-broker-sub-category.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('best-forex-broker-sub-category.create') }}" class="{{ Request::url() == route('best-forex-broker-sub-category.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('best-forex-broker-sub-category.index') }}" class="{{ Request::url() == route('best-forex-broker-sub-category.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List Category</span>
                    </a>
                </li>
            </ul>
        </li>





        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('broker.index') || Request::url() == route('broker-category.index') || Request::url() == route('broker-review.index') || Request::url() == route('broker-review.create')|| Request::url() == route('sponserd.broker') ? '' : 'collapsed' }}" data-bs-target="#broker-nav" data-bs-toggle="collapse" href="#">
                <span>Broker</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="broker-nav" class="nav-content collapse {{ Request::url() == route('broker.index') || Request::url() == route('broker-category.index') || Request::url() == route('broker-review.index') || Request::url() == route('broker-review.create')|| Request::url() == route('sponserd.broker') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('broker.index') }}" class="{{ Request::url() == route('broker.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>All Broker</span>
                    </a>
                </li><li>
                    <a href="{{ route('sponserd.broker') }}" class="{{ Request::url() == route('sponserd.broker') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Sponserd Broker</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('broker-review.create') }}" class="{{ Request::url() == route('broker-review.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Broker Review</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('broker-review.index') }}" class="{{ Request::url() == route('broker-review.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>All Broker Review</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('broker-category.index') }}" class="{{ Request::url() == route('broker-category.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Broker Category</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('forex-bonus.create') || Request::url() == route('forex-bonus.index') || Request::url() == route('forex-bonus-category.create') || Request::url() == route('forex-bonus-category.index') ? '' : 'collapsed' }}" data-bs-target="#bonus-nav" data-bs-toggle="collapse" href="#">
                <span>Forex Bonus</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="bonus-nav" class="nav-content collapse {{ Request::url() == route('forex-bonus.create') || Request::url() == route('forex-bonus.index') || Request::url() == route('forex-bonus-category.create') || Request::url() == route('forex-bonus-category.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('forex-bonus.create') }}" class="{{ Request::url() == route('forex-bonus.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Forex Bonus</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('forex-bonus.index') }}" class="{{ Request::url() == route('forex-bonus.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List Forex Bonus</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('forex-bonus-category.create') }}" class="{{ Request::url() == route('forex-bonus-category.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Forex Bonus Category</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('forex-bonus-category.index') }}" class="{{ Request::url() == route('forex-bonus-category.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Forex Bonus Category</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('blog.create') || Request::url() == route('blog.index') ? '' : 'collapsed' }}" data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
                <span>Blog</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="blog-nav" class="nav-content collapse {{ Request::url() == route('blog.create') || Request::url() == route('blog.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('blog.create') }}" class="{{ Request::url() == route('blog.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Blog</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog.index') }}" class="{{ Request::url() == route('blog.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List Blog</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('crypto.create') || Request::url() == route('crypto.index') ? '' : 'collapsed' }}" data-bs-target="#crypto-nav" data-bs-toggle="collapse" href="#">
                <span>Crypto</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="crypto-nav" class="nav-content collapse {{ Request::url() == route('crypto.create') || Request::url() == route('crypto.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('crypto.create') }}" class="{{ Request::url() == route('crypto.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Crypto</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('crypto.index') }}" class="{{ Request::url() == route('crypto.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List Crypto</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('award.create') || Request::url() == route('award.index') ? '' : 'collapsed' }}" data-bs-target="#award-nav" data-bs-toggle="collapse" href="#">
                <span>Award</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="award-nav" class="nav-content collapse {{ Request::url() == route('award.create') || Request::url() == route('award.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('award.create') }}" class="{{ Request::url() == route('award.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Award</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('award.index') }}" class="{{ Request::url() == route('award.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List Award</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('advertisement.index') ? '' : 'collapsed' }}" href="{{ route('advertisement.index') }}">
                <span>Advertisement</span>
            </a>
        </li>


        {{-- <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('post.create') || Request::url() == route('post.index') ? '' : 'collapsed' }}" data-bs-target="#post-nav" data-bs-toggle="collapse" href="#">
                <span>Post</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="post-nav" class="nav-content collapse {{ Request::url() == route('post.create') || Request::url() == route('post.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('post.create') }}" class="{{ Request::url() == route('post.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Promotion Post</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('post.index') }}" class="{{ Request::url() == route('post.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Review Post</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('post.index') }}" class="{{ Request::url() == route('post.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Press Release</span>
                    </a>
                </li>
            </ul>
        </li> --}}



























        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('admin.setting.generalSetting') || Request::url() == route('admin.setting.metaSetting') ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                {{-- <i class="bi bi-gear"></i> --}}
                <span>Site Settings</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {{ Request::url() == route('admin.setting.generalSetting') || Request::url() == route('admin.setting.metaSetting') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.setting.generalSetting') }}" class="{{ Request::url() == route('admin.setting.generalSetting') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>General Setting</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.metaSetting') }}" class="{{ Request::url() == route('admin.setting.metaSetting') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Meta Setting</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{-- <i class="bi bi-power"></i> --}}
                <span>Logout</span>
            </a>
        </li>
        <!-- End Blank Page Nav -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>

</aside>
