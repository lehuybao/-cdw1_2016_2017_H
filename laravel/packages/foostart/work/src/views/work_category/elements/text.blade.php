<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $work_category_name = $request->get('work_titlename') ? $request->get('work_name') : @$work->work_category_name ?>
    {!! Form::label($name, trans('work::work_admin.name').':') !!}
    {!! Form::text($name, $work_category_name, ['class' => 'form-control', 'placeholder' => trans('work::work_admin.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->