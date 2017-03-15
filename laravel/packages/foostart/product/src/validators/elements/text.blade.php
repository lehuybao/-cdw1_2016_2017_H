<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $product_category_name = $request->get('product_titlename') ? $request->get('product_name') : @$product->product_category_name ?>
    {!! Form::label($name, trans('product::product_admin.name').':') !!}
    {!! Form::text($name, $product_category_name, ['class' => 'form-control', 'placeholder' => trans('product::product_admin.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->