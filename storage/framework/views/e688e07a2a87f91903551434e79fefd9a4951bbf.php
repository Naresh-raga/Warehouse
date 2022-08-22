<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Role List</strong>
                <div class="float-right">
                    <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-primary">Add Role</a>
                </div>
            </div>
            <div class="card-body">
                <table id="data_table_role" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\wms\resources\views/admin/role/index.blade.php ENDPATH**/ ?>