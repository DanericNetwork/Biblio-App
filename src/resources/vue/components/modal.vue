<template>
    <div class="bg-modal" @click="toggleModal" v-if="showModal">
        <div v-if="showModal" class="modal" @click.stop>
            <Icon class="close-icon" icon="close" color="#ff0000" />
            <slot></slot>
        </div>
    </div>
</template>

<script>
import Icon from './icon.vue';
export default {
    title: 'Modal',
    components: {
        Icon
    },
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

<style lang="scss">
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
        background-color: rgba(128, 128, 128, 0.7);

        .modal {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 80%;
            height: 80%;
            background-color: #1D243A;

            .close-icon {
                position: absolute;
                height: 40px;
                width: 40px;
                top: 5px;
                right: 5px;
                fill: #fff;
            }
        }
    }
</style>