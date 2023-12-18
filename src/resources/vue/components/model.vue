<template>
    <div class="box">
        <svg class="close-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="transform: rotate(45deg);"><path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path></svg>
        <slot></slot>
    </div>
</template>

<script>

</script>

<style scoped>
    .box {
        background-color: #1D243A;
        width: 400px;
        height: 400px;
        position: relative;
    }

    .close-icon {
        position: absolute;
        height: 40px;
        width: 40px;
        top: 5px;
        right: 5px;
        fill: #fff;
    }
</style>
    