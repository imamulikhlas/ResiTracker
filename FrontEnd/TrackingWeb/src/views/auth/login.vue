<template>
    <body class="bg-gradient-primary">
      <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-12">
                    <div class="col-lg-9 mx-auto">
                      <div class="p-5">
                        <div class="text-center">
                          <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                        </div>
                        <form @submit.prevent="onSubmit">
                          <div class="form-group">
                            <input
                              v-model="email"
                              type="email"
                              class="form-control form-control-user"
                              id="exampleInputEmail"
                              aria-describedby="emailHelp"
                              placeholder="Enter Email Address..."
                            />
                          </div>
                          <div class="form-group">
                            <input
                              v-model="password"
                              type="password"
                              class="form-control form-control-user"
                              id="exampleInputPassword"
                              placeholder="Password"
                            />
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="customCheck"
                              />
                              <label class="custom-control-label" for="customCheck"
                                >Remember Me</label
                              >
                            </div>
                          </div>
                          <button
                            type="submit"
                            class="btn btn-primary btn-user btn-block"
                          >
                            Login
                          </button>
                        </form>
                        <hr />
                        <div class="text-center">
                          <a class="small" href="register.html"
                            >Create an Account!</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
</template>
<script>
import { ref } from 'vue';
import { useAuthStore } from '../../store';
import { useRouter } from 'vue-router';

export default {
  setup() {
    const authStore = useAuthStore();
    const router = useRouter();

    const email = ref('');
    const password = ref('');
    const loginError = ref(false);
    const errorMessage = ref('');

    const onSubmit = async () => {
    try {
        const success = await authStore.login(email.value, password.value);
        if (success) {
        router.push('/dashboard'); // Redirect to dashboard after successful login
        }
    } catch (error) {
        if (error.response && error.response.status === 401) {
          // Handle unauthorized error
          loginError.value = true;
          errorMessage.value = 'Invalid username or password';
        } else {
          // Handle other errors
          loginError.value = true;
          errorMessage.value = 'Login failed';
        }
    }
    };


    return { email, password, onSubmit };
  },
};
</script>  
  
  