<template>
    <div class="flex flex-col">
        <label :for="id" data-toggle>{{ label }}</label>

        <input :type="type" class="form-control" :id="id" :name="name || id" :required="required" :placeholder="placeholder" :value="value" data-input>
    </div>
</template>

<script>
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
                altFormat: this.enableTime ? 'j F Y H:i' : 'j F Y',
                dateFormat: this.enableTime ? 'Y-m-d H:i' : 'Y-m-d',
                noCalendar: ! this.enableDate,
                enableTime: this.enableTime,
                time_24hr: true,
                wrap: true
            });
        }
    };
</script>
