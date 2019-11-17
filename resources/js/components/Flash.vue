<template>
    <div class="alert cursor-pointer" :class="[level, { 'open': isOpen }]" role="alert" @click="isOpen = false">
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
