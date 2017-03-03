
@if( ! $banner->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('sample::banner_admin.order') }}</td>
            <th style='width:10%'>ID</th>
            <th style='width:50%'>Banner </th>
            <th style='width:20%'>{{ trans('sample::banner_admin.operations') }}</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nav = $banner->toArray();
        $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($banner as $banner)
        <tr>
            <td>
                <?php echo $counter;
                $counter++ ?>
            </td>
            <td>{!! $banner->banner_id !!}</td>
            <td>{!! $banner->banner_img !!}</td>
            <td>
                <a href="{!! URL::route('admin_banner.edit', ['id' => $banner->banner_id]) !!}"><i class="fa fa-edit fa-2x"></i></a>
                <a href="{!! URL::route('admin_banner.delete',['id' =>  $banner->banner_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<span class="text-warning"><h5>No results found.</h5></span>
@endif
<div class="paginator">
</div>