<template>
    <div>
        <label :for="id" data-toggle>{{ label }}</label>

        <div class="relative">
            <input :type="type" class="form-control" :id="id" :name="name || id" :required="required" :placeholder="placeholder" :value="value" data-input>

            <div class="close hidden flex-col absolute top-0 right-0 justify-center h-full mr-4 text-gray-500 cursor-pointer" @click="clear">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current"><path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"/></svg>
            </div>
        </div>
    </div>
</template>

<script>
    import confirmDatePlugin from 'flatpickr/dist/plugins/confirmDate/confirmDate';

    export default {
        data() {
            return {
                picker: null
            };
        },

        computed: {
            type() {
                if (this.enableDate && this.enableTime) {
                    return 'datetime-local';
                }

                return this.enableDate ? 'date' : 'time';
            }
        },

        props: {
            id: {
                type: String,
                required: true
            },
            enableDate: {
                type: Boolean,
                default: true
            },
            enableTime: {
                type: Boolean,
                default: false
            },
            label: {
                type: String,
                required: true
            },
            name: {
                type: String
            },
            placeholder: {
                type: String
            },
            required: {
                type: Boolean,
                default: false
            },
            value: {
                type: String
            }
        },

        mounted() {
            this.picker = flatpickr(this.$el, {
                altInput: true,
                altInputClass: 'form-control cursor-default',
                altFormat: this.enableTime ? 'j F Y H:i' : 'j F Y',
                ariaDateFormat: this.enableTime ? 'j F Y H:i' : 'j F Y',
                dateFormat: this.enableTime ? 'Y-m-d H:i' : 'Y-m-d',
                noCalendar: ! this.enableDate,
                enableTime: this.enableTime,
                plugins: (this.enableDate && this.enableTime) ? [new confirmDatePlugin({
                    confirmIcon: '',
                    confirmText: App.Lang.Close
                })] : [],
                time_24hr: true,
                wrap: true
            });
        },

        methods: {
            clear() {
                this.picker.close();
                this.picker.clear();
            }
        }
    };
</script>

<style>
    .form-control {
        &:hover + .close,
        &:focus + .close {
            @apply flex;
        }

        &[readonly] {
            @apply cursor-text;
        }
    }

    .close:hover {
        @apply flex;
    }
</style>
