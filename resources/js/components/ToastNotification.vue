<template>
    <div v-if="visible" class="toast">
      <div class="toast-header">
        <strong class="me-auto">{{ title }}</strong>
        <button @click="closeToast" type="button" class="btn-close" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        {{ message }}
      </div>
    </div>
  </template>

  <script>
  export default {
    props: {
      title: {
        type: String,
        required: true
      },
      message: {
        type: String,
        required: true
      },
      duration: {
        type: Number,
        default: 5000 // Default duration to show the toast (in milliseconds)
      }
    },
    data() {
      return {
        visible: true
      };
    },
    methods: {
      closeToast() {
        this.visible = false;
      },
      startAutoClose() {
        setTimeout(() => {
          this.closeToast();
        }, this.duration);
      }
    },
    mounted() {
      this.startAutoClose(); // Start auto-closing the toast after mount
    }
  };
  </script>

  <style scoped>
  .toast {
    position: fixed;
    top: 1rem;
    right: 1rem;
    width: 300px;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 9999;
  }

  .toast-header {
    padding: 0.5rem 1rem;
    background-color: #007bff;
    color: #ffffff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
  }

  .toast-body {
    padding: 0.5rem 1rem;
  }
  </style>
