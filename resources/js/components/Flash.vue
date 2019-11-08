<template>
    <div class="alert cursor-pointer" :class="[level, { 'alert-open': isOpen }]" role="alert" @click="isOpen = false">
        <slot></slot>

        <span class="ml-3 opacity-50 text-xl leading-none" aria-hidden="true">×</span>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                isOpen: false
            };
        },

        props: {
            level: {
                type: String,
                default: 'success'
            }
        },

        created() {
            setTimeout(() => { this.isOpen = true; }, 100);
            setTimeout(() => { this.isOpen = false; }, 10000);
        }
    };
</script>

<style>
    .alert {
        @apply z-50 fixed flex items-center justify-between rounded-none invisible opacity-0;
        bottom: 0;
        left: 0;
        right: 0;
        transform: scale(0.8);
        transition: all 0.25s ease-in-out;

        &:hover {
            @apply opacity-75 !important;
        }

        &.alert-open {
            @apply visible opacity-100;
            transform: scale(1.0);
        }
    }

    @screen md {
        .alert {
            @apply max-w-md rounded shadow-xl;
            bottom: 5rem;
            left: auto;
            right: 5rem;
        }
    }
</style>
