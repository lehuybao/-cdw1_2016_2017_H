<!-- SAMPLE NAME -->
<!DOCTYPE html>
<html>
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

    <body>
       
    </body>
</html>

<div class="form-group">
    <?php $news_category_name = $request->get('news_titlename') ? $request->get('news_name') : @$news->news_category_name ?>
    {!! Form::label($name, trans('news::news_admin.name').':') !!}
    {!! Form::textarea($name, $news_category_name, ['class' => 'form-control', 'placeholder' => trans('news::news_admin.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->