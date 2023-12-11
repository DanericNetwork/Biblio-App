import { defineStore } from 'pinia' // Import the defineStore function from pinia.

export const useItemStore = defineStore('item', { // The name of the store. Used in devtools and allows restoring state
    state: () => ({ // State can be one or more objects that store data.
        items: [], // Add an empty array to store multiple items
    }),
    actions: {
        addItem(item) {
            this.items.push(item); // Add the item to the items array
        },
        removeItem(index) {
            this.items.splice(index, 1); // Remove the item at the specified index from the items array
        },
        clearItems() {
            this.items = []; // Clear the items array
        },
    },
    getters: {
        getItems: (state) => state.items, // Return the items array
    }
})