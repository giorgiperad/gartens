<aside class="main-sidebar sidebar-light-primary elevation-3">
    <!-- Brand -->
    <a href="<?php echo e(route('home')); ?>" class="brand-link d-flex align-items-center justify-content-center gap-2">
        
        <span class="brand-text fw-bold">Administrator</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" 
                data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e(request()->is('home*') ? 'active' : ''); ?>">
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
                            <a href="<?php echo e(route('regions.list')); ?>" class="nav-link <?php echo e(request()->is('regions*') ? 'active' : ''); ?>">
                                <i class="fas fa-map-marked-alt nav-icon"></i>
                                <p>რეგიონი</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('municipalities.list')); ?>" class="nav-link <?php echo e(request()->is('municipalities*') ? 'active' : ''); ?>">
                                <i class="fas fa-city nav-icon"></i>
                                <p>მუნიციპალიტეტი</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('prioriteties.list')); ?>" class="nav-link <?php echo e(request()->is('prioriteties*') ? 'active' : ''); ?>">
                                <i class="fas fa-star nav-icon"></i>
                                <p>პრიორიტეტი</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('kindergartens.list')); ?>" class="nav-link <?php echo e(request()->is('kindergartens*') ? 'active' : ''); ?>">
                                <i class="fas fa-school nav-icon"></i>
                                <p>ბაღი</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('kindergarteners.index')); ?>" class="nav-link <?php echo e(request()->is('kindergarteners*') ? 'active' : ''); ?>">
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
                            <a href="<?php echo e(route('settings.index')); ?>" class="nav-link <?php echo e(request()->is('settings') ? 'active' : ''); ?>">
                                <i class="fas fa-sliders-h nav-icon"></i>
                                <p>პარამეტრები</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('settings.date')); ?>" class="nav-link <?php echo e(request()->is('settings/date') ? 'active' : ''); ?>">
                                <i class="fas fa-calendar-alt nav-icon"></i>
                                <p>თარიღი</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <?php if(data_get($settings, 'basic.object.canPorting')): ?>
                                <form id="portireba" method="POST" action="<?php echo e(route('settings.learning')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <a class="nav-link text-danger"
                                       style="cursor:pointer;"
                                       data-submit="portireba"
                                       data-message="პორტირება აუცილებლად უნდა შესრულდეს მხოლოდ სასწავლო წლის დასრულების შემდეგ ერთჯერადად!"
                                       data-title="ნამდვილად გსურთ პორტირების შესრულება?"
                                       onclick="nottify(event)">
                                        <i class="fas fa-exchange-alt nav-icon"></i>
                                        <p>პორტირება</p>
                                    </a>
                                </form>
                            <?php else: ?>
                                <a class="nav-link disabled text-muted" style="cursor:not-allowed;" 
                                   data-message="დროის ამ მომენტში პორტირება ნებადართული არ არის!"
                                   data-no-buttons="true"
                                   onclick="nottify(event)">
                                    <i class="fas fa-exchange-alt nav-icon"></i>
                                    <p>პორტირება</p>
                                </a>
                            <?php endif; ?>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('users.list')); ?>" class="nav-link <?php echo e(request()->is('users*') ? 'active' : ''); ?>">
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
<?php /**PATH /home/u814212997/domains/lightslategray-jackal-229176.hostingersite.com/public_html/resources/views/partials/main-sidebar.blade.php ENDPATH**/ ?>