<aside class="main-sidebar sidebar-light-primary elevation-3">
    <!-- Brand -->
    <a href="{{ route('home') }}" class="brand-link d-flex align-items-center justify-content-center gap-2">
        
        <span class="brand-text fw-bold"></span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" 
                data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->is('home*') ? 'active' : '' }}">
                        <i class="fas fa-home nav-icon"></i>
                        <p>ინფორმაცია</p>
                    </a>
                </li>

                <!-- Basic (ძირითადი) -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-layer-group nav-icon"></i>
                        <p>
                            ძირითადი
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('regions.list') }}" class="nav-link {{ request()->is('regions*') ? 'active' : '' }}">
                                <i class="fas fa-map-marked-alt nav-icon"></i>
                                <p>რეგიონი</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('municipalities.list') }}" class="nav-link {{ request()->is('municipalities*') ? 'active' : '' }}">
                                <i class="fas fa-city nav-icon"></i>
                                <p>მუნიციპალიტეტი</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('prioriteties.list') }}" class="nav-link {{ request()->is('prioriteties*') ? 'active' : '' }}">
                                <i class="fas fa-star nav-icon"></i>
                                <p>პრიორიტეტი</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kindergartens.list') }}" class="nav-link {{ request()->is('kindergartens*') ? 'active' : '' }}">
                                <i class="fas fa-school nav-icon"></i>
                                <p>ბაღი</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kindergarteners.index') }}" class="nav-link {{ request()->is('kindergarteners*') ? 'active' : '' }}">
                                <i class="fas fa-child nav-icon"></i>
                                <p>აღსაზრდელი</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Manage (მართვა) -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs nav-icon"></i>
                        <p>
                            მართვა
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('settings.index') }}" class="nav-link {{ request()->is('settings') ? 'active' : '' }}">
                                <i class="fas fa-sliders-h nav-icon"></i>
                                <p>პარამეტრები</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('settings.date') }}" class="nav-link {{ request()->is('settings/date') ? 'active' : '' }}">
                                <i class="fas fa-calendar-alt nav-icon"></i>
                                <p>თარიღი</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('registration-texts.index') }}" class="nav-link {{ request()->is('registration-texts') ? 'active' : '' }}">
                                <i class="fas fa-align-left nav-icon"></i>
                                <p>ტექსტი</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('registration-texts.rules') }}" class="nav-link {{ request()->is('registration-texts/rules') ? 'active' : '' }}">
                                <i class="fas fa-book nav-icon"></i>
                                <p>წესები</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('audit-logs.index') }}" class="nav-link {{ request()->is('audit-logs') ? 'active' : '' }}">
                                <i class="fas fa-clipboard-list nav-icon"></i>
                                <p>აუდიტის ჟურნალი</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            @if (data_get($settings, 'basic.object.canPorting'))
                                <form id="portireba" method="POST" action="{{ route('settings.learning') }}">
                                    @csrf
                                                <a class="nav-link nav-danger"
                                       style="cursor:pointer;"
                                       data-submit="portireba"
                                       data-message="პორტირება აუცილებლად უნდა შესრულდეს მხოლოდ სასწავლო წლის დასრულების შემდეგ ერთჯერადად!"
                                       data-title="ნამდვილად გსურთ პორტირების შესრულება?"
                                       onclick="nottify(event)">
                                        <i class="fas fa-exchange-alt nav-icon"></i>
                                        <p>პორტირება</p>
                                    </a>
                                </form>
                            @else
                                <a class="nav-link disabled text-muted" style="cursor:not-allowed;" 
                                   data-message="დროის ამ მომენტში პორტირება ნებადართული არ არის!"
                                   data-no-buttons="true"
                                   onclick="nottify(event)">
                                    <i class="fas fa-exchange-alt nav-icon"></i>
                                    <p>პორტირება</p>
                                </a>
                            @endif
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('users.list') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                                <i class="fas fa-users nav-icon"></i>
                                <p>მომხმარებლები</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>
