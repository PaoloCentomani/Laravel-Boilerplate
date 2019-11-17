<template>
    <div class="dropdown relative cursor-pointer">
        <div class="dropdown-toggle flex items-center" aria-haspopup="true" role="button"
             @click.prevent="isOpen = ! isOpen"
             :aria-expanded="isOpen.toString()" :id="id"
        >
            <slot name="toggle"></slot>
        </div>

        <transition name="slide-down">
            <div class="dropdown-menu z-10 absolute mt-2 py-2 text-left text-black bg-white rounded shadow-lg cursor-default"
                v-show="isOpen"
                :aria-labelledby="id" :class="align === 'right' ? 'sm:right-0' : ''"
            >
                <slot></slot>
            </div>
        </transition>
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
            align: {
                type: String,
                default: 'left'
            },
            id: {
                type: String,
                required: true
            }
        },

        watch: {
            isOpen(isOpen) {
                if (isOpen) {
                    document.addEventListener('click', this.closeIfClickedOutside);
                    document.addEventListener('keydown', this.closeIfEscKeyPressed);
                } else {
                    document.removeEventListener('click', this.closeIfClickedOutside);
                    document.removeEventListener('keydown', this.closeIfEscKeyPressed);
                }
            }
        },

        methods: {
            closeIfClickedOutside(event) {
                if (! event.target.closest(`#${this.id}`)) {
                    this.isOpen = false;
                }
            },

            closeIfEscKeyPressed(event) {
                if (event.keyCode === 27) {
                    this.isOpen = false;
                }
            }
        }
    };
</script>
