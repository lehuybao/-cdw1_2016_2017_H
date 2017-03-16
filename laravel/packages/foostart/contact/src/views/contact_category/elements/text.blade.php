<head>
    <script src='//cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
        tinymce.init({

        selector: 'textarea', // change this value according to your HTML
                plugin: 'a_tinymce_plugin',
                a_plugin_option: true,
                a_configuration_option: 400
            });
    </script>
</head>

<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $contact_category_name = $request->get('contact_titlename') ? $request->get('contact_name') : @$contact->contact_category_name ?>
    {!! Form::label($name, trans('contact::contact_admin.name').':') !!}
    {!! Form::textarea($name, $contact_category_name, ['class' => 'form-control', 'placeholder' => trans('contact::contact_admin.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->