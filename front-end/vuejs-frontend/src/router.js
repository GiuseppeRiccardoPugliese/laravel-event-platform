import { createRouter, createWebHistory } from "vue-router";

import Home from './pages/Home.vue';
import Tags from './pages/Tags.vue';
import Events from './pages/Events.vue';
import About from './pages/About.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/events',
            name: 'events',
            component: Events
        },
        {
            path: '/tags',
            name: 'tags',
            component: Tags
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },

    ]
});

// Aggiungi un listener per l'evento load
window.addEventListener('load', () => {
    // Controlla l'URL corrente
    const currentPath = window.location.pathname;

    // Se l'URL è diverso dalla tua rotta principale, reimposta alle rotte originali
    if (currentPath !== '/') {
        router.push('/');
    }
});

export { router };