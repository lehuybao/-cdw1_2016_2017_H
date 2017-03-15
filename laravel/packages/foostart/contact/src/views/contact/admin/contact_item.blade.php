
@if( ! $contacts->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('contact::contact_admin.order') }}</td>
            <th style='width:10%'>Contact ID</th>
            <th style='width:50%'>Contact title</th>
            <th style='width:20%'>{{ trans('contact::contact_admin.operations') }}</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $contacts->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($contacts as $contact)
        <tr>
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <td>{!! $contact->contact_id !!}</td>
            <td>{!! $contact->contact_name !!}</td>
            <td>
                <a href="{!! URL::route('admin_contact.edit', ['id' => $contact->contact_id]) !!}"><i class="fa fa-edit fa-2x"></i></a>
                <a href="{!! URL::route('admin_contact.delete',['id' =>  $contact->contact_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
 <span class="text-warning">
	<h5>
		{{ trans('contact::contact_admin.message_find_failed') }}
	</h5>
 </span>
@endif
<div class="paginator">
    {!! $contacts->appends($request->except(['page']) )->render() !!}
</div>