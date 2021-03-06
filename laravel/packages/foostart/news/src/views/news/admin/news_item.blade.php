
@if( ! $news->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('news::news_admin.order') }}</td>
            <th style='width:10%'>News ID</th>
            <th style='width:50%'>News title</th>
            <th style='width:20%'>{{ trans('news::news_admin.operations') }}</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $news->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($news as $new)
        <tr>
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <td>{!! $new->news_id !!}</td>
            <td>{!! $new->news_name !!}</td>
            <td>
                <a href="{!! URL::route('admin_news.edit', ['id' => $new->news_id]) !!}"><i class="fa fa-edit fa-2x"></i></a>
                <a href="{!! URL::route('admin_news.delete',['id' =>  $new->news_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
 <span class="text-warning">
	<h5>
		{{ trans('news::news_admin.message_find_failed') }}
	</h5>
 </span>
@endif
<div class="paginator">
    {!! $news->appends($request->except(['page']) )->render() !!}
</div>