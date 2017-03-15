<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $contact_name = $request->get('contact_titlename') ? $request->get('contact_name') : @$contact->contact_name ?>
    {!! Form::label($name, trans('contact::contact_admin.name').':') !!}
    {!! Form::text($name, $contact_name, ['class' => 'form-control', 'placeholder' => trans('contact::contact_admin.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->