<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $product_name = $request->get('product_titlename') ? $request->get('product_name') : @$product->product_name ?>
    {!! Form::label($name, trans('product::product_admin.name').':') !!}
    {!! Form::text($name, $product_name, ['class' => 'form-control', 'placeholder' => trans('product::product_admin.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->