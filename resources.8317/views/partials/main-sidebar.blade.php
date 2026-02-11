<aside class="main-sidebar bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 shadow-sm">
    <!-- Brand -->
    <a href="{{ route('home') }}" class="brand-link flex items-center justify-center gap-2 px-4 py-4 border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
        
        <span class="brand-text font-bold text-lg text-gray-900 dark:text-white">Administrator</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" 
                data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors {{ request()->is('home*') ? 'bg-indigo-50 dark:bg-indigo-900/20 text-indigo-700 dark:text-indigo-400 border-l-4 border-indigo-700' : '' }}">
                        <i class="fas fa-home nav-icon mr-3"></i>
                        <p class="inline">ინფორმაცია</p>
                    </a>
                </li>

                <!-- Basic (ძირითადი) -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors">
                        <i class="fas fa-layer-group nav-icon mr-3"></i>
                        <p class="inline">
                            ძირითადი
                            <i class="right fas fa-angle-left float-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview bg-gray-50 dark:bg-gray-900/50">
                        <li class="nav-item">
                            <a href="{{ route('regions.list') }}" class="nav-link px-8 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors {{ request()->is('regions*') ? 'bg-indigo-50 dark:bg-indigo-900/20 text-indigo-700 dark:text-indigo-400 border-l-4 border-indigo-700' : '' }}">
                                <i class="fas fa-map-marked-alt nav-icon mr-3"></i>
                                <p class="inline">რეგიონი</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('municipalities.list') }}" class="nav-link px-8 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors {{ request()->is('municipalities*') ? 'bg-indigo-50 dark:bg-indigo-900/20 text-indigo-700 dark:text-indigo-400 border-l-4 border-indigo-700' : '' }}">
                                <i class="fas fa-city nav-icon mr-3"></i>
                                <p class="inline">მუნიციპალიტეტი</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('prioriteties.list') }}" class="nav-link px-8 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors {{ request()->is('prioriteties*') ? 'bg-indigo-50 dark:bg-indigo-900/20 text-indigo-700 dark:text-indigo-400 border-l-4 border-indigo-700' : '' }}">
                                <i class="fas fa-star nav-icon mr-3"></i>
                                <p class="inline">პრიორიტეტი</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kindergartens.list') }}" class="nav-link px-8 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors {{ request()->is('kindergartens*') ? 'bg-indigo-50 dark:bg-indigo-900/20 text-indigo-700 dark:text-indigo-400 border-l-4 border-indigo-700' : '' }}">
                                <i class="fas fa-school nav-icon mr-3"></i>
                                <p class="inline">ბაღი</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kindergarteners.index') }}" class="nav-link px-8 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors {{ request()->is('kindergarteners*') ? 'bg-indigo-50 dark:bg-indigo-900/20 text-indigo-700 dark:text-indigo-400 border-l-4 border-indigo-700' : '' }}">
                                <i class="fas fa-child nav-icon mr-3"></i>
                                <p class="inline">აღსაზრდელი</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Manage (მართვა) -->
                <li class="nav-item">
                    <a href="#" class="nav-link px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors">
                        <i class="fas fa-cogs nav-icon mr-3"></i>
                        <p class="inline">
                            მართვა
                            <i class="right fas fa-angle-left float-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview bg-gray-50 dark:bg-gray-900/50">
                        <li class="nav-item">
                            <a href="{{ route('settings.index') }}" class="nav-link px-8 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors {{ request()->is('settings') ? 'bg-indigo-50 dark:bg-indigo-900/20 text-indigo-700 dark:text-indigo-400 border-l-4 border-indigo-700' : '' }}">
                                <i class="fas fa-sliders-h nav-icon mr-3"></i>
                                <p class="inline">პარამეტრები</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('settings.date') }}" class="nav-link px-8 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors {{ request()->is('settings/date') ? 'bg-indigo-50 dark:bg-indigo-900/20 text-indigo-700 dark:text-indigo-400 border-l-4 border-indigo-700' : '' }}">
                                <i class="fas fa-calendar-alt nav-icon mr-3"></i>
                                <p class="inline">თარიღი</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            @if (data_get($settings, 'basic.object.canPorting'))
                                <form id="portireba" method="POST" action="{{ route('settings.learning') }}">
                                    @csrf
                                    <a class="nav-link px-8 py-2 text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors cursor-pointer"
                                       data-submit="portireba"
                                       data-message="პორტირება აუცილებლად უნდა შესრულდეს მხოლოდ სასწავლო წლის დასრულების შემდეგ ერთჯერადად!"
                                       data-title="ნამდვილად გსურთ პორტირების შესრულება?"
                                       onclick="nottify(event)">
                                        <i class="fas fa-exchange-alt nav-icon mr-3"></i>
                                        <p class="inline">პორტირება</p>
                                    </a>
                                </form>
                            @else
                                <a class="nav-link px-8 py-2 text-gray-400 dark:text-gray-500 cursor-not-allowed" 
                                   data-message="დროის ამ მომენტში პორტირება ნებადართული არ არის!"
                                   data-no-buttons="true"
                                   onclick="nottify(event)">
                                    <i class="fas fa-exchange-alt nav-icon mr-3"></i>
                                    <p class="inline">პორტირება</p>
                                </a>
                            @endif
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('users.list') }}" class="nav-link px-8 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors {{ request()->is('users*') ? 'bg-indigo-50 dark:bg-indigo-900/20 text-indigo-700 dark:text-indigo-400 border-l-4 border-indigo-700' : '' }}">
                                <i class="fas fa-users nav-icon mr-3"></i>
                                <p class="inline">მომხმარებლები</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>
