<?php $__env->startSection('title'); ?><?php echo e(trans_choice('general.payroll',1)); ?> <?php echo e(trans_choice('general.template',2)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php foreach($data as $key): ?>
            <div class="col-md-4">
                <div class="img-thumbnail text-center">
                    <a href="<?php echo e(url('payroll/template/'.$key->id.'/edit')); ?>">
                        <img src="<?php echo e(asset('uploads/default_payroll_template')); ?>" class="img-responsive"/>
                        <h4><?php echo e($key->name); ?></h4>

                        <p><?php echo e($key->notes); ?></p>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script>
        $(document).ready(function () {
            $('.deletePayment').on('click', function (e) {
                e.preventDefault();
                var href = $(this).attr('href');
                swal({
                    title: 'Are you sure?',
                    text: 'If you delete a payment, a fully paid loan may change status to open.',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok',
                    cancelButtonText: 'Cancel'
                }).then(function () {
                    window.location = href;
                })
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>