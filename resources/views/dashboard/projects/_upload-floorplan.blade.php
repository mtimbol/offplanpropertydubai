<div class="modal fade" id="UploadProjectFloorPlanModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4>{{ $project->name }} Floor Plans</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Title</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach( $project->floorplans as $floorplan )
									<?php 
										$path = getPhotoPath($floorplan->photo);
									?>
									<tr>
										<td>
											<a href="{{ $path }}" target="_blank">
												{{ $floorplan->title }}
											</a>
										</td>
										<td>
<<<<<<< HEAD
											<form method="POST" action="#">
=======
											<form method="POST" action="{{ route('dashboard.developers.projects.floorplans.destroy', [
												$developer->id, $project->id, $floorplan->id
											]) }}">
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
												{{ csrf_field() }}
												{!! method_field('DELETE') !!}
												<a href="#" class="btn btn-link">
													<i class="fa fa-pencil"></i>
												</a>
												<button type="submit" class="btn btn-sm btn-link">
													<i class="fa fa-remove"></i>
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<form 
					method="POST" 
					class="dropzone is-centered-xy"
					id="UploadProjectFloorplans"
					action="{{ route('dashboard.developers.projects.floorplans.store', [
					$developer->id, $project->id
					]) }}" 
				>
					{{ csrf_field() }}
				</form>

				<p>&nbsp;</p>
<<<<<<< HEAD
				<p>
					Images / PDFs only<br />
					Maximum file size: 3mb each
				</p>
=======
				<ul class="list-group">
					<li class="list-group-item">
						<strong>Recommended dimensions:</strong> 1366px &times; 769px
					</li>
					<li class="list-group-item">
						<strong>Upload Format:</strong> (.jpg, .png) only
					</li>
					<li class="list-group-item">
						<strong>Maximum file size:</strong> 200kb / upload
					</li>
				</ul>
				<div class="alert alert-info">
					<p>For now, the "Title" will be the filename of the image you will upload.</p>
				</div>
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>