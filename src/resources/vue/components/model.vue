<template>
    <div class="bg-modal" @click="toggleModal" v-if="showModal">
        <div v-if="showModal" class="modal" @click.stop>
            <svg class="close-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="transform: rotate(45deg);">
                <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
            </svg>
            <!-- <p class="modal-content">This is some content in the modal.</p> -->
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showModal: true
        };
    },
    methods: {
        toggleModal() {
            this.showModal = !this.showModal;
        }
    }
};
</script>

<style scoped>
.bg-modal {
    position: absolute;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    width: 100%;
    height: 100%;
    background-color: gray;
}
    .modal {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 80%;
        /* width: 900px; */
        height: 80%;
        /* height: 550px; */
        background-color: #1D243A;
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