<template>

    <div class="uk-form-horizontal">
        <div class="uk-form-row">
            <span class="uk-form-label">{{ 'Title' | trans }}</span>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="node.theme.title_hide"> {{ 'Hide Title' | trans }}</label>
            </div>
        </div>
        <div class="uk-form-row">
            <span class="uk-form-label">{{ 'Width' | trans }}</span>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="node.theme.full_width"> {{ 'Use full width' | trans }}</label>
            </div>
        </div>
    </div>

</template>

<script>

    module.exports = {

        section: {
            label: 'Theme',
            priority: 90
        },

        props: ['node']

    };

    window.Site.components['node-theme'] = module.exports;

</script>
