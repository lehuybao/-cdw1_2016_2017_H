<!-- SAMPLE NAME -->

<head>
  <script src='//cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script>
  tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  plugin: 'a_tinymce_plugin',
  a_plugin_option: true,
  a_configuration_option: 400
});
  </script>
</head>

<div class="form-group">
    <?php $work_name = $request->get('work_titlename') ? $request->get('work_name') : @$work->work_name ?>
    {!! Form::label($name, trans('work::work_admin.name').':') !!}
    {!! Form::textarea($name, $work_name, ['class' => 'form-control', 'placeholder' => trans('work::work_admin.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->