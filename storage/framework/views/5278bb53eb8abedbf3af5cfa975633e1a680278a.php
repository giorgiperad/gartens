

<?php $__env->startSection('content'); ?>
<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden w-100" style="max-width: 900px;">
        <div class="row g-0">
            
            <div class="col-lg-7 col-md-12 p-5 order-2 order-lg-1 bg-white">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-dark"><?php echo e(__('ავტორიზაცია')); ?></h3>
                    <p class="text-muted small mb-0"><?php echo e(__('შეიყვანეთ მონაცემები ანგარიშზე შესასვლელად')); ?></p>
                </div>

                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold"><?php echo e(__('ელ.ფოსტა')); ?></label>
                        <input id="email" type="email"
                               class="form-control form-control-lg rounded-3 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback small">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold"><?php echo e(__('პაროლი')); ?></label>
                        <input id="password" type="password"
                               class="form-control form-control-lg rounded-3 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="password" required autocomplete="current-password">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback small">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                   <?php echo e(old('remember') ? 'checked' : ''); ?>>
                            <label class="form-check-label small" for="remember">
                                <?php echo e(__('დამახსოვრება')); ?>

                            </label>
                        </div>

                        <?php if(Route::has('password.request')): ?>
                            <a class="small text-primary text-decoration-none fw-semibold" href="<?php echo e(route('password.request')); ?>">
                                <?php echo e(__('პაროლის აღდგენა')); ?>

                            </a>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-3 rounded-3 fw-bold">
                        <?php echo e(__('შესვლა')); ?>

                    </button>
                </form>
            </div>

            
            <div class="col-lg-5 col-md-12 d-flex align-items-center justify-content-center bg-white text-center p-5 order-1 order-lg-2">
                <div>
                    <img src="<?php echo e(asset('city-badge.png')); ?>"
                         alt="City Badge"
                         class="img-fluid mb-4 glow-badge"
                         style="max-height: 160px;">

                    <h5 class="fw-bold text-dark"><?php echo e(__('')); ?></h5>
                    <p class="text-muted small">
                        <?php echo e(__('ა(ა)იპ სიღნაღის მუნიციპალიტეტის სკოლამდელი აღზრდის დაწესებულებათა გაერთიანება')); ?>

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .glow-badge {
        filter: 
            drop-shadow(0 0 12px rgba(99, 102, 241, 0.28))   /* main indigo glow */
            drop-shadow(0 0 24px rgba(99, 102, 241, 0.16))   /* softer outer layer */
            drop-shadow(0 0 40px rgba(139, 92, 246, 0.08));  /* very faint purple hint */
        transition: filter 0.5s ease, transform 0.4s ease;
    }

    .glow-badge:hover,
    .glow-badge:focus {
        filter: 
            drop-shadow(0 0 20px rgba(99, 102, 241, 0.45))
            drop-shadow(0 0 36px rgba(99, 102, 241, 0.28))
            drop-shadow(0 0 60px rgba(139, 92, 246, 0.14));
        transform: scale(1.04);
    }

    /* Optional: very subtle breathing/pulse effect (uncomment if you like it) */
    /*
    @keyframes subtle-pulse {
        0%, 100% { filter: drop-shadow(0 0 12px rgba(99, 102, 241, 0.28)) drop-shadow(0 0 24px rgba(99, 102, 241, 0.16)); }
        50%      { filter: drop-shadow(0 0 16px rgba(99, 102, 241, 0.38)) drop-shadow(0 0 32px rgba(99, 102, 241, 0.22)); }
    }
    .glow-badge {
        animation: subtle-pulse 6s ease-in-out infinite;
    }
    */
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u814212997/domains/lightslategray-jackal-229176.hostingersite.com/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>