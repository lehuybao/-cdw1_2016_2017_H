<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-user"></i> <?php echo $request->all() ? 'Search results:' : 'Users'; ?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-10 col-md-9 col-sm-9">
                <?php echo Form::open(['method' => 'get', 'class' => 'form-inline']); ?>

                    <div class="form-group">
                        <?php echo Form::select('order_by', ["" => "select column", "first_name" => "First name", "last_name" => "Last name", "email" => "Email", "last_login" => "Last login", "active" => "Active"], $request->get('order_by',''), ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::select('ordering', ["asc" => "Ascending", "desc" => "descending"], $request->get('ordering','asc'), ['class' =>'form-control']); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::submit('Order', ['class' => 'btn btn-default']); ?>

                    </div>
                <?php echo Form::close(); ?>

            </div>
            <div class="col-lg-2 col-md-3 col-sm-3">
                    <a href="<?php echo URL::route('users.edit'); ?>" class="btn btn-info"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
      <div class="row">
          <div class="col-md-12">
              <?php if(! $users->isEmpty() ): ?>
              <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>Email</th>
                              <th class="hidden-xs">First name</th>
                              <th class="hidden-xs">Last name</th>
                              <th>Active</th>
                              <th class="hidden-xs">Last login</th>
                              <th>Operations</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <tr>
                              <td><?php echo $user->email; ?></td>
                              <td class="hidden-xs"><?php echo $user->first_name; ?></td>
                              <td class="hidden-xs"><?php echo $user->last_name; ?></td>
                              <td><?php echo $user->activated ? '<i class="fa fa-circle green"></i>' : '<i class="fa fa-circle-o red"></i>'; ?></td>
                              <td class="hidden-xs"><?php echo $user->last_login ? $user->last_login : 'not logged yet.'; ?></td>
                              <td>
                                  <?php if(! $user->protected): ?>
                                      <a href="<?php echo URL::route('users.edit', ['id' => $user->id]); ?>"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                                      <a href="<?php echo URL::route('users.delete',['id' => $user->id, '_token' => csrf_token()]); ?>" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                                  <?php else: ?>
                                      <i class="fa fa-times fa-2x light-blue"></i>
                                      <i class="fa fa-times fa-2x margin-left-12 light-blue"></i>
                                  <?php endif; ?>
                              </td>
                          </tr>
                      </tbody>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              </table>
              <div class="paginator">
                  <?php echo $users->appends($request->except(['page']) )->render(); ?>

              </div>
              <?php else: ?>
                  <span class="text-warning"><h5>No results found.</h5></span>
              <?php endif; ?>
          </div>
      </div>
    </div>
</div>
