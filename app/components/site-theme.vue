<template>

    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
        <div data-uk-margin>
            <h2 class="uk-margin-remove">{{ 'Meta Settings' | trans }}</h2>
        </div>

        <div data-uk-margin>
            <button class="uk-button uk-button-primary" @click.prevent="save">{{ 'Save' | trans }}</button>
        </div>
    </div>

    <div class="uk-form-row">
        <label class="uk-form-label">{{ 'Description' | trans }}</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-form-controls-condensed" for="input-description">
                <textarea type="text" id="input-description" type="text" class="uk-form-width-large" rows="5" v-model="config.description"></textarea>
            </label>
        </div>
    </div>

</template>

<script>

    module.exports = {

        section: {
            label: 'Theme',
            icon: 'pk-icon-large-brush',
            priority: 16
        },

        data: function () {
            return _.extend({config: {}}, window.$theme);
        },

        events: {
            save: function() {
                this.$http.post('admin/system/settings/config', {name: this.name, config: this.config}).catch(function (res) {
                    this.$notify(res.data, 'danger');
                });

            }
        }

    };

    window.Site.components['site-theme'] = module.exports;

</script>
