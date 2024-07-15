<template>
    <h1 class="text-center mb-4">Olá, {{ username }}! {{ greeting }}</h1>
  </template>

  <script>
  export default {
    props: {
      username: {
        type: String,
        required: true
      }
    },
    data() {
      return {
        greeting: ''
      };
    },
    mounted() {
      this.greeting = this.getGreeting(); // Determine a saudação com base no horário do dia
    },
    methods: {
      getGreeting() {
        const hour = new Date().getHours();
        if (hour >= 5 && hour < 12) {
          return 'Bom dia!';
        } else if (hour >= 12 && hour < 18) {
          return 'Boa Tarde!';
        } else {
          return 'Boa Noite!';
        }
      }
    }
  };
  </script>

  <style scoped>
  /* Estilos opcionais para o componente */
  .text-center {
    text-align: center;
  }
  .mb-4 {
    margin-bottom: 1rem;
  }
  </style>
