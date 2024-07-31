<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
      <h2 class="text-2xl font-bold mb-6 text-center">Sign Up</h2>
      <form @submit.prevent="handleSubmit">
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
          <input 
            type="text" 
            id="name" 
            v-model="name" 
            required 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          />
        </div>
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input 
            type="email" 
            id="email" 
            v-model="email" 
            required 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          />
        </div>
        <div class="mb-4">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input 
            type="password" 
            id="password" 
            v-model="password" 
            required 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          />
        </div>
        <div class="mb-6">
          <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
          <input 
            type="file" 
            id="photo" 
            @change="handleFileChange" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          />
        </div>
        <button 
          type="submit" 
          class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          Sign Up
        </button>
        <p class="mt-4 text-center">
          <router-link 
            to="/login" 
            class="text-indigo-600 hover:text-indigo-700"
          >
            Already have an account? Log in
          </router-link>
        </p>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      photo: null,
      error: null
    }
  },
  methods: {
    handleFileChange(event) {
      this.photo = event.target.files[0];
    },
    async handleSubmit() {
      try {
        const formData = new FormData();
        formData.append('name', this.name);
        formData.append('email', this.email);
        formData.append('password', this.password);
        formData.append('photo', this.photo);

        const response = await axios.post('http://localhost/api/auth/signup', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        });

        // Handle successful signup
        console.log('Signup successful:', response.data);
        const token = response.data.token;
        localStorage.setItem('authToken', token);

        // You might want to store the token or navigate to a different route
        this.$router.push('/dashboard'); // Redirect to a different page after signup
      } catch (error) {
        console.error('Signup failed:', error.response?.data?.message || error.message);
        this.error = error.response?.data?.message || 'Signup failed';
      }
    }
  }
}
</script>
