<template>
    <div class="relative password-toggle">
        <input :type="type" name="password" id="password" class="form-control" :class="classes" :required="required" autocomplete="new-password">

        <div class="absolute top-0 right-0 flex flex-col justify-center h-full mr-4 text-blue-500 cursor-pointer" @click="toggle">
            <svg v-show="type === 'password'" class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 4C5.142 4 1.886 9.879 1.096 11.557c-.132.28-.132.604 0 .884C1.886 14.121 5.142 20 12 20c6.834 0 10.092-5.837 10.896-7.54a1.078 1.078 0 000-.92C22.092 9.836 18.834 4 12 4zm0 3a5 5 0 11-.001 10.001A5 5 0 0112 7zm0 2a3 3 0 00-3 3 3 3 0 003 3 3 3 0 003-3 3 3 0 00-3-3z"/></svg>

            <svg v-show="type === 'text'" class="w-5 h-5 fill-current relative" style="top: 1px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.014 3.21c-4.406 0-8.574 2.678-10.88 6.99l-.253.472.254.473a13.779 13.779 0 002.24 3.066L.879 16.707l1.414 1.414 2.582-2.582c.67.508 1.384.943 2.129 1.3l-1.8 3.483 1.776.92 1.905-3.683c.69.196 1.397.326 2.115.39V22h2v-4.05c.672-.06 1.335-.182 1.982-.358l1.862 3.644 1.781-.908-1.748-3.426a12.423 12.423 0 002.152-1.285l2.504 2.504 1.414-1.414-2.406-2.408c.905-.918 1.7-1.982 2.34-3.178l.246-.49-.246-.457C20.573 5.879 16.409 3.21 12.014 3.21z"/></svg>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                type: 'password'
            };
        },

        props: {
            classes: {
                type: String,
                default: ''
            },
            required: {
                type: Boolean,
                default: false
            }
        },

        methods: {
            toggle() {
                this.type = (this.type === 'password') ? 'text' : 'password';
            }
        }
    };
</script>
