<template>
    <div class="w-full mb-4" :id="id">
        <ul class="flex" role="tablist">
            <li class="-mb-px border border-b-0"
                v-for="(tab, index) in tabs" v-bind:key="index"
                :class="[{ 'w-full text-center' : fill }, { 'border-gray-200 bg-white rounded-t': tab.isActive }, { 'border-transparent' : ! tab.isActive }]"
            >
                <a class="block px-6 py-3 text-gray-700 cursor-pointer" role="tab"
                   @click.prevent="activeTab = tab"
                   :aria-controls="`${id}-${index}-panel`" :aria-selected="tab.isActive.toString()" :id="`${id}-${index}-tab`"
                >
                    {{ tab.title }}
                </a>
            </li>
        </ul>

        <slot></slot>
    </div>
</template>

<script>
    Vue.component('v-tab', require('./Tab.vue').default);

    export default {
        data() {
            return {
                activeTab: null,
                tabs: []
            };
        },

        props: {
            id: {
                type: String,
                required: true
            },
            fill: {
                type: Boolean
            }
        },

        mounted() {
            this.tabs = this.$children;

            this.setInitialTab();
        },

        watch: {
            activeTab(activeTab) {
                this.tabs.map(tab => tab.isActive = (tab === activeTab));
            }
        },

        methods: {
            setInitialTab() {
                this.activeTab = this.$children.find(tab => tab.active) || this.tabs[0];
            }
        }
    };
</script>
