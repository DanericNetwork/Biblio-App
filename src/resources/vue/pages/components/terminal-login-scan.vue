<template>
    <div class="gray">
        <SearchBar></SearchBar>
        <div class="spacer"></div>
        <SearchButton></SearchButton>
    </div>
</template>

<script>
import SearchBar from './SearchBar.vue';
import SearchButton from './SearchButton.vue';

export default {
    components: {
        SearchButton,
        SearchBar
},
};

</script>
<style>
.gray {
    background-color: #f2f2f2;
    padding: 20px;
    border-radius: 5px;
    width: 300px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
        
}
.spacer {
    margin-bottom: 20px;
}

</style>
