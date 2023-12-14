<template>
    <h1>Hello World!</h1>
    <ItemCard title="My Title" description="My Description" warning="true" />
</template>

<script>
import ItemCard from '../components/ItemCard.vue';

export default {
    name: "Index",
    components: {
        ItemCard
    }
}

</script>

<style>

</style>
