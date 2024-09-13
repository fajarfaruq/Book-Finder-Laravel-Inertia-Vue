<template>
	<MainLayout>
		<div class="app-content-header"> <!--begin::Container-->
			<div class="container-fluid"> <!--begin::Row-->
				<div class="row">
					<div class="col-sm-6">
						<h3 class="mb-0">Master Books</h3>
					</div>
					<div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Master Books
                                </li>
                            </ol>
                        </div>
				</div> <!--end::Row-->
			</div> <!--end::Container-->
		</div>
		<div class="app-content"> <!--begin::Container-->
			<div class="container-fluid"> <!--begin::Row-->
				<div class="row">
					<div class="col-md-12">
						<div class="card mb-4">
							<div class="card-header">
								<h3 class="card-title">List Books</h3>
							</div> <!-- /.card-header -->
							<div class="card-body">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th style="width: 10px">No</th>
											<th>Title</th>
											<th>Authors</th>
											<th>Genre</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div> <!-- /.card-body -->
						</div> <!-- /.card -->
					</div> <!-- /.col -->
				</div> <!--end::Row-->
			</div> <!--end::Container-->
		</div>
	</MainLayout>
</template>

<script setup>
import MainLayout from './../Layouts/MainLayout.vue'
</script>