Nova.booting((Vue, router, store) => {
  Vue.component('index-external-image', require('./components/IndexField'))
  Vue.component('detail-external-image', require('./components/DetailField'))
  Vue.component('form-external-image', require('./components/FormField'))
})
