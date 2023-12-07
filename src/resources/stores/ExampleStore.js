/**
 * This is an example store for pinia!
 * Stores are used to store data and perform actions on that data.
 * Use this as a template for creating new stores.
 */

import { defineStore } from 'pinia' // Import the defineStore function from pinia.


export const useExampleStore = defineStore('example', { // The name of the store. Used in devtools and allows restoring state
    state: () => ({ // State can be one or more objects that store data.
        count: 0,
    }),
    actions: { // Actions are functions that can be called from anywhere in the app. Also known as methods/setters.
        increment() {
            this.count++ 
        },
    },
    return: { // With return you can access data from anywhere in the app. Also known as getters.
        getCount() {
            return this.count
        },
    },
})
