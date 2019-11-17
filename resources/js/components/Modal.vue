<template>
    <transition name="modal" appear @close="close">
        <div class="modal z-40 fixed top-0 left-0 w-full h-full" @click.self="closeIfClickedOutside" aria-modal="true" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-header">
                    <slot name="header"></slot>

                    <a href="javascript:" class="close" v-if="dismissable" @click.prevent="close" :aria-label="closeLabel">×</a>
                </div>

                <div class="modal-body">
                    <slot></slot>
                </div>

                <div class="modal-footer">
                    <slot name="footer"></slot>

                    <button class="btn" @click="close">
                        {{ closeLabel }}
                    </button>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        data() {
            return {
                closeLabel: window.App.Lang.Close
            }
        },

        props: {
            dismissable: {
                type: Boolean,
                default: true
            }
        },

        mounted() {
            document.body.classList.add('overflow-hidden');

            if (this.dismissable) {
                document.addEventListener('keydown', this.closeIfEscKeyPressed);
            }
        },

        destroyed() {
            document.body.classList.remove('overflow-hidden');

            if (this.dismissable) {
                document.removeEventListener('keydown', this.closeIfEscKeyPressed);
            }
        },

        methods: {
            close() {
                this.$root.isModalOpen = false;
            },

            closeIfClickedOutside(event) {
                if (this.dismissable) {
                    this.close();
                }
            },

            closeIfEscKeyPressed(event) {
                if (event.keyCode === 27) {
                    this.close();
                }
            }
        }
    };
</script>
