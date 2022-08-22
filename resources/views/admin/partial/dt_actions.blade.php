<?php 
    use Illuminate\Support\Facades\DB;
    $role = \Auth::user()->role_id;
    $data = DB::table('permissions')->where('role_id',$role)->first();
?>
<?php if(isset($editGate)){ if($role == 1){?>
    <a class="btn btn-sm btn-warning my-1" href="{{ route($crudRoutePart . '.edit', $row->id) }}"
        title="{{ trans('global.edit') }}">
        <i class="fa fa-edit"></i>
    </a>
<?php }elseif(isset($data->id) && $data->edit == 1){  ?>   
    <a class="btn btn-sm btn-warning my-1" href="{{ route($crudRoutePart . '.edit', $row->id) }}"
        title="{{ trans('global.edit') }}">
        <i class="fa fa-edit"></i>
    </a>
<?php }} ?>
<?php if(isset($deleteGate)){ if($role == 1){ ?>
    <form action="{{ route($crudRoutePart . '.destroy', $row->id) }}" method="POST"
        onsubmit="return confirm('Are You Sure?');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-sm btn-danger my-1" title="{{ trans('global.delete') }}">
            <i class="fa fa-trash"></i>
        </button>
    </form>
<?php }elseif(isset($data->id) && $data->delete == 1){  ?>
    <form action="{{ route($crudRoutePart . '.destroy', $row->id) }}" method="POST"
        onsubmit="return confirm('Are You Sure?');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-sm btn-danger my-1" title="{{ trans('global.delete') }}">
            <i class="fa fa-trash"></i>
        </button>
    </form>
<?php }} ?>

<?php if(isset($statusGate)){ ?>
    <div class="outerDivFull">
        <div class="switchToggle">
            <input type="checkbox" <?php echo ($row->status == 1)?'checked':''; ?> onchange="updates($(this))" data-model="{{$statusGate}}" data-id="{{$row->id}}" id="switch{{$row->id}}">
            <label for="switch{{$row->id}}">Toggle</label>
        </div>
    </div>
<?php } ?>
