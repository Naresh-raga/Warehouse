<?php 
    use Illuminate\Support\Facades\DB;
    $role = \Auth::user()->role_id;
    $data = DB::table('permissions')->where('role_id',$role)->first();
?>
<?php if(isset($editGate)){ if($role == 1){?>
    <a class="btn btn-sm btn-warning my-1" href="<?php echo e(route($crudRoutePart . '.edit', $row->id)); ?>"
        title="<?php echo e(trans('global.edit')); ?>">
        <i class="fa fa-edit"></i>
    </a>
<?php }elseif(isset($data->id) && $data->edit == 1){  ?>   
    <a class="btn btn-sm btn-warning my-1" href="<?php echo e(route($crudRoutePart . '.edit', $row->id)); ?>"
        title="<?php echo e(trans('global.edit')); ?>">
        <i class="fa fa-edit"></i>
    </a>
<?php }} ?>
<?php if(isset($deleteGate)){ if($role == 1){ ?>
    <form action="<?php echo e(route($crudRoutePart . '.destroy', $row->id)); ?>" method="POST"
        onsubmit="return confirm('Are You Sure?');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <button type="submit" class="btn btn-sm btn-danger my-1" title="<?php echo e(trans('global.delete')); ?>">
            <i class="fa fa-trash"></i>
        </button>
    </form>
<?php }elseif(isset($data->id) && $data->delete == 1){  ?>
    <form action="<?php echo e(route($crudRoutePart . '.destroy', $row->id)); ?>" method="POST"
        onsubmit="return confirm('Are You Sure?');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <button type="submit" class="btn btn-sm btn-danger my-1" title="<?php echo e(trans('global.delete')); ?>">
            <i class="fa fa-trash"></i>
        </button>
    </form>
<?php }} ?>

<?php if(isset($statusGate)){ ?>
    <div class="outerDivFull">
        <div class="switchToggle">
            <input type="checkbox" <?php echo ($row->status == 1)?'checked':''; ?> onchange="updates($(this))" data-model="<?php echo e($statusGate); ?>" data-id="<?php echo e($row->id); ?>" id="switch<?php echo e($row->id); ?>">
            <label for="switch<?php echo e($row->id); ?>">Toggle</label>
        </div>
    </div>
<?php } ?>
<?php /**PATH C:\wamp64\www\wms\resources\views/admin/partial/dt_actions.blade.php ENDPATH**/ ?>