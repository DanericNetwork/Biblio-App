<template>
    <div class="box" :style="{ backgroundColor: color, flexDirection: direction }">
        <slot></slot>
    </div>
</template>
<script>
    export default {
        name: 'Box',
        props: {
            color: {
                type: String,
                default: '#f2f2f2',
            },
            direction: {
                type: String,
                default: 'column',
            },
        },
    };
</script>
<style lang="scss">
    .box {
        padding: 30px;
        border-radius: 5px;
        width: fit-content;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>