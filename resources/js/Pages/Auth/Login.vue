<template>
	<div class="login-box">
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in to start your session</p>
				<form @submit.prevent="submit">
					<div class="input-group mb-3">
						<input
							v-model="form.email"
							type="email"
							class="form-control"
							placeholder="Email"
							:class="{ 'is-invalid': localErrors.email }"
						/>
						<div class="input-group-text">
						<span class="bi bi-envelope"></span>
						</div>
						<div class="invalid-feedback">{{ localErrors.email }}</div>
					</div>
					<div class="input-group mb-3">
						<input
							v-model="form.password"
							type="password"
							class="form-control"
							placeholder="Password"
							:class="{ 'is-invalid': localErrors.password }"
						/>
						<div class="input-group-text">
							<span class="bi bi-lock-fill"></span>
						</div>
						<div class="invalid-feedback">{{ localErrors.password }}</div>
					</div>
					<div class="row">
						<div class="col-8"></div>
						<div class="col-4">
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-primary">Sign In</button>
						</div>
						</div>
					</div>
				</form>
			</div> <!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->
</template>


<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  email: '',
  password: ''
});

const localErrors = ref({
  email: '',
  password: ''
});

const submit = () => {
  form.post('/auth/login', {
    onError: (errors) => {
      // Clear previous errors
      localErrors.value.email = '';
      localErrors.value.password = '';

      // Set new errors
      if (errors.email) localErrors.value.email = errors.email;
      if (errors.password) localErrors.value.password = errors.password;
    },
    onSuccess: () => {
      // Redirect or handle successful login
    }
  });
};
</script>

<style scoped>
/* Add any custom styles if needed */
.input-group-text {
  background: #e9ecef;
}
.is-invalid {
  border-color: #dc3545;
}
.invalid-feedback {
  display: block;
}
</style>