<template>

    <h1>Hello</h1>

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
