window.Site.components['site-theme'] = {

    section: {
        label: 'Theme',
        icon: 'pk-icon-large-brush',
        priority: 15
    },

    template: "<h1>Hello</h1>",

    data: function () {
        return window.$theme;
    },

    events: {

        save: function() {

            var config = _.omit(this.config, ['positions', 'menus', 'widget']);

            this.$http.post('admin/system/settings/config', {name: this.name, config: config}).error(function (data) {
                this.$notify(data, 'danger');
            });

        }

    }

};