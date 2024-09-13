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
								<DxDataGrid
									id="grid"
									:show-borders="true"
									:data-source="booksData"
									:repaint-changes-only="true"
								>
									<DxEditing
									:refresh-mode="refreshMode"
									:allow-adding="true"
									:allow-updating="true"
									:allow-deleting="true"
									mode="cell"
									/>
									<DxColumn data-field="title" />
									<DxColumn data-field="author" />
									<DxColumn data-field="genre" />
									<DxColumn data-field="vote_count" />
								</DxDataGrid>
							</div> <!-- /.card-body -->
						</div> <!-- /.card -->
					</div> <!-- /.col -->
				</div> <!--end::Row-->
			</div> <!--end::Container-->
		</div>
	</MainLayout>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import MainLayout from './../Layouts/MainLayout.vue'
import {
    DxDataGrid,
    DxColumn,
    DxEditing
} from 'devextreme-vue/data-grid';
import CustomStore from 'devextreme/data/custom_store';

const URL = './books';

const booksData = new CustomStore({
    key: 'id',
    load: () => sendRequest(`${URL}/list-books`),
    insert: async (values) => {
        try {
            await sendRequest(`${URL}/insert-books`, 'POST', {
                values: JSON.stringify(values),
            });
            // Refresh or reload data after insert
            return booksData.load(); // Reload data to refresh the grid
        } catch (error) {
            console.error('Error inserting book:', error);
            throw error;
        }
    },
    update: async (key, values) => {
        try {
            await sendRequest(`${URL}/update-books`, 'PUT', {
                key,
                values: JSON.stringify(values),
            });
        } catch (error) {
            console.error('Error updating book:', error);
            throw error;
        }
    },
    remove: async (key) => {
        try {
            await sendRequest(`${URL}/delete-books`, 'DELETE', {
                key,
            });
        } catch (error) {
            console.error('Error deleting book:', error);
            throw error;
        }
    },
});

const refreshMode = ref('full'); // Use 'full' to ensure grid refreshes completely

const sendRequest = async (url: string, method = 'GET', data: Record<string, string> = {}) => {
    const request: any = {
        method, credentials: 'include',
    };

    if (['DELETE', 'POST', 'PUT'].includes(method)) {
        const params = Object.keys(data)
            .map((key) => `${encodeURIComponent(key)}=${encodeURIComponent(data[key])}`)
            .join('&');

        request.body = params;
        request.headers = { 'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8' };
    }

    const response = await fetch(url, request);

    const isJson = response.headers.get('content-type')?.includes('application/json');
    const result = isJson ? await response.json() : {};

    if (!response.ok) {
        throw new Error(result.Message || 'Request failed');
    }

    return method === 'GET' ? result.data : {};
};
</script>