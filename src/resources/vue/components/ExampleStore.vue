<!-- 
 * This is an example component for pinia!
 * This component is using the ExampleStore.js store.
 * Use this component as an example for your own components when using stores.
 -->

<template>
    <div>
        <h1>Dit is een een example component voor pinia!</h1>
        <p>Counting: {{ store.count }} <button @click="this.increment()">Increase count</button></p>
    </div>
</template>
<script>
    import { useExampleStore } from '../../stores/ExampleStore.js'

    export default {
        name: 'example-store-component',
        setup: () => {
            const store = useExampleStore()
            return {
                store
            }
        },
        methods: {
            increment() {
                this.store.increment()
            }
        },
    }
</script>
<style>
</style>